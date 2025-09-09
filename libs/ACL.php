<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
	public static $role_pages = array(
			'super admin' =>
						array(
							'accounts' => array('list','view','add','edit', 'editfield','delete','import_data','userregister','accountedit','accountview'),
							'research_document' => array('list','sm','view','add','admin','edit','editfile', 'editfield','delete','import_data'),
							'research_article' => array('list','view','add','edit','editfile' ,'admin', 'sm','editfield','delete','import_data'),
							'explore' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'lecture_notes' => array('list','view','add','edit','admin', 'editfield','delete','import_data'),
							'ebooks' => array('list','view','add','edit','admin','editfile', 'editfield','delete','import_data'),
							'reports_dataset' => array('list','view','add','edit','admin', 'editfield','delete','import_data'),
							'past_questions' => array('list','view','add','edit','admin', 'editfield','delete','import_data'),
							'conferences' => array('list','view','add','edit','admin', 'editfield','delete','import_data'),
							'speech' => array('list','view','add','edit','admin', 'editfield','delete','import_data'),
							'academic_calendar' => array('list','view','add','edit','admin', 'editfield','delete','import_data'),
							'collections' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'subjects' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'activities' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'tags' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'assigned_department' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'finance' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'settings' => array('list','view','add','edit','gen','edit_img','editfield','delete','import_data'),
							'packages' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'faculties' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'team' => array('list','view','add','edit', 'editfield','delete','import_data'),
						),
		
			'admin' =>
						array(
							'accounts' => array('list','view','add','edit', 'editfield','delete','import_data','userregister','accountedit','accountview'),
							'research_document' => array('list','sm','view','add','admin','edit', 'editfile','editfield','delete','import_data'),
							'research_article' => array('list','view','add','edit', 'admin', 'sm','editfile','editfield','delete','import_data'),
							'lecture_notes' => array('list','view','add','edit', 'admin', 'editfield','delete','import_data'),
							'explore' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ebooks' => array('list','view','add','edit', 'admin', 'editfield','delete','import_data'),
							'reports_dataset' => array('list','view','add','edit', 'admin', 'editfield','delete','import_data'),
							'past_questions' => array('list','view','add','edit', 'admin', 'editfield','delete','import_data'),
							'conferences' => array('list','view','add','edit', 'admin', 'editfield','delete','import_data'),
							'speech' => array('list','view','add','edit', 'admin', 'editfield','delete','import_data'),
							'academic_calendar' => array('list','view','add','edit','admin','editfield','delete','import_data'),
							'subjects' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'activities' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'finance' => array('list','view','add','edit', 'editfield','delete','import_data'),
						),
		
			'staff' =>
						array(
							'accounts' => array('list','view','userregister','accountedit','accountview','add','edit', 'editfield','delete','import_data'),
							'research_document' => array('list','sm','view','add','admin','edit','editfile', 'editfield','delete','import_data'),
							'research_article' => array('list','view','add','edit', 'sm','editfile', 'editfield','delete','import_data'),
							'lecture_notes' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'explore' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ebooks' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'reports_dataset' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'past_questions' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'conferences' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'speech' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'academic_calendar' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'collections' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'subjects' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'activities' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'tags' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'assigned_department' => array('list','view','add','edit', 'editfield','delete','import_data'),
						),
		
			'student' =>
						array(
							'accounts' => array('list','view','userregister','accountedit','accountview','add','edit', 'editfield','delete','import_data'),
							'research_document' => array('list','sm','view','add','admin','edit','editfile', 'editfield','delete','import_data'),
							'research_article' => array('list','view','add','edit','editfile', 'sm','editfield','delete','import_data'),
							'lecture_notes' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'explore' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ebooks' => array('list','view','add','edit', 'editfield', 'editfile', 'delete','import_data'),
							'reports_dataset' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'past_questions' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'conferences' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'speech' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'academic_calendar' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'collections' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'subjects' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'activities' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'tags' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'assigned_department' => array('list','view','add','edit', 'editfield','delete','import_data'),
						)
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim((string)$path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0] ?? '');

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE ?? ''); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				//User does not have any role.
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}
