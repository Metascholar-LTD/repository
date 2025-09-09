
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
        <a class="mb-3 col-lg-4 col-md-6 col-12 has-tooltip page-modal" href="<?php print_link('ebooks/view/'.$item['id']);?>" title="<?=$item['title']?>">
            <div class="row m-0 h-100 bg-light p-3">
                <div class="col-auto border border-gold texture fit-object" style="width:90px;height:120px;">
                    <img src="<?php print_link(set_img_src($item['thumbs'],200));?>" alt="">
                </div>
                <div class="col py-2" style="width:calc(100% - 90px);">
                    <div class="font2 text-line-2"><?=$item['title']?></div>
                    <div class="small text-400 text-line-2"><?=$item['authors']?></div>
                    <button class="pill text-white  mt-2 small bg-black pill"> (<?=downloadCount($item['ctrl'])?>) Download</button>
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