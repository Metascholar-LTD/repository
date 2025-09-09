<?php
?>
<div class="mt-3">
    <!-- <div class="">
        <h4 class="font2 bold text-black">Recently Added</h4>
    </div>
    <hr class="border border-danger short"/> -->
    <div class="submain-5">
            <div class="t3-module module mb-3 " id="Mod334">
                <div class="module-inner">
                    <h3 class="module-title ">
                        <span class="titlecard">Recent Submissions</span>
                    </h3>
                    <div class="module-ct">
                        <div id="mod-custom334" class="mod-custom custom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row pageRecords page-records">
        <?php 
        if(!empty($records)){
        foreach($records as $item){?>
        <a class="mb-3 col-lg-3 col-md-4 col-6 page-modal" href="<?php print_link('lecture_notes/view/'.$item['id']);?>">
            <div class="h-100 bg-light p-3">
                <div class="texture-gold border-gold border relative px-2 " style="padding-top:70%"> 
                    <div class="absolute bottom-0"><?= file_thumb($item['file']); ?></div>
                </div>
                <button class="alert-success small btn-block"> (<?=downloadCount($item['ctrl'])?>) Download <i class="pi pi-download ml-2"></i></button>
                <div class="p-2">
                    <div class="text-line-2"><?=$item['title']?></div>
                    <div class="small text-400"><?=$item['lecturer']?></div>
                    <div class="small text-400"><?=$item['course'].' / '.relative_date($item['datein'])?></div>
                </div>
            </div>
        </a>
        <?php } ?>
        <div class="data-loading col-12 p-3">
        <?php
            if (count($records) > 10) {
                echo '<button class="" onclick="loadMore($(this).closest(\'div.row\'))">Expand</button>';
            }
        ?>
        </div> 
        <?php } else {
            include COMPS."wt/noRec.php";
        } ?>
    </div>
</div>