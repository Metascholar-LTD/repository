<?php

/**
 * Info Contoller Class
 * @category  Controller
 */

class ApiController extends BaseController
{

	/**
	 * call model action to retrieve data
	 * @return json data
	 */
    function newMail($email, $mailtitle, $mailbody){
        $mailer    = new Mailer;
        $mailer->send_mail($email, $mailtitle, $mailbody);
    }
	function json($action, $arg1 = null, $arg2 = null)
	{
		$model = new SharedController;
		$args = array($arg1, $arg2);
		$data = call_user_func_array(array($model, $action), $args);
		render_json($data);
	}

    public function val($sql)
    {
        $db = $this->GetModel();
        $sql = "$sql";
        $query = null;
        $val = $db->rawQueryValue($sql, $query);
        if (is_array($val)) {
            return $val[0];
        } else {
            return $val;
        }
    }

    public function arr($sql)
    {
        $db = $this->GetModel();
        $sql = "$sql";
        $query = null;
        $val = $db->rawQuery($sql, $query);

        return $val;
    }

    public function count($table, $arg1 = null, $arg1v = null, $arg2 = null, $arg2v = null)
    {
        $db = $this->GetModel();
        if ($arg2) {
            $query = "WHERE $arg1 = '$arg1v' AND $arg2 = '$arg2v'";
        } elseif ($arg1) {
            $query = "WHERE $arg1 = '$arg1v'";
        } else {
            $query = null;
        }
        $sql = "SELECT COUNT(id) as val FROM  $table $query";
        $val = $db->rawQuery($sql);
        return $val[0]['val'];
    }
    public function adminCount($table, $arg1 = null)
    {
        $db = $this->GetModel();
        if($arg1) {
            $query = "$arg1";
        } else {
            $query = null;
        }
        $sql = "SELECT COUNT(id) as val FROM  $table $query";
        $val = $db->rawQuery($sql);
        return $val[0]['val'];
    }
    
    public function fileUrl($table, $id){
        $db = $this->GetModel();
        $sql = "SELECT file FROM $table WHERE id = '$id'";
        $val = $db->rawQueryValue($sql);
        $val = (is_array($val))?$val[0] : $val;
        return render_json($val);
    }
    public function regAction($table, $id, $action){
        $uid = USER_ID;
        $datein = datetime_now();
        $db = $this->GetModel();
        $sql = "SELECT ctrl FROM $table WHERE id = '$id'";
        $ctrl = $db->rawQueryValue($sql);
        $ctrl = (is_array($ctrl))?$ctrl[0] : $ctrl;
        $db->rawQuery("INSERT INTO activities (uid, ctrl, title, action, path, datein) VALUES ('$uid', '$ctrl', 'Null title', '$action','$table','$datein')");
        return;
    }
    public function moreFilter($table, $subjects, $start = 0, $limit = 4){
        $db = $this->GetModel();
		$request = $this->request;
        $query = null;
        if(!empty($request->search)){
            $search = $request->search;
            $query = "WHERE $subjects LIKE '%$search%'";
        }
        $sql = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX($subjects, ',', n.digit + 1), ',', -1) AS title
        FROM $table JOIN (SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3) n
        ON LENGTH($subjects) - LENGTH(REPLACE($subjects, ',', '')) >= n.digit 
        $query LIMIT $start,$limit";
        $records = $db->rawQuery($sql);
        $data = $records;
        
        // Use array_map and serialize to convert each sub-array to a string
        $serializedArray = array_map('serialize', $data);

        // Use array_unique to remove duplicates based on the serialized values
        $uniqueArray = array_unique($serializedArray);
 
        // Use array_map and unserialize to convert the strings back to arrays
        $finalArray = array_map('unserialize', $uniqueArray);
 
        $data = $finalArray;
        
        
        $this->render_view("components/wt/exploreFilters.php", $data);
    }

    public function setStatus($table,$rec_id, $value){
        $db = $this->GetModel();
        $api = new ApiController;
        $request = $this->request;
        $ctrl = $request->ctrl;
        $date = datetime_now();


        switch ($table) {
            case 'past_questions': $field = 'course_title'; break;
            default: $field = 'title'; break;
        }

        
        $uid = $api->val("SELECT uid FROM $table WHERE id = '$rec_id'");
        $name = $api->val("SELECT fullname FROM accounts WHERE id = '$uid'");
        $email = $api->val("SELECT email FROM accounts WHERE id = '$uid'");
        $title = $api->val("SELECT $field FROM $table WHERE id = '$rec_id'");
        $name = !empty($uid)?$name:'Unknown';
        // do mail if should
        if($value != '0.0')smartMail($table, $value, $ctrl, $name, $title, $email);
        // continue with update
        $sql = "UPDATE $table SET status = '$value' , lastupdate = '$date' WHERE id = '$rec_id'";
        $db->rawQuery($sql);
        $html  = setStatusDom($value, $ctrl);
        echo $html;
    }


    public function communityFilter($table, $subject1, $subject2, $start = 0, $limit = 10){
        $db = $this->GetModel();
		$request = $this->request;
        $query1 = null;
        $query2 = null;
        if(!empty($request->search)){
            $search = $request->search;
            $query1 = "WHERE $subject1 LIKE '%$search%'";
            $query2 = "WHERE $subject2 LIKE '%$search%'";
        }
        $sql = "SELECT $subject1 AS title FROM $table
        WHERE status = '1'
        $query1
        UNION ALL SELECT $subject2 AS title FROM $table
        WHERE status = '1'
        $query2 
        LIMIT $start, $limit";
        $records = $db->rawQuery($sql);
        $data = $records;
        $this->render_view("components/wt/exploreCommunities.php", $data);
    }


}
