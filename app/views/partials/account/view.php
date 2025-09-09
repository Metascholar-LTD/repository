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
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 compData comp-grid">
                    <div class=""><?php
                        $uimg = get_active_user('img');
                        $img = !empty($uimg)?$uimg:'assets/img/img1.jpg';
                        ?>
                        <style>
                            .bg-primary.m-2.mb-4 .profile{
                            background: url(<?=$img?>);
                            background-size: 100%;
                            background-position: center;
                            height: 250px;
                            }
                            .bg-primary.m-2.mb-4 .profile .avatar{
                            opacity: 0;
                            }
                        </style></div>
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <?php
                            $counter = 0;
                            if(!empty($data)){
                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                            $counter++;
                            ?>
                            <div class="bg-primary m-2 mb-4">
                                <div class="profile">
                                    <div class="avatar"><img src="<?php print_link("assets/images/avatar.png") ?>" /> 
                                    </div>
                                    <h1 class="title mt-4"><?php echo $data['regnum']; ?></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mx-3 mb-3">
                                        <ul class="nav nav-pills flex-column text-left">
                                            <li class="nav-item">
                                                <a data-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                    <i class="fa fa-user"></i> Account Detail
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a data-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                    <i class="fa fa-edit"></i> Edit Account
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a data-toggle="tab" href="#AccountPageChangeEmail" class="nav-link">
                                                    <i class="fa fa-envelope"></i> Change Email
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a data-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                    <i class="fa fa-key"></i> Reset Password
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <div class="tab-content">
                                            <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                                <table class="table table-hover table-borderless ">
                                                    <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                        <tr  class="td-role">
                                                            <th class="title"> Role: </th>
                                                            <td class="value"> <?php echo $data['role']; ?></td>
                                                        </tr>
                                                        <tr  class="td-regnum">
                                                            <th class="title"> Regnum: </th>
                                                            <td class="value"> <?php echo $data['regnum']; ?></td>
                                                        </tr>
                                                        <tr  class="td-fullname">
                                                            <th class="title"> Fullname: </th>
                                                            <td class="value"> <?php echo $data['fullname']; ?></td>
                                                        </tr>
                                                        <tr  class="td-email">
                                                            <th class="title"> Email: </th>
                                                            <td class="value"> <?php echo $data['email']; ?></td>
                                                        </tr>
                                                        <tr  class="td-phone">
                                                            <th class="title"> Phone: </th>
                                                            <td class="value"> <?php echo $data['phone']; ?></td>
                                                        </tr>
                                                        <tr  class="td-faculty">
                                                            <th class="title"> Faculty: </th>
                                                            <td class="value"> <?php echo $data['faculty']; ?></td>
                                                        </tr>
                                                        <tr  class="td-program">
                                                            <th class="title"> Programme: </th>
                                                            <td class="value"> <?php echo $data['program']; ?></td>
                                                        </tr>
                                                        <tr  class="td-status">
                                                            <th class="title"> Status: </th>
                                                            <td class="value"> <?php echo $data['status']; ?></td>
                                                        </tr>
                                                        <tr  class="td-timestamp">
                                                            <th class="title"> Timestamp: </th>
                                                            <td class="value"><?php echo human_date($data['timestamp']); ?></td>
                                                        </tr>
                                                    </tbody>    
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                                <div class=" reset-grids">
                                                    <?php  $this->render_page("account/edit"); ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane  fade" id="AccountPageChangeEmail" role="tabpanel">
                                                <div class=" reset-grids">
                                                    <?php  $this->render_page("account/change_email"); ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                                <div class=" reset-grids">
                                                    <?php  $this->render_page("passwordmanager"); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    