<div class="">
    <?php 
    $showBio = $this->set_field_value('showBio');
    $showClass = $this->set_field_value('showClass');
    $actionBtnRaw = '
    <div class="col-md-auto col-12 centeredB mt-1">
        <button class="pill p-1 px-2 small page-modal" modal-size="modal-xl" href="'.SITE_ADDR.'accounts/view/{{recid}}">View profile</button>
        <button class="bg-0"><i class="pi pi-ellipsis-h"></i></button>
    </div>';
    foreach($records as $data){
        $recid = $data['id'];
        $actionBtn = str_replace('{{recid}}',$recid, $actionBtnRaw);
    ?>
    <div class="">
        <div class="card p-3 shadow-0 hover-warning border-2 border">
            <div class="text-md bold-sm">SMS/<?=$data['id']?>/23 <?=$data['fullname']?></div>
            <div class="text-muted row align-items-center">
                <div class="col-md col-12">
                    <span class="mr-2">
                        Date of Birth: 
                        <span class="alert-success small pill p-1 px-2"><?=relative_date($data['DOB'])?></span>
                    </span>
                    <span class="mr-2"><?=colorBadge($data['sex'])?></span>
                    <span class=""><?=$data['religion']?></span>
                </div>
                <?php if(!$showClass) echo $actionBtn;?>
            </div>
            <?php if($showClass){?>
            <div class="text-400 row align-items-center mt-1">
                <div class="col-md col-12">
                    <a class="mr-3">
                        <?=$data['code']?> <i class="pi pi-arrow-right small"></i> <?=$data['classroomTitle']?>
                    </a>
                    <a class="mr-3"><?=$data['year']?></a>
                    <a class=""><?=toTerm($data['session'])?></a>
                </div>
                <?php echo $actionBtn;?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>