<?php 
$ctrl = new ApiController;
$subjects = $ctrl->countSubjectsInClassRoom($rec_id, $year, $session);
$subjectCount = COUNT($subjects);
?>
<div class="owl-item">
    <div class="border border-2 hover-primary shadow-0 card p-3 o-0" style="width:100%; padding-bottom:0px !important;">
        <div class="row">
            <div class="col">
                <div class="">Class Assessment.</div>
                <h3 class="bold"><?=$subjectCount?> Subjects</h3>
                <div class="small">
                    <div class="mb-1">
                        <div class="text-muted">Top 3:</div>
                        <?php $i = 0; foreach($subjects as $subject){$i++;if($i<=3){?>
                        <div class=""><i class="pi pi-arrow-right mr-1"></i> <?=$subject['title']?></div>
                        <?php } } ?> 
                    </div>
                </div>
            </div>
            <div class="col-auto pl-0">
                <div class="">
                    <div class="">
                        <div 
                            id="classSubjectCount<?=$rec_id?>single-ldbar"
                            data-preset="fan"
                            data-type="stroke" 
                            data-stroke-trail-width="5"
                            data-stroke-width="15"
                            class="ldBar bold label-center label-lg" 
                            data-value="0" 
                            style="width:140px;height:120px;"
                            data-stroke="data:ldbar/res,gradient(0,7,#ffd477,#ffa55b,#ffbb00,#ffd477)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-fill">
            <div class="col-12 centeredB border-top p-3 bg-white">
                <div class="small text-muted">
                    23rd Jun 2023
                </div>
                <div class="">
                    <?php $query = "?assigned_subjects.academicYear=$year&assigned_subjects.session=$session";?>
                    <button class="btn btn-sm btn-outline-dark" openNav="assigned_subjects/perclass/classroom/<?=$rec_id.$query?>">
                        Explode More <i class="pi pi-chevron-right small"></i>
                    </button>
                </div>
            </div>   
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var bar = new ldBar("#classSubjectCount<?=$rec_id?>single-ldbar");
    setTimeout(() => {
        bar.set(<?=($subjectCount*100)/$subjectCount?>,true);
    },1000);
})
</script>
<style>
#classSubjectCount<?=$rec_id?>single-ldbar .ldBar-label{
    font-size: 18px;
    text-align: center;
    position: absolute;
    left: 67px;
    transform: translateX(-5px);
    top: 60px;
}
</style>