<?php
$fullname = $data['firstname'].' '.$data['middlename'].' '.$data['lastname'];
?>
<div class="py-3">
    <div>
        <div class="row">
            <div class="col-md-4 bg-white col-12">
                <div class="">
                  <div class="bg-white">
                    <div class="">
                        <div class="text-centeri">
                            <div class="mb-2">
                                <div class="avt surface avt-md fit-object">
                                    <img src="<?php print_link(set_img_src($data['profile_picture'],100,100));?>"/>
                                </div>
                            </div>
                            <div class="text-lg bold"><?=$fullname;?></div>
                            <div class="text-400">RegNo: SMS/<?=$data['id']?>/23</div>
                            <div class="text-400 small"><?=$data['role']?> Account</div>
                        </div>
                    </div>
                    <hr/>
                    <div class="mb-2 text-primary">Biography</div>
                    <div class="mb-2">
                        <div class="text-muted small">Sex</div>
                        <div><?=$data['sex']?></div>
                    </div>
                    <div class="mb-2">
                        <div class="text-muted small">Date of birth</div>
                        <div><?=$data['date_of_birth'].' ~ '.relative_date($data['date_of_birth'])?></div>
                    </div>
                    <div class="mb-2">
                        <div class="text-muted small">Religion</div>
                        <div><?=$data['religion']?></div>
                    </div>
                    <hr/>
                    <div class="mb-2 text-primary">Associated parents</div>
                    <?php $this->render_page('assigned_student_parent/parent/studentID/'.$data['id']);?>
                    <div class="py-3 small">
                        Powered and developed by <br/>Twozik.com
                    </div>
                  </div>
                </div>
            </div>
            <div class="col bg-white">
                <div class="bg-white centeredB my-4 ">
                    <h4 class="bold">Records History</h4>
                    <div class="">
                        <button class="bg-white">Make Payment</button>
                        <button class="bg-white">Print Result</button>
                    </div>
                </div>
                <div class="">
                    <?=render_data('studentclass/profilelist/id/'.$data['id'].'?showClass=1&showBio=0');?>
                </div>
            </div>
        </div>
    </div>
</div>