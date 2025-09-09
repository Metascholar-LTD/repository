<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("research_document/add");
$can_edit = ACL::is_allowed("research_document/edit");
$can_view = ACL::is_allowed("research_document/view");
$can_delete = ACL::is_allowed("research_document/delete");
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
    <div  class="my-4">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12 mb-4 comp-grid">
                    <div class=""><?php
                        $filterItem = '
                        <button class="mr-2 bg-filter" openNav="api/moreFilter/research_document/date(issues_date)/0/20/?f=date&title=Date Issued">
                            <i class="text-md pi pi-calendar"></i> Issues date
                        </button>
                        ';
                        $filterItem = $filterItem.'
                        <button class="mr-2 bg-filter" openNav="api/moreFilter/research_document/authors/0/20/?f=authors&title=Authors">
                            <i class="text-md pi pi-users"></i> Authors
                        </button>
                        ';
                        $filterItem = $filterItem.'
                        <button class="mr-2 bg-filter" openNav="api/moreFilter/research_document/subjects/0/20/?f=subjects&title=Subjects">
                            <i class="text-md pi pi-book"></i> Subjects
                        </button>
                        ';
                        $filterItems = $filterItem;
                        $pageTitle = 'Research Document';
                        $root = $pageTitle;
                        $allLink = 'research_document/admin';
                        $pending = 'research_document/admin/?status=0.0&ps=-1';
                        $approved = 'research_document/admin/?status=1&ps=-1';
                        $revised = 'research_document/admin/?status=0.5&ps=-1';
                        $reject = 'research_document/admin/?status=-1&ps=-1';
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
                        <div id="research_document-admin-records" class="card shadow-sm">
                            <div id="page-report-body" class="table-responsive">
                                <table class="table table-hover table-sm text-left">
                                    <thead class="text-black ">
                                        <tr>
                                            <?php if($can_delete){ ?>
                                            <th class="td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </th>
                                            <?php } ?>
                                            <th  class="td-title"> Title</th>
                                            <th  class="td-status"> Status</th>
                                            <th  class="td-lastupdate"> Lastupdate</th>
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
                                                <td class="td-title"><div class=""><?=$data['ctrl']?></div>
                                                    <div class="text-primary text-md"><?php echo $data['title']; ?></div>
                                                    <div class="text-400"><?=$data['degree']?></div>
                                                    <div class="text-black"><?=$data['authors']?></div>
                                                    <div class="text-muted"><?=$data['issues_date']?></div>
                                                    <div class="d-none editfile<?=$rec_id?>">
                                                        <a class="dropdown-item" href="<?php print_link("research_document/editfile/$rec_id"); ?>">
                                                            <i class="fa fa-file"></i> Edit File
                                                        </a>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function(){insertEditFile(".editfile<?=$rec_id?>")})
                                                    </script></td>
                                                    <td class="td-status"><div class="" setStatus="research_document" id="<?=$data['id']?>" ctrl="<?=$data['ctrl']?>">
                                                        <div class="centeredL has-children"><?=setStatusDom($data['status'], $data['ctrl']);?></div>
                                                    </div></td>
                                                    <td class="td-lastupdate"> <?php echo $data['lastupdate']; ?></td>
                                                    <td class="page-list-action td-btn">
                                                        <div class="dropdown" >
                                                            <button data-toggle="dropdown" class="dropdown-toggle btn btn-primary btn-sm">
                                                                <i class="fa fa-bars"></i> 
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <?php if($can_view){ ?>
                                                                <a class="dropdown-item" href="<?php print_link("research_document/view/$rec_id"); ?>">
                                                                    <i class="fa fa-eye"></i> View 
                                                                </a>
                                                                <?php } ?>
                                                                <?php if($can_edit){ ?>
                                                                <a class="dropdown-item" href="<?php print_link("research_document/edit/$rec_id"); ?>">
                                                                    <i class="fa fa-edit"></i> Edit
                                                                </a>
                                                                <?php } ?>
                                                                <?php if($can_delete){ ?>
                                                                <a  class="dropdown-item record-delete-btn" href="<?php print_link("research_document/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("research_document/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
