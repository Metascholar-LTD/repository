<?php 
/**
 * Reports_dataset Page Controller
 * @category  Controller
 */
class Reports_datasetController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "reports_dataset";
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
			"type", 
			"title", 
			"subject", 
			"category", 
			"lastupdate", 
			"file", 
			"size", 
			"format", 
			"downloads", 
			"uid", 
			"description", 
			"authors", 
			"year_published", 
			"timestamp", 
			"status", 
			"views", 
			"ctrl", 
			"faculty");
		$pagination = $this->get_pagination(12); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->category)){
    $category = $request->category;
    $db->where("$tablename.category LIKE '%$category%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.year_published LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				reports_dataset.id LIKE ? OR 
				reports_dataset.type LIKE ? OR 
				reports_dataset.title LIKE ? OR 
				reports_dataset.subject LIKE ? OR 
				reports_dataset.category LIKE ? OR 
				reports_dataset.lastupdate LIKE ? OR 
				reports_dataset.file LIKE ? OR 
				reports_dataset.size LIKE ? OR 
				reports_dataset.format LIKE ? OR 
				reports_dataset.downloads LIKE ? OR 
				reports_dataset.uid LIKE ? OR 
				reports_dataset.description LIKE ? OR 
				reports_dataset.authors LIKE ? OR 
				reports_dataset.year_published LIKE ? OR 
				reports_dataset.timestamp LIKE ? OR 
				reports_dataset.status LIKE ? OR 
				reports_dataset.views LIKE ? OR 
				reports_dataset.ctrl LIKE ? OR 
				reports_dataset.faculty LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "reports_dataset/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("reports_dataset.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Reports Dataset";
		$this->render_view("reports_dataset/list.php", $data); //render the full page
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
			"type", 
			"title", 
			"subject", 
			"category", 
			"lastupdate", 
			"file", 
			"size", 
			"format", 
			"downloads", 
			"uid", 
			"description", 
			"authors", 
			"year_published", 
			"timestamp", 
			"status", 
			"views", 
			"ctrl", 
			"faculty");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("reports_dataset.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
		#Statement to execute after adding record
		$db->rawQuery("UPDATE reports_dataset SET views=views + 1 WHERE id='$rec_id'");
		# End of after view statement
			$page_title = $this->view->page_title = "View  Reports Dataset";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("reports_dataset/view.php", $record);
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
			$fields = $this->fields = array("type","title","authors","subject","faculty","year_published","description","file","status","uid","timestamp","views");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'type' => 'required',
				'title' => 'required',
				'authors' => 'required',
				'subject' => 'required',
				'faculty' => 'required',
				'year_published' => 'required',
				'description' => 'required',
			);
			$this->sanitize_array = array(
				'type' => 'sanitize_string',
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'subject' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'year_published' => 'sanitize_string',
				'description' => 'sanitize_string',
				'file' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['status'] = "0.0";
$modeldata['uid'] = USER_ID;
$modeldata['timestamp'] = datetime_now();
$modeldata['views'] = "0";
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
		# Statement to execute after adding record
		$genID = genID('DS',$rec_id);
$db->rawQuery("UPDATE $tablename SET ctrl='$genID' WHERE id='$rec_id'");
regAction($tablename, $rec_id, 'upload');
		# End of after add statement
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("reports_dataset");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Reports Dataset";
		$this->render_view("reports_dataset/add.php");
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
		$fields = $this->fields = array("id","type","title","authors","subject","faculty","year_published","description","file","uid","lastupdate","ctrl");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'type' => 'required',
				'title' => 'required',
				'authors' => 'required',
				'subject' => 'required',
				'faculty' => 'required',
				'year_published' => 'required',
				'description' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'type' => 'sanitize_string',
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'subject' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'year_published' => 'sanitize_string',
				'description' => 'sanitize_string',
				'file' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['uid'] = USER_ID;
$modeldata['lastupdate'] = datetime_now();
			if($this->validated()){
				$db->where("reports_dataset.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("reports_dataset");
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
						return	$this->redirect("reports_dataset");
					}
				}
			}
		}
		$db->where("reports_dataset.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Reports Dataset";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("reports_dataset/edit.php", $data);
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
		$db->where("reports_dataset.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("reports_dataset");
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
			"type", 
			"title", 
			"subject", 
			"category", 
			"lastupdate", 
			"file", 
			"size", 
			"format", 
			"downloads", 
			"uid", 
			"description", 
			"authors", 
			"year_published", 
			"timestamp", 
			"status", 
			"views", 
			"ctrl", 
			"faculty");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(strtolower(USER_ROLE) == 'admin'){
     $assignedFaculty = assignedFaculty();
     $db->where("$tablename.faculty = '$assignedFaculty'");
}
if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->category)){
    $category = $request->category;
    $db->where("$tablename.category LIKE '%$category%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.year_published LIKE '%$year%'");
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
				reports_dataset.id LIKE ? OR 
				reports_dataset.type LIKE ? OR 
				reports_dataset.title LIKE ? OR 
				reports_dataset.subject LIKE ? OR 
				reports_dataset.category LIKE ? OR 
				reports_dataset.lastupdate LIKE ? OR 
				reports_dataset.file LIKE ? OR 
				reports_dataset.size LIKE ? OR 
				reports_dataset.format LIKE ? OR 
				reports_dataset.downloads LIKE ? OR 
				reports_dataset.uid LIKE ? OR 
				reports_dataset.description LIKE ? OR 
				reports_dataset.authors LIKE ? OR 
				reports_dataset.year_published LIKE ? OR 
				reports_dataset.timestamp LIKE ? OR 
				reports_dataset.status LIKE ? OR 
				reports_dataset.views LIKE ? OR 
				reports_dataset.ctrl LIKE ? OR 
				reports_dataset.faculty LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "reports_dataset/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("reports_dataset.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Reports Dataset";
		$this->render_view("reports_dataset/admin.php", $data); //render the full page
	}
}
