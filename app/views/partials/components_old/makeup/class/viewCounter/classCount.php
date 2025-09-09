<?php 
$count_id = random_num(11);
$ctrl = new ApiController;
$countClass = $ctrl->countStudentsInClassRoom($rec_id, $year, $session);
$present = $ctrl->countClassAttendance($rec_id, date_now());
$abscent = $countClass - $present;
?>
<div class="">
    <div class="border border-2 hover-primary shadow-0 card p-3 o-0" style="width:100%; padding-bottom:0px !important;">
        <div class="row">
            <div class="col">
                <div class="">Current class count</div>
                <h3 class="bold mb-2"><?=$countClass?> students</h3>
                <?php if($session == ASS && $year == AYR){?>
                <div class="">
                    <div class="mb-1">
                        <i class="pi pi-check text-success"></i> <b><?=$present?></b> Present
                    </div>
                    <div>
                        <i class="pi pi-times text-danger"></i> <b><?=$abscent?></b> Abscent
                    </div>
                </div>
                <?php }  else { ?>
                <div class="">
                    <div class="mb-1"><i class="pi pi-check text-success"></i> *** Present</div>
                    <div><i class="pi pi-times text-danger"></i> *** Abscent</div>
                </div>
                <?php } ?>
            </div>
            <div class="col-auto pl-0">
                <div class="">
                    <div class="">
                        <div 
                            id="classCount<?=$count_id?>single-ldbar"
                            data-preset="fan"
                            data-type="stroke" 
                            data-stroke-trail-width="5"
                            data-stroke-width="15"
                            class="ldBar bold label-center label-lg" 
                            data-value="0" 
                            style="width:140px;height:120px;"
                            data-stroke="data:ldbar/res,gradient(25,5,#ca53ee,#ff5cad,#ca53ee)">
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
                    <button class="btn btn-sm btn-outline-dark page-modal" modal-size="modal-xl" href='<?php print_link("attendance/class?session=$session&year=$year&classroom=$rec_id");?>'>
                        Explode More <i class="pi pi-chevron-right small"></i>
                    </button>
                </div>
            </div>   
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var bar = new ldBar("#classCount<?=$count_id?>single-ldbar");
    setTimeout(() => {
        bar.set(<?=($present*100)/$countClass?>,true);
    },1000);
})
</script>
<style>
#classCount<?=$count_id?>single-ldbar .ldBar-label{
    font-size: 18px;
    text-align: center;
    position: absolute;
    left: 67px;
    transform: translateX(-5px);
    top: 60px;
}
</style>