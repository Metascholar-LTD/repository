<?php
?>
<div class="">
    <div class="">
        <h4 class="font2 bold text-black">Recently Added</h4>
    </div>
    <hr class="border border-danger short"/>
    <div class="row pageRecords page-records">
        <?php 
        if(!empty($records)){
        foreach($records as $item){?>
        <a class="mb-3 col-lg-3 col-md-4 col-6 page-modal" href="<?php print_link('lecture_notes/view/'.$item['id']);?>">
            <div class=" h-100">
                <div class="texture-gold border-gold border relative px-2 " style="padding-top:70%"> 
                    <div class="absolute bottom-0"><?= file_thumb($item['file']); ?></div>
                </div>
                <button class="alert-success small btn-block"> (23) Download <i class="pi pi-download ml-2"></i></button>
                <div class="p-2">
                    <div class="text-line-2"><?=$item['title']?></div>
                    <div class="small text-400"><?=$item['lecturer']?></div>
                    <div class="small text-400"><?=$item['course'].' / '.relative_date($item['datein'])?></div>
                </div>
            </div>
        </a>
        <?php } ?>
        <div class="data-loading col-12 p-3">
           <button class="" onclick="loadMore($(this).closest('div.row'))">load more</button> 
        </div> 
        <?php } else {
            include COMPS."wt/noRec.php";
        } ?>
    </div>
</div>