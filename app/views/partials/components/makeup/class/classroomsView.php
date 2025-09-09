<?php 
$rec_id = $data['id'];
$year = $this->set_field_value('year');
$session = $this->set_field_value('session');
$year = !empty($year)?$year:AYR;
$session = !empty($session)?$session:ASS;
?>
<div class="mb-4 classViewCount">
    <div class="">
        <div class="mt-3">
            <h2 class="bold"><?=$data['title']?></h2>
            <div>
                <?=toTerm($session).' - '.$year?>
            </div>
        </div>
        <hr/>
        <div class="row align-items-center mb-3">
            <div class="col-auto">
                <div class="avt avt-m fit-object">
                    <img src="<?php print_link(set_img_src($data['staffaccounts_profile_picture'],100,100));?>"/>
                </div>
            </div>
            <div class="col">
                <div class="">Form Teacher: <?=$data['staffaccounts_fullname'];?></div>
                <div class="">
                    <span class="text-400">BEd. English Language</span>
                </div>
            </div>
            <div class="col-md-auto col-12 mt-2 mt-md-0">
                <div class="">
                    <button class="alert-success mr-3 pill small"><i class="pi pi-check"></i> Active</button> 
                    <a class="mr-3 text-primary"><i class="pi pi-phone btn btn-sm"></i>Call</a>
                    <a class="text-primary"><i class="pi pi-envelope btn btn-sm"></i>Message</a>
                </div>
            </div>
        </div>

        <?php include 'viewCounter/index.php';?>
        <div class="">
            <div class="row mb-3 mt-4">
                <div class="col">
                    <h3 class="bold">Class list</h3>
                </div>
                <div class="col-md-4 col-auto centeredL">
                    <input class="form-control bg-light d-none d-md-block" placeholder="search student"/>
                    <button class="bg-0 pi pi-search"></button>
                </div>
            </div>
            <?= render_data("studentclass/list/classroom/$rec_id?showClass=0&studentclass.session=$session&studentclass.year=$year")?>
        </div>
    </div>
</div>
<div class="centeredR p-3  sticky-bottom">
    <div class="has-children">
        <button class="btn btn-primary avt avt-md">
            <i class="pi pi-plus text-lg"></i>
        </button>
        <?php 
        $class = "right-0";
        $dropdownItems = [
            [
                'title'=>'Change Session',
                'icon'=>'pi pi-calendar', 
                'attr'=>"onclick=openNav('more','comps/filterClassRoomSession?classid=".$rec_id."')"
            ],
            ['title'=>'Mark attendance','icon'=>'pi pi-check-circle', 'attr'=>''],
            ['title'=>'Assigned Teacher','icon'=>'pi pi-user', 'attr'=>'']
        ];
        include UTILS."dropdownList.php";?>
    </div>
</div>
                        


