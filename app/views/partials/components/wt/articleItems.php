<?php
if(!isset($records))$records = [];
if(!isset($title) || empty($title))$title = 'Recent Submissions';
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
                        <span class="titlecard">Recent Submissions</span>
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
        if(!empty($records)){
        foreach($records as $data){
            $recid = $data['id']; ?>
        <li class="mb-3 bg-light p-3">
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
        <hr>
        <?php }
        } else {
            include COMPS."wt/noRec.php";
        } ?>
      <?php
            if (count($records) > 10) {
                echo '<li class="data-loading">
                        <button class="" onclick="loadMore($(this).closest(\'ul\'))">Expand</button> 
                    </li>';
            }
        ?>
    </ul>
</div>
