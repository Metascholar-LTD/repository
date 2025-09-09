<?php 
/**
 * Lecture_notes Page Controller
 * @category  Controller
 */
class Lecture_notesController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "lecture_notes";
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
			"downloads", 
			"description", 
			"ctrl", 
			"views", 
			"uid");
		$pagination = $this->get_pagination(10); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->lecturer)){
    $lecturer = $request->lecturer;
    $db->where("$tablename.lecturer LIKE '%$lecturer%'");
}
if(!empty($request->program)){
    $program = $request->program;
    $db->where("$tablename.program LIKE '%$program%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.academic_year LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				lecture_notes.id LIKE ? OR 
				lecture_notes.title LIKE ? OR 
				lecture_notes.course LIKE ? OR 
				lecture_notes.faculty LIKE ? OR 
				lecture_notes.program LIKE ? OR 
				lecture_notes.lecturer LIKE ? OR 
				lecture_notes.academic_year LIKE ? OR 
				lecture_notes.datein LIKE ? OR 
				lecture_notes.lastupdate LIKE ? OR 
				lecture_notes.status LIKE ? OR 
				lecture_notes.file LIKE ? OR 
				lecture_notes.size LIKE ? OR 
				lecture_notes.format LIKE ? OR 
				lecture_notes.downloads LIKE ? OR 
				lecture_notes.description LIKE ? OR 
				lecture_notes.ctrl LIKE ? OR 
				lecture_notes.views LIKE ? OR 
				lecture_notes.uid LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "lecture_notes/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("lecture_notes.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Lecture Notes";
		$this->render_view("lecture_notes/list.php", $data); //render the full page
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
			"downloads", 
			"description", 
			"ctrl", 
			"views", 
			"uid");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("lecture_notes.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
		#Statement to execute after adding record
		$db->rawQuery("UPDATE lecture_notes SET views=views + 1 WHERE id='$rec_id'");
		# End of after view statement
			$page_title = $this->view->page_title = "View  Lecture Notes";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("lecture_notes/view.php", $record);
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
			$fields = $this->fields = array("title","lecturer","course","academic_year","faculty","program","description","status","file","uid");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'lecturer' => 'required',
				'course' => 'required',
				'academic_year' => 'required',
				'faculty' => 'required',
				'program' => 'required',
				'description' => 'required',
				'file' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'lecturer' => 'sanitize_string',
				'course' => 'sanitize_string',
				'academic_year' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'program' => 'sanitize_string',
				'description' => 'sanitize_string',
				'file' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['status'] = "0.0";
$modeldata['uid'] = USER_ID;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
		# Statement to execute after adding record
		$genID = genID('LN',$rec_id);
$db->rawQuery("UPDATE $tablename SET ctrl='$genID' WHERE id='$rec_id'");
regAction($tablename, $rec_id, 'upload');
		# End of after add statement
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("lecture_notes");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Lecture Notes";
		$this->render_view("lecture_notes/add.php");
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
		$fields = $this->fields = array("id","title","lecturer","course","academic_year","faculty","program","description","lastupdate","status","file","ctrl");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'lecturer' => 'required',
				'course' => 'required',
				'academic_year' => 'required',
				'faculty' => 'required',
				'program' => 'required',
				'description' => 'required',
				'file' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'lecturer' => 'sanitize_string',
				'course' => 'sanitize_string',
				'academic_year' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'program' => 'sanitize_string',
				'description' => 'sanitize_string',
				'file' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['lastupdate'] = date_now();
$modeldata['status'] = "0.0";
			if($this->validated()){
				$db->where("lecture_notes.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("lecture_notes");
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
						return	$this->redirect("lecture_notes");
					}
				}
			}
		}
		$db->where("lecture_notes.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Lecture Notes";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("lecture_notes/edit.php", $data);
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
		$db->where("lecture_notes.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("lecture_notes");
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
			"downloads", 
			"description", 
			"ctrl", 
			"views", 
			"uid");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(strtolower(USER_ROLE) == 'admin'){
     $assignedFaculty = assignedFaculty();
     $db->where("$tablename.faculty = '$assignedFaculty'");
}
if(!empty($request->lecturer)){
    $lecturer = $request->lecturer;
    $db->where("$tablename.lecturer LIKE '%$lecturer%'");
}
if(!empty($request->program)){
    $program = $request->program;
    $db->where("$tablename.program LIKE '%$program%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.academic_year LIKE '%$year%'");
}
if(!empty($request->status)){
    $status = $request->status;
    $db->where("$tablename.status LIKE '%$status%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				lecture_notes.id LIKE ? OR 
				lecture_notes.title LIKE ? OR 
				lecture_notes.course LIKE ? OR 
				lecture_notes.faculty LIKE ? OR 
				lecture_notes.program LIKE ? OR 
				lecture_notes.lecturer LIKE ? OR 
				lecture_notes.academic_year LIKE ? OR 
				lecture_notes.datein LIKE ? OR 
				lecture_notes.lastupdate LIKE ? OR 
				lecture_notes.status LIKE ? OR 
				lecture_notes.file LIKE ? OR 
				lecture_notes.size LIKE ? OR 
				lecture_notes.format LIKE ? OR 
				lecture_notes.downloads LIKE ? OR 
				lecture_notes.description LIKE ? OR 
				lecture_notes.ctrl LIKE ? OR 
				lecture_notes.views LIKE ? OR 
				lecture_notes.uid LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "lecture_notes/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("lecture_notes.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Lecture Notes";
		$this->render_view("lecture_notes/admin.php", $data); //render the full page
	}
}
