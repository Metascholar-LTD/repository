<?php 
/**
 * Speech Page Controller
 * @category  Controller
 */
class SpeechController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "speech";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"'' AS thumbs", 
			"title", 
			"subject", 
			"description", 
			"file", 
			"size", 
			"format", 
			"datein", 
			"lastupdate", 
			"uid", 
			"ctrl", 
			"views", 
			"downloads", 
			"issue_date", 
			"authors", 
			"status");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->subject)){
    $subject = $request->subject;
    $db->where("$tablename.subject LIKE '%$subject%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.issue_date LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				speech.id LIKE ? OR 
				'' LIKE ? OR 
				speech.title LIKE ? OR 
				speech.subject LIKE ? OR 
				speech.description LIKE ? OR 
				speech.file LIKE ? OR 
				speech.size LIKE ? OR 
				speech.format LIKE ? OR 
				speech.datein LIKE ? OR 
				speech.lastupdate LIKE ? OR 
				speech.uid LIKE ? OR 
				speech.ctrl LIKE ? OR 
				speech.views LIKE ? OR 
				speech.downloads LIKE ? OR 
				speech.issue_date LIKE ? OR 
				speech.authors LIKE ? OR 
				speech.status LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "speech/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("speech.id", ORDER_TYPE);
		}
		$db->where("status='1'");
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Speech";
		$this->render_view("speech/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"title", 
			"subject", 
			"description", 
			"file", 
			"size", 
			"format", 
			"datein", 
			"lastupdate", 
			"uid", 
			"ctrl", 
			"views", 
			"downloads", 
			"issue_date", 
			"authors", 
			"status");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("speech.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
		#Statement to execute after adding record
		$db->rawQuery("UPDATE $tablename SET views=views + 1 WHERE id='$rec_id'");
		# End of after view statement
			$page_title = $this->view->page_title = "View  Speech";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("speech/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("title","authors","subject","issue_date","description","file","size","format","datein","uid","status");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'subject' => 'required',
				'issue_date' => 'required',
				'description' => 'required',
				'file' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'subject' => 'sanitize_string',
				'issue_date' => 'sanitize_string',
				'description' => 'sanitize_string',
				'file' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['datein'] = datetime_now();
$modeldata['uid'] = USER_ID;
$modeldata['status'] = "0.0";
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
		# Statement to execute after adding record
		$genID = genID('SP',$rec_id);
$db->rawQuery("UPDATE $tablename SET ctrl='$genID' WHERE id='$rec_id'");
regAction($tablename, $rec_id, 'upload');
		# End of after add statement
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("speech");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Speech";
		$this->render_view("speech/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","title","authors","subject","issue_date","description","file","size","format","lastupdate","ctrl");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'subject' => 'required',
				'issue_date' => 'required',
				'description' => 'required',
				'file' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'subject' => 'sanitize_string',
				'issue_date' => 'sanitize_string',
				'description' => 'sanitize_string',
				'file' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['lastupdate'] = date_now();
			if($this->validated()){
				$db->where("speech.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("speech");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("speech");
					}
				}
			}
		}
		$db->where("speech.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Speech";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("speech/edit.php", $data);
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("speech.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("speech");
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function admin($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"'' AS thumbs", 
			"title", 
			"subject", 
			"description", 
			"file", 
			"size", 
			"format", 
			"datein", 
			"lastupdate", 
			"uid", 
			"ctrl", 
			"views", 
			"downloads", 
			"issue_date", 
			"authors", 
			"status");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->status)){
    $status = $request->status;
    $db->where("$tablename.status LIKE '%$status%'");
}
if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->subject)){
    $subject = $request->subject;
    $db->where("$tablename.subject LIKE '%$subject%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.issue_date LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				speech.id LIKE ? OR 
				'' LIKE ? OR 
				speech.title LIKE ? OR 
				speech.subject LIKE ? OR 
				speech.description LIKE ? OR 
				speech.file LIKE ? OR 
				speech.size LIKE ? OR 
				speech.format LIKE ? OR 
				speech.datein LIKE ? OR 
				speech.lastupdate LIKE ? OR 
				speech.uid LIKE ? OR 
				speech.ctrl LIKE ? OR 
				speech.views LIKE ? OR 
				speech.downloads LIKE ? OR 
				speech.issue_date LIKE ? OR 
				speech.authors LIKE ? OR 
				speech.status LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "speech/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("speech.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Speech";
		$this->render_view("speech/admin.php", $data); //render the full page
	}
}
