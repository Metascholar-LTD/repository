<?php
if(!isset($records))$records = [];
if(!isset($title) || empty($title))$title = 'Recently Added';
?>
<div class="<?=isset($wrapperClass)?$wrapperClass:'';?>">
    <div class="">
        <h4 class="font2 bold text-black"><?=$title?></h4>
    </div>
    <hr class="border border-danger short"/>
    <ul class="p-0 pageRecords page-records" id="explorItemsRecords">
        <?php 
        if(!empty($records)){
        foreach($records as $data){
            $recid = $data['id']; ?>
        <li class="mb-3">
            <a to href="research_article/view/<?=$recid?>">
                <div class="row">
                    <div class="col-auto">
                        <div style="width:60px; height:70px;" class="fit-object border round-1 o-0 border-surface border-dark">
                            <img src="<?php print_link(set_img_src($data['thumbs'],100))?>" alt=""/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-primary text-md font2"><?=$data['title']?></div>
                        <div class=""><?=$data['authors']?></div>
                        <div class="text-400 small"><?=$data['year_of_publication']?></div>
                    </div>
                </div>
            </a>
        </li>
        <?php }
        } else {
            include COMPS."wt/noRec.php";
        } ?>
        <li class="data-loading">
           <button class="" onclick="loadMore($(this).closest('ul'))">load more</button> 
        </li>
    </ul>
</div>
