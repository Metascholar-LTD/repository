<?php 
/**
 * Activities Page Controller
 * @category  Controller
 */
class ActivitiesController extends SecureController{
	
	function __construct(){
		parent::__construct();
		$this->tablename = "activities";
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
			"uid", 
			"action", 
			"ctrl", 
			"datein", 
			"path", 
			"title");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				activities.id LIKE ? OR 
				activities.uid LIKE ? OR 
				activities.action LIKE ? OR 
				activities.ctrl LIKE ? OR 
				activities.datein LIKE ? OR 
				activities.path LIKE ? OR 
				activities.title LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "activities/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("activities.id", ORDER_TYPE);
		}
		$db->where("uid='".USER_ID."'");
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
		$page_title = $this->view->page_title = "Activities";
		$this->render_view("activities/list.php", $data); //render the full page
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
	#Statement to execute before delete record
	$api   = new ApiController;
$ctrl  = $api->val("SELECT ctrl FROM $tablename WHERE id = '$rec_id'");
$table = $api->val("SELECT path FROM $tablename WHERE id = '$rec_id'");
	# End of before delete statement
		$db->where("activities.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
		#Statement to execute after delete record
		$db = $this->GetModel();
$db->where("$table.ctrl = '$ctrl'");
$db->delete($table);
		# End of after delete statement
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("activities");
	}
}
