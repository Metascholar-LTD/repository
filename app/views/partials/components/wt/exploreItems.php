<?php
if(!isset($records))$records = [];
if(!isset($title) || empty($title))$title = 'Recently Added';
?>
<div class="<?=isset($wrapperClass)?$wrapperClass:'';?>">
    <!-- <div class="">
        <h4 class="font2 bold text-black"><?=$title?></h4>
    </div>
    <hr class="border border-danger short"/> -->
    <div class="submain-5">
        <div class="t3-module module mb-3 " id="Mod334">
            <div class="module-inner">
                <h3 class="module-title ">
                    <span class="titlecard"><?=$title?></span>
                </h3>
                <div class="module-ct">
                    <div id="mod-custom334" class="mod-custom custom">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="p-0 pageRecords page-records" id="explorItemsRecords">
    <?php
        if (!empty($records)) {
            $counter = 0; // Counter to track the number of items displayed
            foreach ($records as $data) {
                $recid = $data['id'];
                ?>
                <li class="mb-3 bg-light p-3">
                    <a href="/research_document/view/<?=$recid?>">
                        <div class="text-primary text-md font2"><?=$data['title']?></div>
                        <div class=""><?=$data['authors']?></div>
                        <div class="text-400 small"><?=relative_date($data['issues_date'])?></div>
                    </a>
                </li>
                <hr>
                <?php
                $counter++;
                if ($counter === 11) {
                    break; // Break the loop after displaying 11 items
                }
                }
        } else {
            include COMPS."wt/noRec.php";
        }
        ?>

        <?php
            if (count($records) > 10) {
                echo '<li class="data-loading">
                        <button class="" onclick="loadMore($(this).closest(\'ul\'))">Expand</button> 
                    </li>';
            }
        ?>
    </ul>
</div>
