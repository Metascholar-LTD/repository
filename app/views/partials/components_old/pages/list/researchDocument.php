<?php
$ph = $this->set_field_value('ph');
if(!isset($ph)){
$title = 'Research Documents <div class="text-lg">Theses & Dissertations <span class="family-home">'.$total_records.'</span> records </div>';
$wrapperClass = "pb-md-3 pb-2";
include COMPS.'wt/topBarSearch2.php';
}
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
                    ['title'=>'Communities','icon'=>'pi pi-building','attr'=>'openNav="api/communityFilter/research_document/faculty/program/0/25?f=community&title=Community/Collections"'],
                    ['title'=>'Authors','icon'=>'pi pi-users','attr'=>'openNav="api/moreFilter/research_document/authors/0/20/?f=authors&title=Authors"'],
                    ['title'=>'Subjects','icon'=>'pi pi-book','attr'=>'openNav="api/moreFilter/research_document/subjects/0/20/?f=subjects&title=Subjects"'],
                    ['title'=>'Issues Date','icon'=>'pi pi-calendar','attr'=>'openNav="api/moreFilter/research_document/date(issues_date)/0/20/?f=date&title=Date Issued"'],
                ];
                include UTILS."dropdownList.php";
                ?>
            </span> 
        </div>

        <div><?php include UTILS.'filterCrumbs.php';?></div>
        
        <div class="grid3 mx-fill">
            <div class="d-none d-lg-block">
                <div class="relative h-100">
                    <?php 
                    $this->render_page("api/communityFilter/research_document/faculty/program/0/25", ['f'=>'community', 'title'=>'Communty/Collections']);
                    ?>
                </div>
            </div>
            <div class="p-3">
                <?php
                    $pageid = random_num(8); 
                    $title = 'Recently Added';
                    include COMPS."wt/exploreItems.php";
                ?>
            </div>
            <div class="d-none d-lg-block">
                <div class="h-100 relative">
                    <div class="sticky-top bg-white">
                        <div class="card p-3 shadow-0 hover-warning border border-white border-2 scroll-y bar-0" style="height:100vh;">
                            <?php 
                                $this->render_page("api/moreFilter/research_document/authors", ['f'=>'authors', 'title'=>'Authors']);
                                $wrapperClass = "mt-4";
                                $this->render_page("api/moreFilter/research_document/subjects", ['f'=>'subject', 'title'=>'Subjects']);
                                $this->render_page("api/moreFilter/research_document/date(issues_date)", ['f'=>'date', 'title'=>'Date Issued']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>