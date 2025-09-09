<?php 
/**
 * Lecturer_notes Page Controller
 * @category  Controller
 */
class Lecturer_notesController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "lecturer_notes";
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
			"course", 
			"faculty", 
			"program", 
			"lecturer", 
			"academic_year", 
			"datein", 
			"lastupdate", 
			"status", 
			"file", 
			"size", 
			"format", 
			"downloads");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				lecturer_notes.id LIKE ? OR 
				lecturer_notes.title LIKE ? OR 
				lecturer_notes.course LIKE ? OR 
				lecturer_notes.faculty LIKE ? OR 
				lecturer_notes.program LIKE ? OR 
				lecturer_notes.lecturer LIKE ? OR 
				lecturer_notes.academic_year LIKE ? OR 
				lecturer_notes.datein LIKE ? OR 
				lecturer_notes.lastupdate LIKE ? OR 
				lecturer_notes.status LIKE ? OR 
				lecturer_notes.file LIKE ? OR 
				lecturer_notes.size LIKE ? OR 
				lecturer_notes.format LIKE ? OR 
				lecturer_notes.downloads LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "lecturer_notes/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("lecturer_notes.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Lecturer Notes";
		$this->render_view("lecturer_notes/list.php", $data); //render the full page
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
			"course", 
			"faculty", 
			"program", 
			"lecturer", 
			"academic_year", 
			"datein", 
			"lastupdate", 
			"status", 
			"file", 
			"size", 
			"format", 
			"downloads");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("lecturer_notes.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Lecturer Notes";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("lecturer_notes/view.php", $record);
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
			$fields = $this->fields = array("title","course","faculty","program","lecturer","academic_year","lastupdate","status","file","size","format","downloads");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'course' => 'required',
				'faculty' => 'required',
				'program' => 'required',
				'lecturer' => 'required',
				'academic_year' => 'required',
				'lastupdate' => 'required',
				'status' => 'required',
				'file' => 'required',
				'size' => 'required',
				'format' => 'required',
				'downloads' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'course' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'program' => 'sanitize_string',
				'lecturer' => 'sanitize_string',
				'academic_year' => 'sanitize_string',
				'lastupdate' => 'sanitize_string',
				'status' => 'sanitize_string',
				'file' => 'sanitize_string',
				'size' => 'sanitize_string',
				'format' => 'sanitize_string',
				'downloads' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("lecturer_notes");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Lecturer Notes";
		$this->render_view("lecturer_notes/add.php");
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
		$fields = $this->fields = array("id","title","course","faculty","program","lecturer","academic_year","lastupdate","status","file","size","format","downloads");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'course' => 'required',
				'faculty' => 'required',
				'program' => 'required',
				'lecturer' => 'required',
				'academic_year' => 'required',
				'lastupdate' => 'required',
				'status' => 'required',
				'file' => 'required',
				'size' => 'required',
				'format' => 'required',
				'downloads' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'course' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'program' => 'sanitize_string',
				'lecturer' => 'sanitize_string',
				'academic_year' => 'sanitize_string',
				'lastupdate' => 'sanitize_string',
				'status' => 'sanitize_string',
				'file' => 'sanitize_string',
				'size' => 'sanitize_string',
				'format' => 'sanitize_string',
				'downloads' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("lecturer_notes.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("lecturer_notes");
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
						return	$this->redirect("lecturer_notes");
					}
				}
			}
		}
		$db->where("lecturer_notes.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Lecturer Notes";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("lecturer_notes/edit.php", $data);
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
		$db->where("lecturer_notes.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("lecturer_notes");
	}
}
