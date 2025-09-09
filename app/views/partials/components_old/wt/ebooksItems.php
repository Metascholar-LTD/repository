
<div class="">
    <div class="">
        <h4 class="font2 bold text-black">Recently Added</h4>
    </div>
    <hr class="border border-danger short"/>
    <div class="row pageRecords page-records">
        <?php 
        if(!empty($records)){
        foreach($records as $item){?>
        <a class="mb-3 col-lg-4 col-md-6 col-12 has-tooltip page-modal" href="<?php print_link('ebooks/view/'.$item['id']);?>" title="<?=$item['title']?>">
            <div class="row m-0 h-100">
                <div class="col-auto border border-gold texture fit-object" style="width:90px;height:120px;">
                    <img src="<?php print_link(set_img_src($item['thumbs'],200));?>" alt="">
                </div>
                <div class="col py-2" style="width:calc(100% - 90px);">
                    <div class="font2 text-line-2"><?=$item['title']?></div>
                    <div class="small text-400 text-line-2"><?=$item['authors']?></div>
                    <button class="pill text-white  mt-2 small bg-black pill"> (23) Download</button>
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