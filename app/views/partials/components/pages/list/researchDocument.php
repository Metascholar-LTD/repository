<?php
$ph = $this->set_field_value('ph');
if(!isset($ph)){
$title = 'Theses & Dissertations';
// <div class="text-lg">Theses & Dissertations <span class="family-home">'.$total_records.'</span> records </div>
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
            <div class="d-none d-lg-block ml-3">
                <div class="relative h-100">
                        <?php 
                        $this->render_page("api/communityFilter/research_document/faculty/program/0/20000", ['f'=>'community', 'title'=>'Communty/Compendiums']);
                        ?>
                    
                </div>
            </div>

            <div class="p-3" style="background-color: #F0F4F9 !important;">
          
                <?php
                    $pageid = random_num(8); 
                    $title = 'Recent Submissions';
                    include COMPS."wt/exploreItems.php";
                ?>
            </div>
            <div class="d-none d-lg-block" style="background-color: #F0F4F9 !important;">
                <div class="relative">
                    <div>
                        <div class="">
                            <?php 
                                $this->render_page("api/moreFilter/research_document/authors", ['f'=>'authors', 'title'=>'Authors']);
                                $wrapperClass = "mt-4";
                                $this->render_page("api/moreFilter/research_document/subjects", ['f'=>'subjects', 'title'=>'Subjects']);
                                $this->render_page("api/moreFilter/research_document/issues_date", ['f'=>'issues_date', 'title'=>'Date Issued']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .module-title {
        border-bottom: 5px solid #004C23;

    }

    .titlecard {
        background: #004C23;
        display: inline-block;
        color: #ffffff;
        padding: 5px;
        font-size: 17px;
    }

    .badge-circle {
        border-radius: 50%;
        width: 20px; /* Adjust the width and height as needed for your design */
        height: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>