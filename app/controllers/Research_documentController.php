<?php 
/**
 * Research_document Page Controller
 * @category  Controller
 */
class Research_documentController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "research_document";
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
			"degree", 
			"title", 
			"issues_date", 
			"abstract", 
			"subjects", 
			"format", 
			"size", 
			"file", 
			"views", 
			"citations", 
			"timestamp", 
			"thumbs", 
			"authors", 
			"faculty", 
			"program", 
			"status", 
			"ctrl", 
			"uid", 
			"lastupdate"
		);
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->community)){
    $community = $request->community;
    $db->where("($tablename.faculty = '$community' OR research_document.program = '$community') AND status = '1'");
}
if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->subject)){
    $subjects = $request->subject;
    $db->where("$tablename.subjects LIKE '%$subjects%'");
}
if(!empty($request->date)){
    $date = $request->date;
    $db->where("$tablename.issues_date LIKE '%$date%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				research_document.id LIKE ? OR 
				research_document.degree LIKE ? OR 
				research_document.title LIKE ? OR 
				research_document.issues_date LIKE ? OR 
				research_document.abstract LIKE ? OR 
				research_document.subjects LIKE ? OR 
				research_document.format LIKE ? OR 
				research_document.size LIKE ? OR 
				research_document.file LIKE ? OR 
				research_document.views LIKE ? OR 
				research_document.citations LIKE ? OR 
				research_document.timestamp LIKE ? OR 
				research_document.thumbs LIKE ? OR 
				research_document.authors LIKE ? OR 
				research_document.faculty LIKE ? OR 
				research_document.program LIKE ? OR 
				research_document.status LIKE ? OR 
				research_document.ctrl LIKE ? OR 
				research_document.uid LIKE ? OR
				research_document.lastupdate LIKE ?

			)";

			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_document/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_document.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Document";
		$this->render_view("research_document/list.php", $data); //render the full page
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
			"degree", 
			"title", 
			"issues_date", 
			"abstract", 
			"subjects", 
			"format", 
			"size", 
			"file", 
			"views", 
			"citations", 
			"timestamp", 
			"thumbs", 
			"authors", 
			"faculty", 
			"program", 
			"status", 
			"ctrl", 
			"uid", 
			"lastupdate"
		);
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("research_document.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
		#Statement to execute after adding record
		$db->rawQuery("UPDATE $tablename SET views=views + 1 WHERE id='$rec_id'");
		# End of after view statement
			$page_title = $this->view->page_title = "$record[title]";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("research_document/view.php", $record);
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
			$fields = $this->fields = array("title","authors","degree","subjects","issues_date","faculty","program","abstract","file","thumbs","status","uid");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'degree' => 'required',
				'subjects' => 'required',
				'issues_date' => 'required',
				'faculty' => 'required',
				'program' => 'required',
				'abstract' => 'required',
				'file' => 'required',
				'thumbs' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'degree' => 'sanitize_string',
				'subjects' => 'sanitize_string',
				'issues_date' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'program' => 'sanitize_string',
				'abstract' => 'sanitize_string',
				'file' => 'sanitize_string',
				'thumbs' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['status'] = "0.0";
$modeldata['uid'] = USER_ID;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
		# Statement to execute after adding record
		$genID = genID('RD',$rec_id);
$db->rawQuery("UPDATE research_document SET ctrl='$genID' WHERE id='$rec_id'");
regAction($tablename, $rec_id, 'upload');
		# End of after add statement
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("research_document/view/$rec_id");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Research Document";
		$this->render_view("research_document/add.php");
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
		$fields = $this->fields = array("id","title","authors","degree","subjects","issues_date","faculty","program","abstract","ctrl","lastupdate"); 
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'degree' => 'required',
				'subjects' => 'required',
				'issues_date' => 'required',
				'faculty' => 'required',
				'program' => 'required',
				'abstract' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'degree' => 'sanitize_string',
				'subjects' => 'sanitize_string',
				'issues_date' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'program' => 'sanitize_string',
				'abstract' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['lastupdate'] = datetime_now();
			if($this->validated()){
				$db->where("research_document.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("research_document/view/$rec_id");
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
						return	$this->redirect("research_document/view/$rec_id");
					}
				}
			}
		}
		$db->where("research_document.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Research Document";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("research_document/edit.php", $data);
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
		$db->where("research_document.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("research_document");
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function sm($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"degree", 
			"title", 
			"issues_date", 
			"abstract", 
			"subjects", 
			"format", 
			"size", 
			"file", 
			"views", 
			"citations", 
			"timestamp", 
			"thumbs", 
			"authors", 
			"faculty", 
			"program", 
			"status", 
			"ctrl", 
			"uid", 
			"lastupdate"
		);
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if (!empty($request->subject) || !empty($request->faculty) || !empty($request->program)) {
    $subject = isset($request->subject)?$request->subject:'';
    $faculty = isset($request->faculty)?$request->faculty:'';
    $program = isset($request->program)?$request->program:'';
    $qs = !empty($subject) ? "research_document.subjects LIKE '%$subject%' OR" : '';
    $qf = !empty($faculty) ? "research_document.faculty LIKE '%$faculty%' OR" : '';
    $qp = !empty($program) ? "research_document.program LIKE '%$program%' OR" : '';
    $conditions = trim("$qs $qf $qp id IS NULL", ' '); 
    $db->where($conditions);
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				research_document.id LIKE ? OR 
				research_document.degree LIKE ? OR 
				research_document.title LIKE ? OR 
				research_document.issues_date LIKE ? OR 
				research_document.abstract LIKE ? OR 
				research_document.subjects LIKE ? OR 
				research_document.format LIKE ? OR 
				research_document.size LIKE ? OR 
				research_document.file LIKE ? OR 
				research_document.views LIKE ? OR 
				research_document.citations LIKE ? OR 
				research_document.timestamp LIKE ? OR 
				research_document.thumbs LIKE ? OR 
				research_document.authors LIKE ? OR 
				research_document.faculty LIKE ? OR 
				research_document.program LIKE ? OR 
				research_document.status LIKE ? OR 
				research_document.ctrl LIKE ? OR 
				research_document.uid LIKE ? OR
				research_document.lastupdate LIKE ?

				
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_document/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_document.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Document";
		$this->render_view("research_document/sm.php", $data); //render the full page
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfile($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","file","thumbs","ctrl");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'file' => 'required',
				'thumbs' => 'required',
			);
			$this->sanitize_array = array(
				'file' => 'sanitize_string',
				'thumbs' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['ctrl'] = "0";
			if($this->validated()){
				$db->where("research_document.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("research_document");
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
						return	$this->redirect("research_document");
					}
				}
			}
		}
		$db->where("research_document.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Research Document";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("research_document/editfile.php", $data);
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
			"title", 
			"degree", 
			"issues_date", 
			"abstract", 
			"subjects", 
			"format", 
			"size", 
			"file", 
			"views", 
			"citations", 
			"timestamp", 
			"thumbs", 
			"authors", 
			"faculty", 
			"program", 
			"status", 
			"ctrl", 
			"uid", 
			"lastupdate"
		);
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(strtolower(USER_ROLE) == 'admin'){
     $assignedFaculty = assignedFaculty();
     $db->where("$tablename.faculty = '$assignedFaculty'");
}
if(!empty($request->community)){
    $community = $request->community;
    $db->where("$tablename.faculty = '$community' OR $tablename.program = '$community'");
}
if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->subject)){
    $subjects = $request->subject;
    $db->where("$tablename.subjects LIKE '%$subjects%'");
}
if(!empty($request->date)){
    $date = $request->date;
    $db->where("$tablename.issues_date LIKE '%$date%'");
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
				research_document.id LIKE ? OR 
				research_document.title LIKE ? OR 
				research_document.degree LIKE ? OR 
				research_document.issues_date LIKE ? OR 
				research_document.abstract LIKE ? OR 
				research_document.subjects LIKE ? OR 
				research_document.format LIKE ? OR 
				research_document.size LIKE ? OR 
				research_document.file LIKE ? OR 
				research_document.views LIKE ? OR 
				research_document.citations LIKE ? OR 
				research_document.timestamp LIKE ? OR 
				research_document.thumbs LIKE ? OR 
				research_document.authors LIKE ? OR 
				research_document.faculty LIKE ? OR 
				research_document.program LIKE ? OR 
				research_document.status LIKE ? OR 
				research_document.ctrl LIKE ? OR 
				research_document.uid LIKE ? OR
				research_document.lastupdate LIKE ?

				
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_document/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_document.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Document";
		$this->render_view("research_document/admin.php", $data); //render the full page
	}
}
