<div class="dropdown <?=(isset($class) ? $class : null)?>">
    <!-- <button class="position-absolute right-0 pi pi-times text-md mt-1"></button> -->
    <?php if(isset($title) || isset($subtitle)){?>
    <div class="listitem">
        <div class="bold-sm text-md"><?=(isset($title) ? $title : null)?></div>
        <div class=""><?=(isset($subtitle) ? $subtitle : null)?></div>
    </div>
    <?php }
    foreach($dropdownItems as $item){?>
    <div class="listitem centeredL" <?= $item['attr'];?>>
        <i class="<?=$item['icon']?> text-lg mr-3"></i>
        <span><?=$item['title']?></span>
    </div>
    <?php } ?>
</div>