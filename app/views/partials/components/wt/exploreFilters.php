<?php
$filterData = $this->view_data;
$apiPath = $this->set_current_page_link();
$table = 'research_document';
$path = $this->set_field_value('f');
$pt = $this->set_field_value('title');
$sel = $this->set_field_value($path);
?>
<div class="bg-white mb-4">
    <div class="card p-3 shadow-0 border border-white border-2">
        <div filterPath="<?=$apiPath.'?f='.$path?>">
            <!-- <div class="">
                <h4 class="font2 bold text-black"><?=$pt?></h4>
            </div>
            <hr class="border border-danger my-2 short"/> -->

            <div class="submain-5">
            <div class="t3-module module mb-3 " id="Mod334">
                <div class="module-inner">
                    <h3 class="module-title ">
                        <span class="titlecard"><?=$pt?></span>
                    </h3>
                    <div class="module-ct">
                        <div id="mod-custom334" class="mod-custom custom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="">
                <input class="form-control" searchFilterItems type="text" name="search" autocomplete="off" placeholder="type to search">
            </div>
            <div class="filterItems">
                <ul style="line-height: 200%">
                    <?php 
                    $counts = []; // Array to store counts for each title
                    foreach($filterData as $item){
                    $title = $item['title'];
                    $isSel = $sel==strtolower($title)?'checked':null;
                    
                    // Increment count for each title
                    if (!isset($counts[$title])) {
                        $counts[$title] = 1;
                    } else {
                        $counts[$title]++;
                    }

                    // Display the count within the span element
                    $count = isset($counts[$title]) ? $counts[$title] : 0;
                    ?>
                    <li onclick="closeSideNav();">
                        <label class="custom-control-inline text-truncate py-1" to filter="<?=$path.'='.$title;?>">
                            <!-- <input class="optioncheck custom-control-input" <?=$isSel?> name="name" type="checkbox"/> -->
                            <span class="custom-control-label pt-1 text-capitalize"> &nbsp; <?=$title?></span> &nbsp;
                            <!-- <?php if ($count > 0) : ?>
                                <span class="badge badge-primary badge-circle"><?=$count?></span>
                            <?php endif; ?> -->
                        </label>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
        // Assuming $filterData is an array, you can use count() to check the number of elements
        if (count($filterData) > 1) {
            echo '<div class="p-3"><button class="text-primary btn-sm" openNav="' . $apiPath . '/0/20/?f=' . $path . '&limit=20&title=' . $pt . '">Expand</button></div>';
        }   
    ?>
</div>