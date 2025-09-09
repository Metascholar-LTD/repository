<?php
$comData = $this->view_data;
$apiPath = $this->set_current_page_link();
$pt = $this->set_field_value('title');
$path = $this->set_field_value('f');
$sel = $this->set_field_value($path);
?>
<div class="sticky-top bg-white w-100">
    <div class="card p-3 shadow-0 border border-white border-2 scroll-y bar-0" filterPath="<?=$apiPath.'?f='.$path?>">
        <!-- <div class="">
            <h4 class="font2 bold text-black"><?=$pt?></h4>
        </div>
        <hr class="border border-danger short"/> -->

        <div class="submain-5">
            <div class="t3-module module mb-3 " id="Mod334">
                <div class="module-inner">
                    <h3 class="module-title ">
                        <span class="titlecard">Community and collections</span>
                    </h3>
                    <div class="module-ct">
                        <div id="mod-custom334" class="mod-custom custom">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <input class="form-control" searchFilterItems type="text" name="search" autocomplete="off" placeholder="search Faculty & Programs">
        </div>
        <div class="filterItems">
        <?php
            // Initialize an array to store counts for each title
            $counts = [];

            // First pass: Count all occurrences of each title
            foreach ($comData as $item) {
                $title = $item['title'];
                
                if (!isset($counts[$title])) {
                    $counts[$title] = 1;
                } else {
                    $counts[$title]++;
                }
            }

            // Second pass: Display unique titles with their counts
            ?>
            <ul class="w-100 scroll-y" style="line-height: 200%; height:70%;">
                <?php foreach ($counts as $title => $count): ?>
                    <li onclick="closeSideNav();">
                        <label class="custom-control-inline py-1" to filter="<?=$path.'='.$title;?>">
                            <!-- <input class="optioncheck custom-control-input" <?=$isSel?> name="name" type="checkbox"/> -->
                            <span class="custom-control-label pt-1 text-capitalize"> &nbsp; <?=$title?></span> &nbsp;
                            <?php if ($count > 0) : ?>
                                <span class="badge badge-primary badge-circle"><?=$count?></span>
                            <?php endif; ?> 
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>


        </div>
    </div>
</div>