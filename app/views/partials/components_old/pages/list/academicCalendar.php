<?php
$title = 'Academic Calendar  <div class="text-lg"><span class="family-home">'.$total_records.'</span> records </div>';
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
                    ['title'=>'Faculty','icon'=>'pi pi-book','attr'=>'openNav="api/moreFilter/academic_calendar/faculty/0/20/?f=faculty&title=Faculty"'],
                    ['title'=>'Year','icon'=>'pi pi-calendar','attr'=>'openNav="api/moreFilter/academic_calendar/year/0/20/?f=year&title=Year"'],
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
                                $this->render_page("api/moreFilter/academic_calendar/faculty", ['f'=>'faculty', 'title'=>'Faculty']);
                                $this->render_page("api/moreFilter/academic_calendar/year", ['f'=>'year', 'title'=>'Year']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <?php 
                    $title = 'Recently Added';
                    include COMPS."wt/academicCalendarItems.php";
                ?>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
var arr = []
;
// importRecs(
//     'academic_calendar/add',
//     arr
// );
})
</script>