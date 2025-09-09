<div class="dropdown <?=(isset($class) ? $class : null)?>" style="background-color:#F0F4F9 !important">
    <!-- <button class="position-absolute right-0 pi pi-times text-md mt-1"></button> -->
    <?php if(isset($title) || isset($subtitle)){?>
    <div class="listitem" style="background-color:#F0F4F9 !important">
        <div class="bold-sm text-md"><?=(isset($title) ? $title : null)?></div>
        <div class=""><?=(isset($subtitle) ? $subtitle : null)?></div>
    </div>
    <?php }
    foreach($dropdownItems as $item){?>
    <div class="listitem centeredL" style="background-color:#F0F4F9 !important" <?= $item['attr'];?>>
        <!-- <i class="<?=$item['icon']?> text-lg mr-3" style="color:#004C23"></i> -->
        <span><?=$item['title']?></span>
    </div>
    <div class="dropdown-divider"></div>
    <?php } ?>
</div>