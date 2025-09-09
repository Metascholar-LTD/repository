<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("accounts/add");
$can_edit = ACL::is_allowed("accounts/edit");
$can_view = ACL::is_allowed("accounts/view");
$can_delete = ACL::is_allowed("accounts/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class=""><?php
                        $filterItem = '
                        <button class="mr-2 bg-filter" openNav="api/moreFilter/accounts/program/0/20/?f=program&title=Programs">
                            <i class="text-md pi pi-calendar"></i> Programs
                        </button>
                        ';
                        $filterItem = $filterItem.'
                        <button class="mr-2 bg-filter" openNav="api/moreFilter/accounts/faculty/0/20/?f=faculty&title=faculties">
                            <i class="text-md pi pi-book"></i> faculties
                        </button>
                        ';
                        $filterItems = $filterItem;
                        $pageTitle = 'Research Document';
                        $root = $pageTitle;
                        $allLink = 'accounts/list';
                        $pending = 'accounts/list/?status=0.0&ps=-1';
                        $approved = 'accounts/list/?status=1&ps=-1';
                        $revised = 'accounts/list/?status=0.5&ps=-1';
                        $reject = 'accounts/list/?status=-1&ps=-1';
                        $ft = $this->set_field_value('status');
                        $aval = !isset($ft)? 'val' : 'va';
                        $pval = $ft === strtolower("0.0") ? 'val' : 'va';
                        $apval = $ft == strtolower("1") ? 'val' : 'va';
                        $rval = $ft == strtolower("0.5") ? 'val' : 'va';
                        $rjval = $ft == strtolower("-1") ? 'val' : 'va';
                        $countItems = [
                        ['text'=>'All records', $aval=>$total_records, 'state'=>isActive($allLink, $current_page), 'attr'=>'to href="'.$allLink.'"'],
                        ['text'=>'Pending', $pval=>$total_records, 'state'=>isActive($pending, $current_page), 'attr'=>'to href="'.$pending.'"'],
                        ['text'=>'Approved', $apval=>$total_records, 'state'=>isActive($approved, $current_page), 'attr'=>'to href="'.$approved.'"'],
                        ['text'=>'Revised', $rval=>$total_records, 'state'=>isActive($revised, $current_page), 'attr'=>'to href="'.$revised.'"'],
                        ['text'=>'Reject', $rjval=>$total_records, 'state'=>isActive($reject, $current_page), 'attr'=>'to href="'.$reject.'"'],
                        ];
                        include UTILS.'breadCrumbs.php';
                        include UTILS.'listPageHead.php';
                        include UTILS.'listPageFilters.php';
                        include UTILS.'filterCrumbs.php';
                        include UTILS.'listPageInLineCount.php';
                    ?></div>
                </div>
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="pageRecords animated fadeIn page-content">
                        <div id="accounts-list-records" class="card shadow-lg">
                            <div id="page-report-body" class="table-responsive">
                                <table class="table table-hover table-sm text-left">
                                    <thead class="text-black">
                                        <tr>
                                            <?php if($can_delete){ ?>
                                            <th class="td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </th>
                                            <?php } ?>
                                            <th  class="td-img"> Img</th>
                                            <th  class="td-fullname"> Fullname</th>
                                            <th  class="td-role"> Role</th>
                                            <th  class="td-faculty"> Faculty</th>
                                            <th  class="td-program"> Programme</th>
                                            <th  class="td-status"> Status</th>
                                            <th  class="td-timestamp"> Timestamp</th>
                                            <th class="td-btn"></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if(!empty($records)){
                                    ?>
                                    <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                        <!--record-->
                                        <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                        $counter++;
                                        ?>
                                        <tr>
                                            <?php if($can_delete){ ?>
                                            <th class=" td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <td class="td-img"><?php Html :: page_img($data['img'],30,30,1); ?></td>
                                                <td class="td-fullname"><div><?php echo $data['fullname']; ?></div>
                                                    <div class="small text-muted"><?php echo $data['email'];?></div>
                                                </td>
                                                <td class="td-role"> <?php echo $data['role']; ?></td>
                                                <td class="td-faculty"> <?php echo $data['faculty']; ?></td>
                                                <td class="td-program"> <?php echo $data['program']; ?></td>
                                                <td class="td-status"><div class="" setStatus="accounts" id="<?=$data['id']?>" ctrl="<?=$data['ctrl']?>">
                                                    <div class="centeredL has-children"><?=setStatusDom($data['status'], $data['ctrl']);?></div>
                                                </div></td>
                                                <td class="td-timestamp">
                                                    <span title="<?php echo human_datetime($data['timestamp']); ?>" class="has-tooltip">
                                                        <?php echo relative_date($data['timestamp']); ?>
                                                    </span>
                                                </td>
                                                <td class="page-list-action td-btn">
                                                    <div class="dropdown" >
                                                        <button data-toggle="dropdown" class="dropdown-toggle btn btn-primary btn-sm">
                                                            <i class="fa fa-bars"></i> 
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <?php if($can_view){ ?>
                                                            <a class="dropdown-item" href="<?php print_link("accounts/view/$rec_id"); ?>">
                                                                <i class="fa fa-eye"></i> View 
                                                            </a>
                                                            <?php } ?>
                                                            <?php if($can_edit){ ?>
                                                            <a class="dropdown-item" href="<?php print_link("accounts/edit/$rec_id"); ?>">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                            <?php } ?>
                                                            <?php if($can_delete){ ?>
                                                            <a  class="dropdown-item record-delete-btn" href="<?php print_link("accounts/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                <i class="fa fa-times"></i> Delete 
                                                            </a>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php 
                                    if(empty($records)){
                                    ?>
                                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                        <i class="fa fa-ban"></i> No record found
                                    </h4>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if( $show_footer && !empty($records)){
                                ?>
                                <div class=" border-top mt-2">
                                    <div class="row justify-content-center">    
                                        <div class="col-md-auto justify-content-center">    
                                            <div class="p-3 d-flex justify-content-between">    
                                                <?php if($can_delete){ ?>
                                                <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("accounts/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                    <i class="fa fa-times"></i> Delete Selected
                                                </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col">   
                                            <?php
                                            if($show_pagination == true){
                                            $pager = new Pagination($total_records, $record_count);
                                            $pager->route = $this->route;
                                            $pager->show_page_count = true;
                                            $pager->show_record_count = true;
                                            $pager->show_page_limit =true;
                                            $pager->limit_count = $this->limit_count;
                                            $pager->show_page_number_list = true;
                                            $pager->pager_link_range=5;
                                            $pager->render();
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
