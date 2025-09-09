<div class="">
    <?php 
    $showBio = $this->set_field_value('showBio');
    $showClass = $this->set_field_value('showClass');
    $actionBtnRaw = '
    <div class="col-md-auto col-12 centeredB mt-1 mt-md-0">
        <span>
        <button class="{{btn}} {{assBtn}} mr-2" modal-size="modal-xl" href="'.SITE_ADDR.'students_promote/assessments/{{pid}}">{{assessmentText}}</button>
        <button class="{{btn}} {{attBtn}} mr-2" modal-size="modal-xl" href="'.SITE_ADDR.'students_promote/attendance/{{pid}}">Attendance</button>
        <button class="{{btn}} {{billBtn}}" modal-size="modal-lg" href="'.SITE_ADDR.'students_promote/billing/{{pid}}">Billing</button>
        </span>
        <button class="bg-0"><i class="pi pi-ellipsis-h"></i></button>
    </div>';
    foreach($records as $data){
        $recid = $data['id'];
        $billBtn = $data['status']!='1'?'bg-0 border':'';
        $assBtn = $data['status']!='1'?'bg-0 border':'alert-success';
        $assText = $data['status']=='1'?'Assessment':'Result';
        $attBtn = $data['status']!='1'?'bg-0 border':'alert-warning';
        $actionBtn = str_replace('{{assessmentText}}', $assText, $actionBtnRaw);
        $actionBtn = str_replace('{{recid}}',$recid, $actionBtn);
        $actionBtn = str_replace('{{pid}}',$data['pid'], $actionBtn);
        $actionBtn = str_replace('{{btn}}','round-sm p-1 px-2 small page-modal', $actionBtn);
        $actionBtn = str_replace('{{billBtn}}',$billBtn, $actionBtn);
        $actionBtn = str_replace('{{assBtn}}',$assBtn, $actionBtn);
        $actionBtn = str_replace('{{attBtn}}',$attBtn, $actionBtn);
    ?>
    <div class="">
        <div class="card p-3 shadow-0 hover-warning border-2 border">
            <div class="text-md bold-sm">
                <a class="mr-1"><?=toTerm($data['session'])?></a>
                <a class=""><?=$data['code']?></a>
            </div>
            <div class="text-400 row align-items-center ">
                <div class="col-md col-12">
                    <?=$data['classroomTitle']?> 
                    <i class="pi pi-arrow-right small"></i> 
                    <?=$data['year']?>
                </div>
                <?php echo $actionBtn;?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>