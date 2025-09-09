<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * accounts_regnum_value_exist Model Action
     * @return array
     */
	function accounts_regnum_value_exist($val){
		$db = $this->GetModel();
		$db->where("regnum", $val);
		$exist = $db->has("accounts");
		return $exist;
	}

	/**
     * accounts_faculty_option_list Model Action
     * @return array
     */
	function accounts_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * accounts_program_option_list Model Action
     * @return array
     */
	function accounts_program_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'program'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * accounts_email_value_exist Model Action
     * @return array
     */
	function accounts_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("accounts");
		return $exist;
	}

	/**
     * research_document_subjects_option_list Model Action
     * @return array
     */
	function research_document_subjects_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'subject'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * research_document_faculty_option_list Model Action
     * @return array
     */
	function research_document_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * research_document_program_option_list Model Action
     * @return array
     */
	function research_document_program_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'program'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lecture_notes_faculty_option_list Model Action
     * @return array
     */
	function lecture_notes_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lecture_notes_program_option_list Model Action
     * @return array
     */
	function lecture_notes_program_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'program'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * ebooks_faculty_option_list Model Action
     * @return array
     */
	function ebooks_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * reports_dataset_subject_option_list Model Action
     * @return array
     */
	function reports_dataset_subject_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'subject'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * reports_dataset_faculty_option_list Model Action
     * @return array
     */
	function reports_dataset_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * past_questions_faculty_option_list Model Action
     * @return array
     */
	function past_questions_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * past_questions_program_option_list Model Action
     * @return array
     */
	function past_questions_program_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'program'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * academic_calendar_faculty_option_list Model Action
     * @return array
     */
	function academic_calendar_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * speech_subject_option_list Model Action
     * @return array
     */
	function speech_subject_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'subject'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * research_article_faculty_option_list Model Action
     * @return array
     */
	function research_article_faculty_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * research_article_subject_option_list Model Action
     * @return array
     */
	function research_article_subject_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'subject'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * assigned_department_uid_option_list Model Action
     * @return array
     */
	function assigned_department_uid_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT id AS value , fullname AS label FROM accounts WHERE role = 'admin' ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * assigned_department_role_option_list Model Action
     * @return array
     */
	function assigned_department_role_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * faculties_title_option_list Model Action
     * @return array
     */
	function faculties_title_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT title AS value,title AS label FROM tags WHERE role = 'faculty'";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

}
