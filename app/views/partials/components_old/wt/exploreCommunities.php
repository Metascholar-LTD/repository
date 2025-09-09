<?php
$comData = $this->view_data;
$apiPath = $this->set_current_page_link();
$pt = $this->set_field_value('title');
$path = $this->set_field_value('f');
$sel = $this->set_field_value($path);
?>
<div class="sticky-top bg-white w-100">
    <div class="card p-3 shadow-0 hover-warning border border-white border-2 scroll-y bar-0" filterPath="<?=$apiPath.'?f='.$path?>">
        <div class="">
            <h4 class="font2 bold text-black"><?=$pt?></h4>
        </div>
        <hr class="border border-danger short"/>
        <div class="mb-3">
            <input class="form-control" searchFilterItems type="text" name="search" autocomplete="off" placeholder="search Faculty & Programs">
        </div>
        <div class="filterItems">
            <ul class="w-100 scroll-y" style="line-height: 200%; height:74vh;">
                <?php foreach($comData as $item){
                $title = $item['title'];
                $isSel = $sel==strtolower($title)?'checked':null;?>
                <li onclick="closeSideNav();">
                    <label class="custom-control custom-checkbox custom-control-inline py-1" to filter="<?=$path.'='.$item['title'];?>">
                        <input class="optioncheck custom-control-input" <?=$isSel?> name="name" type="checkbox"/>
                        <span class="custom-control-label pt-1 text-capitalize"> &nbsp; <?=$title?></span>
                    </label>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>