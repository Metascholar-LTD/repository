<div class="">
    <div>
        <div class="ui-form col-lg-7 col-12">
            <h4 class="record-title">Index Section</h4>
            <hr class="border-danger short">
            <div class="form-group mb-3">
                <label class="control-label">Index Cover Img</label>
                <a class="surface fit-object d-block position-relative page-modal" href="<?php print_link('settings/edit_img/'.get_set_id('indexImg1'))?>" style="height:240px;width:170px;">
                    <img src="<?php print_link(htmlText('indexImg1'));?>" alt=""/>
                </a>
            </div>

            <div class="form-group mb-3" setItem="<?=get_set_id('indexTitle1')?>">
                <label class="control-label">Index Title</label>
                <input type="text" name="sval" class="form-control" placeholder="Enter Title" value="<?=htmlText('indexTitle1')?>"/>
            </div>

            <div class="form-group mb-3" setItem="<?=get_set_id('indexSubTitle1')?>">
                <label class="control-label">Index Subtitle</label>
                <input type="text" name="sval" class="form-control" placeholder="Enter Title" value="<?=htmlText('indexSubTitle1')?>"/>
            </div>

            <div class="form-group mb-3" setItem="<?=get_set_id('indexSubTitle2')?>">
                <label class="control-label">Index Title</label>
                <textarea type="text" name="sval" class="form-control" rows="5" placeholder="Enter Title" value=""><?=htmlText('indexSubTitle2')?></textarea>
            </div>



            <h4 class="record-title">Counter Section</h4>
            <hr class="border-danger short">
            <?php foreach([1,2,3] as $item){?>
            <div class="form-group mb-3">
                <label class="control-label">Item-1 Avt</label>
                <a class="fit-object d-block position-relative page-modal" href="<?php print_link('settings/edit_img/'.get_set_id('counterItem'.$item.'-svg'))?>" style="height:100px;width:100px;">
                    <img src="<?php print_link(htmlText('counterItem'.$item.'-svg'));?>" alt=""/>
                </a>
            </div>
            <div class="form-group mb-3" setItem="<?=get_set_id('counterItem'.$item.'-title')?>">
                <label class="control-label">Item <?=$item?> Title</label>
                <input type="text" name="sval" class="form-control" placeholder="Enter Title" value="<?=htmlText('counterItem'.$item.'-title')?>"/>
            </div>

            <div class="form-group mb-3" setItem="<?=get_set_id('counterItem'.$item.'-subtitle')?>">
                <label class="control-label">Item <?=$item?> SubTitle</label>
                <input type="text" name="sval" class="form-control" placeholder="Enter Title" value="<?=htmlText('counterItem'.$item.'-subtitle')?>"/>
            </div>
            <hr/>
            <?php } ?>


            <h4 class="record-title">Faculty Section</h4>
            <hr class="border-danger short">
            
            <div class="form-group mb-3" setItem="<?=get_set_id('indexTitle2')?>">
                <label class="control-label">Title</label>
                <textarea type="text" name="sval" class="form-control" rows="5" placeholder="Enter Title" value=""><?=htmlText('indexTitle2')?></textarea>
            </div>

            

            <h4 class="record-title">Liciencing</h4>
            <hr class="border-danger short">
            
            <div class="form-group mb-3" setItem="<?=get_set_id('liciencePrice')?>">
                <label class="control-label">Value</label>
                <input type="text" name="sval" class="form-control" placeholder="Enter Title" value="<?=htmlText('liciencePrice')?>"/>
            </div>

            <h4 class="record-title">Guides</h4>
            <hr class="border-danger short">
            
            <div class="form-group mb-3" setItem="<?=get_set_id('thesisGuide')?>">
                <label class="control-label">Thesis Guide</label>
                <a class="d-block border page-modal p-3 surface" href="<?php print_link('settings/edit_img/'.get_set_id('thesisGuide'))?>">
                    <?=htmlText('thesisGuide');?>
                </a>
            </div>

            <div class="form-group mb-3" setItem="<?=get_set_id('docsGuide')?>">
                <label class="control-label">Other Documents Guide</label>
                <a class="d-block border page-modal p-3 surface" href="<?php print_link('settings/edit_img/'.get_set_id('docsGuide'))?>">
                    <?=htmlText('docsGuide');?>
                </a>
            </div>

        </div>
    </div>
</div>