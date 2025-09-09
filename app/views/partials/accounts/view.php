<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("accounts/add");
$can_edit = ACL::is_allowed("accounts/edit");
$can_view = ACL::is_allowed("accounts/view");
$can_delete = ACL::is_allowed("accounts/delete");
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
<div class="d-flex justify-content-center align-items-center vh-100 mt-3">
    <section class="pageSection card shadow-sm" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
        <?php
        if( $show_header == true ){
        ?>
        <div  class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 col-lg-12 ">
                        <h4 class="record-title"><?=$data['fullname']?></h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 col-lg-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <?php
                            $counter = 0;
                            if(!empty($data)){
                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                            $counter++;
                            ?>
                            <div id="page-report-body" class="">
                                <table class="table table-hover table-borderless ">
                                    <!-- Table Body Start -->
                                    <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                        <tr  class="td-img">
                                            <th class="title"> Profile: </th>
                                            <td class="value"><?php Html :: page_img($data['img'],100,100,1); ?></td>
                                        </tr>
                                        <tr  class="td-role">
                                            <th class="title"> Role: </th>
                                            <td class="value"> <?php echo $data['role']; ?></td>
                                        </tr>
                                        <tr  class="td-fullname">
                                            <th class="title"> Fullname: </th>
                                            <td class="value"> <?php echo $data['fullname']; ?></td>
                                        </tr>
                                        <tr  class="td-faculty">
                                            <th class="title"> Faculty: </th>
                                            <td class="value"> <?php echo $data['faculty']; ?></td>
                                        </tr>
                                        <tr  class="td-program">
                                            <th class="title"> Programme: </th>
                                            <td class="value"> <?php echo $data['program']; ?></td>
                                        </tr>
                                        <tr  class="td-timestamp">
                                            <th class="title"> Timestamp: </th>
                                            <td class="value">
                                                <span title="<?php echo human_datetime($data['timestamp']); ?>" class="has-tooltip">
                                                    <?php echo relative_date($data['timestamp']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- Table Body End -->
                                </table>
                            </div>
                            <div class="p-3 d-flex">
                                <?php if($can_edit){ ?>
                                <a class="btn btn-sm btn-info"  href="<?php print_link("accounts/edit/$rec_id"); ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <?php } ?>
                                <?php if($can_delete){ ?>
                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("accounts/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                    <i class="fa fa-times"></i> Delete
                                </a>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            else{
                            ?>
                            <!-- Empty Record Message -->
                            <div class="text-muted p-3">
                                <i class="fa fa-ban"></i> No Record Found
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
