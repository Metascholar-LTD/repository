<?php 
/**
 * Research_proposals Page Controller
 * @category  Controller
 */
class Research_proposalsController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "research_proposals";
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
			"title", 
			"community", 
			"subjects", 
			"format", 
			"size", 
			"file", 
			"datein", 
			"lastupdate", 
			"session_id", 
			"status", 
			"ctrl");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				research_proposals.id LIKE ? OR 
				research_proposals.title LIKE ? OR 
				research_proposals.community LIKE ? OR 
				research_proposals.subjects LIKE ? OR 
				research_proposals.format LIKE ? OR 
				research_proposals.size LIKE ? OR 
				research_proposals.file LIKE ? OR 
				research_proposals.datein LIKE ? OR 
				research_proposals.lastupdate LIKE ? OR 
				research_proposals.session_id LIKE ? OR 
				research_proposals.status LIKE ? OR 
				research_proposals.ctrl LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_proposals/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_proposals.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Proposals";
		$this->render_view("research_proposals/list.php", $data); //render the full page
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
			"community", 
			"subjects", 
			"format", 
			"size", 
			"file", 
			"datein", 
			"lastupdate", 
			"session_id", 
			"status", 
			"ctrl");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("research_proposals.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Research Proposals";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("research_proposals/view.php", $record);
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
			$fields = $this->fields = array("title","community","subjects","format","size","file","lastupdate","session_id","status","ctrl");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'community' => 'required',
				'subjects' => 'required',
				'format' => 'required',
				'size' => 'required',
				'file' => 'required',
				'lastupdate' => 'required',
				'session_id' => 'required',
				'status' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'community' => 'sanitize_string',
				'subjects' => 'sanitize_string',
				'format' => 'sanitize_string',
				'size' => 'sanitize_string',
				'file' => 'sanitize_string',
				'lastupdate' => 'sanitize_string',
				'session_id' => 'sanitize_string',
				'status' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("research_proposals");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Research Proposals";
		$this->render_view("research_proposals/add.php");
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
		$fields = $this->fields = array("id","title","community","subjects","format","size","file","lastupdate","session_id","status","ctrl");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'community' => 'required',
				'subjects' => 'required',
				'format' => 'required',
				'size' => 'required',
				'file' => 'required',
				'lastupdate' => 'required',
				'session_id' => 'required',
				'status' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'community' => 'sanitize_string',
				'subjects' => 'sanitize_string',
				'format' => 'sanitize_string',
				'size' => 'sanitize_string',
				'file' => 'sanitize_string',
				'lastupdate' => 'sanitize_string',
				'session_id' => 'sanitize_string',
				'status' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("research_proposals.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("research_proposals");
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
						return	$this->redirect("research_proposals");
					}
				}
			}
		}
		$db->where("research_proposals.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Research Proposals";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("research_proposals/edit.php", $data);
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
		$db->where("research_proposals.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("research_proposals");
	}
}
