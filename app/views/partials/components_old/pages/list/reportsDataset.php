<?php
$title = 'Reports & Dataset  <div class="text-lg"><span class="family-home">'.$total_records.'</span> records </div>';
$wrapperClass = "pb-md-3 pb-2";
include COMPS.'wt/topBarSearch2.php';
?>
<div class="pageSection pt-0">
    <div class="container px-0">
        <div class="centeredB mb-3 mb-md-1">
            <span class="d-block d-lg-none">
                <i class="pi pi-list mr-2"></i> <?=$total_records?> Records
            </span>
            <span class="d-block d-lg-none has-children">
                <button class="bg-0"> Filter Result <i class="pi pi-filter ml-2"></i></button>
                <?php 
                $title = 'Filter Page Records By:';
                $class = "right-0";
                $dropdownItems = [
                    ['title'=>'Authors','icon'=>'pi pi-users','attr'=>'openNav="api/moreFilter/reports_dataset/authors/0/20/?f=authors&title=Authors"'],
                    ['title'=>'Yaer Published','icon'=>'pi pi-calendar','attr'=>'openNav="api/moreFilter/reports_dataset/year_published/0/20/?f=year&title=Year Published"'],
                ];
                include UTILS."dropdownList.php";
                ?>
            </span> 
        </div>


        <div><?php include UTILS.'filterCrumbs.php';?></div>
        <div class="row">
            <div class="col-4 d-none d-md-block">
                <div class="h-100 relative">
                    <div class="sticky-top bg-white">
                        <div class="card p-3 shadow-0 hover-warning border border-white border-2 scroll-y bar-0" style="height:100vh;">
                            <?php 
                                $this->render_page("api/moreFilter/reports_dataset/authors", ['f'=>'authors', 'title'=>'Authors']);
                                $wrapperClass = "mt-4";
                                $this->render_page("api/moreFilter/reports_dataset/year_published", ['f'=>'year', 'title'=>'Year Published']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md col-12">
                <?php 
                    $title = 'Recently Added';
                    include COMPS."wt/reportsDatasetItems.php";
                ?>
            </div>
        </div>
    </div>
</div>