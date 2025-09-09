<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("academic_calendar/add");
$can_edit = ACL::is_allowed("academic_calendar/edit");
$can_view = ACL::is_allowed("academic_calendar/view");
$can_delete = ACL::is_allowed("academic_calendar/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class=""><?php include COMPS."pages/view/academicCalendar.php";?></div>
                </div>
            </div>
        </div>
    </div>
</section>
