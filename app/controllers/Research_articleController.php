<?php 
/**
 * Research_article Page Controller
 * @category  Controller
 */
class Research_articleController extends SecureController{
	public $rules_array = [];
    public $sanitize_array = [];
	
	function __construct(){
		parent::__construct();
		$this->tablename = "research_article";
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
			"keywords", 
			"subject", 
			"year_of_publication", 
			"volume", 
			"country_of_publication", 
			"journal_name", 
			"number_of_citations", 
			"file", 
			"thumbs", 
			"authors", 
			"lastupdate", 
			"uid", 
			"status", 
			"ctrl", 
			"doi_issn", 
			"abstract", 
			"views", 
			"timestamp", 
			"source_url", 
			"faculty");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
	#Statement to execute before list record
if(!empty($request->authors)){
    $authors = $request->authors;
    $db->where("$tablename.authors LIKE '%$authors%'");
}
if(!empty($request->journal)){
    $journal = $request->journal;
    $db->where("$tablename.journal_name LIKE '%$journal%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.year_of_publication LIKE '%$year%'");
}
	# End of before list statement
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				research_article.id LIKE ? OR 
				research_article.title LIKE ? OR 
				research_article.keywords LIKE ? OR 
				research_article.subject LIKE ? OR 
				research_article.year_of_publication LIKE ? OR 
				research_article.volume LIKE ? OR 
				research_article.country_of_publication LIKE ? OR 
				research_article.journal_name LIKE ? OR 
				research_article.number_of_citations LIKE ? OR 
				research_article.file LIKE ? OR 
				research_article.thumbs LIKE ? OR 
				research_article.authors LIKE ? OR 
				research_article.lastupdate LIKE ? OR 
				research_article.uid LIKE ? OR 
				research_article.status LIKE ? OR 
				research_article.ctrl LIKE ? OR 
				research_article.doi_issn LIKE ? OR 
				research_article.abstract LIKE ? OR 
				research_article.views LIKE ? OR 
				research_article.timestamp LIKE ? OR 
				research_article.source_url LIKE ? OR 
				research_article.faculty LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_article/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_article.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Article";
		$this->render_view("research_article/list.php", $data); //render the full page
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
			"keywords", 
			"subject", 
			"year_of_publication", 
			"volume", 
			"country_of_publication", 
			"journal_name", 
			"number_of_citations", 
			"file", 
			"thumbs", 
			"authors", 
			"lastupdate", 
			"uid", 
			"status", 
			"ctrl", 
			"doi_issn", 
			"abstract", 
			"views", 
			"timestamp", 
			"source_url", 
			"faculty");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("research_article.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
		#Statement to execute after adding record
		$db->rawQuery("UPDATE $tablename SET views=views + 1 WHERE id='$rec_id'");
		# End of after view statement
			$page_title = $this->view->page_title = "View  Research Article";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("research_article/view.php", $record);
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
			$fields = $this->fields = array("title","authors","faculty","subject","keywords","year_of_publication","country_of_publication","journal_name","doi_issn","volume","abstract","source_url","file","thumbs","uid","status","views","timestamp");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'faculty' => 'required',
				'subject' => 'required',
				'keywords' => 'required',
				'year_of_publication' => 'required',
				'country_of_publication' => 'required',
				'journal_name' => 'required',
				'doi_issn' => 'required',
				'volume' => 'required',
				'abstract' => 'required',
				'source_url' => 'required',
				'file' => 'required',
				'thumbs' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'subject' => 'sanitize_string',
				'keywords' => 'sanitize_string',
				'year_of_publication' => 'sanitize_string',
				'country_of_publication' => 'sanitize_string',
				'journal_name' => 'sanitize_string',
				'doi_issn' => 'sanitize_string',
				'volume' => 'sanitize_string',
				'abstract' => 'sanitize_string',
				'source_url' => 'sanitize_string',
				'file' => 'sanitize_string',
				'thumbs' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['uid'] = USER_ID;
$modeldata['status'] = "0.0";
$modeldata['views'] = "0";
$modeldata['timestamp'] = datetime_now();
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
		# Statement to execute after adding record
		$genID = genID('RA',$rec_id);
$db->rawQuery("UPDATE $tablename SET ctrl='$genID' WHERE id='$rec_id'");
regAction($tablename, $rec_id, 'upload');
		# End of after add statement
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("research_article");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Research Article";
		$this->render_view("research_article/add.php");
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
		$fields = $this->fields = array("id","title","authors","faculty","subject","keywords","year_of_publication","country_of_publication","journal_name","doi_issn","volume","abstract","source_url","ctrl","lastupdate");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'authors' => 'required',
				'faculty' => 'required',
				'subject' => 'required',
				'keywords' => 'required',
				'year_of_publication' => 'required',
				'country_of_publication' => 'required',
				'journal_name' => 'required',
				'doi_issn' => 'required',
				'volume' => 'required',
				'abstract' => 'required',
				'source_url' => 'required',
				'ctrl' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'authors' => 'sanitize_string',
				'faculty' => 'sanitize_string',
				'subject' => 'sanitize_string',
				'keywords' => 'sanitize_string',
				'year_of_publication' => 'sanitize_string',
				'country_of_publication' => 'sanitize_string',
				'journal_name' => 'sanitize_string',
				'doi_issn' => 'sanitize_string',
				'volume' => 'sanitize_string',
				'abstract' => 'sanitize_string',
				'source_url' => 'sanitize_string',
				'ctrl' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['lastupdate'] = datetime_now();
			if($this->validated()){
				$db->where("research_article.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("research_article");
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
						return	$this->redirect("research_article");
					}
				}
			}
		}
		$db->where("research_article.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Research Article";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("research_article/edit.php", $data);
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
		$db->where("research_article.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("research_article");
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
			"title", 
			"keywords", 
			"subject", 
			"year_of_publication", 
			"volume", 
			"country_of_publication", 
			"journal_name", 
			"number_of_citations", 
			"file", 
			"thumbs", 
			"authors", 
			"lastupdate", 
			"uid", 
			"status", 
			"ctrl", 
			"doi_issn", 
			"abstract", 
			"views", 
			"timestamp", 
			"source_url", 
			"faculty");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				research_article.id LIKE ? OR 
				research_article.title LIKE ? OR 
				research_article.keywords LIKE ? OR 
				research_article.subject LIKE ? OR 
				research_article.year_of_publication LIKE ? OR 
				research_article.volume LIKE ? OR 
				research_article.country_of_publication LIKE ? OR 
				research_article.journal_name LIKE ? OR 
				research_article.number_of_citations LIKE ? OR 
				research_article.file LIKE ? OR 
				research_article.thumbs LIKE ? OR 
				research_article.authors LIKE ? OR 
				research_article.lastupdate LIKE ? OR 
				research_article.uid LIKE ? OR 
				research_article.status LIKE ? OR 
				research_article.ctrl LIKE ? OR 
				research_article.doi_issn LIKE ? OR 
				research_article.abstract LIKE ? OR 
				research_article.views LIKE ? OR 
				research_article.timestamp LIKE ? OR 
				research_article.source_url LIKE ? OR 
				research_article.faculty LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_article/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_article.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Article";
		$this->render_view("research_article/sm.php", $data); //render the full page
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
			if($this->validated()){
				$db->where("research_article.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("research_article");
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
						return	$this->redirect("research_article");
					}
				}
			}
		}
		$db->where("research_article.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Research Article";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("research_article/editfile.php", $data);
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
			"thumbs", 
			"title", 
			"keywords", 
			"faculty", 
			"subject", 
			"year_of_publication", 
			"volume", 
			"country_of_publication", 
			"journal_name", 
			"number_of_citations", 
			"file", 
			"authors", 
			"lastupdate", 
			"uid", 
			"status", 
			"ctrl", 
			"doi_issn", 
			"abstract", 
			"views", 
			"timestamp", 
			"source_url");
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
if(!empty($request->journal)){
    $journal = $request->journal;
    $db->where("$tablename.journal_name LIKE '%$journal%'");
}
if(!empty($request->year)){
    $year = $request->year;
    $db->where("$tablename.year_of_publication LIKE '%$year%'");
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
				research_article.id LIKE ? OR 
				research_article.thumbs LIKE ? OR 
				research_article.title LIKE ? OR 
				research_article.keywords LIKE ? OR 
				research_article.faculty LIKE ? OR 
				research_article.subject LIKE ? OR 
				research_article.year_of_publication LIKE ? OR 
				research_article.volume LIKE ? OR 
				research_article.country_of_publication LIKE ? OR 
				research_article.journal_name LIKE ? OR 
				research_article.number_of_citations LIKE ? OR 
				research_article.file LIKE ? OR 
				research_article.authors LIKE ? OR 
				research_article.lastupdate LIKE ? OR 
				research_article.uid LIKE ? OR 
				research_article.status LIKE ? OR 
				research_article.ctrl LIKE ? OR 
				research_article.doi_issn LIKE ? OR 
				research_article.abstract LIKE ? OR 
				research_article.views LIKE ? OR 
				research_article.timestamp LIKE ? OR 
				research_article.source_url LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "research_article/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("research_article.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Research Article";
		$this->render_view("research_article/admin.php", $data); //render the full page
	}
}
