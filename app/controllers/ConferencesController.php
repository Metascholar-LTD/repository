<?php 
/**
 * Conferences Page Controller
 * @category  Controller
 */
class ConferencesController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "conferences";
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
			"issue_date", 
			"description", 
			"publisher", 
			"file", 
			"link", 
			"datein", 
			"lastupdate", 
			"uid", 
			"status", 
			"authors", 
			"ctrl", 
			"views", 
			"downloads");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("conferences.authors LIKE '%$authors%'");
}
if(!empty($request->publisher)){
    $publisher = $request->publisher;
    $db->where("conferences.publisher LIKE '%$publisher%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("conferences.issue_date LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				conferences.id LIKE ? OR 
				conferences.title LIKE ? OR 
				conferences.issue_date LIKE ? OR 
				conferences.description LIKE ? OR 
				conferences.publisher LIKE ? OR 
				conferences.file LIKE ? OR 
				conferences.link LIKE ? OR 
				conferences.datein LIKE ? OR 
				conferences.lastupdate LIKE ? OR 
				conferences.uid LIKE ? OR 
				conferences.status LIKE ? OR 
				conferences.authors LIKE ? OR 
				conferences.ctrl LIKE ? OR 
				conferences.views LIKE ? OR 
				conferences.downloads LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "conferences/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("conferences.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Conferences";
		$this->render_view("conferences/list.php", $data); //render the full page
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
			"issue_date", 
			"description", 
			"publisher", 
			"file", 
			"link", 
			"datein", 
			"lastupdate", 
			"uid", 
			"status", 
			"authors", 
			"ctrl", 
			"views", 
			"downloads");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("conferences.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
		#Statement to execute after adding record
		$db->rawQuery("UPDATE conferences SET views=views + 1 WHERE id='$rec_id'");
		# End of after view statement
			$page_title = $this->view->page_title = "View  Conferences";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("conferences/view.php", $record);
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
			$fields = $this->fields = array("title","authors","publisher","issue_date","description","link","file","datein","uid","status");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'publisher' => 'required',
				'issue_date' => 'required',
				'description' => 'required',
				'file' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'publisher' => 'sanitize_string',
				'issue_date' => 'sanitize_string',
				'description' => 'sanitize_string',
				'link' => 'sanitize_string',
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
		$genID = genID('CF',$rec_id);
$db->rawQuery("UPDATE $tablename SET ctrl='$genID' WHERE id='$rec_id'");
regAction($tablename, $rec_id, 'upload');
		# End of after add statement
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("conferences");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Conferences";
		$this->render_view("conferences/add.php");
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
		$fields = $this->fields = array("id","title","authors","publisher","issue_date","description","link","file","lastupdate","uid","ctrl");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'publisher' => 'required',
				'issue_date' => 'required',
				'description' => 'required',
				'file' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'publisher' => 'sanitize_string',
				'issue_date' => 'sanitize_string',
				'description' => 'sanitize_string',
				'link' => 'sanitize_string',
				'file' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['lastupdate'] = datetime_now();
$modeldata['uid'] = USER_ID;
			if($this->validated()){
				$db->where("conferences.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("conferences");
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
						return	$this->redirect("conferences");
					}
				}
			}
		}
		$db->where("conferences.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Conferences";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("conferences/edit.php", $data);
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
		$db->where("conferences.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("conferences");
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
			"issue_date", 
			"description", 
			"publisher", 
			"file", 
			"link", 
			"datein", 
			"lastupdate", 
			"uid", 
			"status", 
			"authors", 
			"ctrl", 
			"views", 
			"downloads");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
	if(!empty($request->status)){
    $status = $request->status;
    $db->where("$tablename.status LIKE '%$status%'");
}
if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("conferences.authors LIKE '%$authors%'");
}
if(!empty($request->publisher)){
    $publisher = $request->publisher;
    $db->where("conferences.publisher LIKE '%$publisher%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("conferences.issue_date LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				conferences.id LIKE ? OR 
				'' LIKE ? OR 
				conferences.title LIKE ? OR 
				conferences.issue_date LIKE ? OR 
				conferences.description LIKE ? OR 
				conferences.publisher LIKE ? OR 
				conferences.file LIKE ? OR 
				conferences.link LIKE ? OR 
				conferences.datein LIKE ? OR 
				conferences.lastupdate LIKE ? OR 
				conferences.uid LIKE ? OR 
				conferences.status LIKE ? OR 
				conferences.authors LIKE ? OR 
				conferences.ctrl LIKE ? OR 
				conferences.views LIKE ? OR 
				conferences.downloads LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "conferences/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("conferences.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Conferences";
		$this->render_view("conferences/admin.php", $data); //render the full page
	}
}
