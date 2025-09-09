<div class="list-item mb-md-3 mb-2" <?=isset($link)?$link:''?>>
    <div class="row">
        <div class="col-auto">
            <?php if(isset($img)){?>
                <div class="avt-md fit-object round-sm surface-ground">
                    <img class="round-sm" src="<?php print_link(set_img_src($img,300))?>"/>
                </div>
            <?php } else { ?>
                <?=isset($icon)?$icon:''?>
            <?php } ?>
        </div>
        <div class="col">
            <div class="text-md"><?=isset($title)?$title:''?></div>
            <div class=""><?=isset($subtitle1)?$subtitle1:''?></div>
            <div class=""><?=isset($subtitle2)?$subtitle2:''?></div>
        </div>
    </div>
</div>