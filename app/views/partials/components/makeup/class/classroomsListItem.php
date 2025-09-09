<div class="">
    <div class="">
        <div class="">
            <div class="card border hover-warning border-2 shadow-0 p-3">
                <div class="row no-gutters">
                    <div class="col">
                        <a class="mb-2 bold text-md d-block" to href="<?php print_link('classrooms/view/'.$data['id']);?>">
                            <i class="pi pi-users text-primary text-lg mr-2"></i>
                            <?=$data['classlevels_code']?>
                            <i class="pi pi-arrow-right mx-2"></i>
                            <?=$data['title']?>
                        </a>
                        <div class="mb-1">
                            <span class="text-400">2022/2023 ~ 1st Sem.</span> &bullet; 
                            <span class="text-400">34 student</span> &bullet; 
                            <span class="text-warning">16 subjects</span>
                        </div>
                        <div class="centeredB">
                            <a to href="">
                                <img class="avt avt-xs" src="<?php print_link(set_img_src($data['staffaccounts_profile_picture'],100,100))?>"/>
                                <span class="text-muted small"><?=$data['staffaccounts_fullname']?></span>
                            </a>
                            <span>
                                <button class="bg-0 pi pi-ellipsis-h"></button>
                                <button class="bg-0 pi pi-chevron-down small"></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>