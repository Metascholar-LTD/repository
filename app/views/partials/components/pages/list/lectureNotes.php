<?php
$title = 'Lecture Notes+';
// <div class="text-lg"><span class="family-home">'.$total_records.'</span> records </div>
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
                    ['title'=>'Lecturers','icon'=>'pi pi-users','attr'=>'openNav="api/moreFilter/lecture_notes/lecturer/0/20/?f=lecturer&title=Lecturers"'],
                    ['title'=>'Programs','icon'=>'pi pi-book','attr'=>'openNav="api/moreFilter/lecture_notes/program/0/20/?f=program&title=Programs"'],
                    ['title'=>'Yaer Published','icon'=>'pi pi-calendar','attr'=>'openNav="api/moreFilter/lecture_notes/academic_year/0/20/?f=year&title=Academic Year"'],
                ];
                include UTILS."dropdownList.php";
                ?>
            </span> 
        </div>


        <div><?php include UTILS.'filterCrumbs.php';?></div>
        <div class="row">
            <div class="col-4 d-none d-md-block">
                <div class="h-100 relative">
                    <div class="bg-white">
                        <div class="card p-3 shadow-0 border border-white border-2 bar-0" style="height:100%;">
                            <?php 
                                $this->render_page("api/moreFilter/lecture_notes/lecturer", ['f'=>'lecturer', 'title'=>'Lecturers']);
                                $wrapperClass = "mt-4";
                                $this->render_page("api/moreFilter/lecture_notes/program", ['f'=>'program', 'title'=>'Programs']);
                                $this->render_page("api/moreFilter/lecture_notes/academic_year", ['f'=>'year', 'title'=>'Academic Year']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md col-12">
                <?php 
                    $title = 'Recent Submissions';
                    include COMPS."wt/notesItems.php";
                ?>
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