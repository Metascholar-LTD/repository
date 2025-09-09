<?php
$filterData = $this->view_data;
$apiPath = $this->set_current_page_link();
$table = 'research_document';
$path = $this->set_field_value('f');
$pt = $this->set_field_value('title');
$sel = $this->set_field_value($path);
?>
<div class="mb-4">
    <div>
        <div filterPath="<?=$apiPath.'?f='.$path?>">
            <div class="">
                <h4 class="font2 bold text-black"><?=$pt?></h4>
            </div>
            <hr class="border border-danger my-2 short"/>
            <div class="">
                <input class="form-control" searchFilterItems type="text" name="search" autocomplete="off" placeholder="search authour by name">
            </div>
            <div class="filterItems">
                <ul style="line-height: 200%">
                    <?php foreach($filterData as $item){
                    $title = $item['title'];
                    $isSel = $sel==strtolower($title)?'checked':null;?>
                    <li onclick="closeSideNav();">
                        <label class="custom-control custom-checkbox custom-control-inline text-truncate py-1" to filter="<?=$path.'='.$title;?>">
                            <input class="optioncheck custom-control-input" <?=$isSel?> name="name" type="checkbox"/>
                            <span class="custom-control-label pt-1 text-capitalize"> &nbsp; <?=$title?></span>
                        </label>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-2"><button class="text-primary btn-sm" openNav="<?=$apiPath.'/0/20/?f='.$path.'&limit=20&title='.$pt?>">List More</button></div>
</div>