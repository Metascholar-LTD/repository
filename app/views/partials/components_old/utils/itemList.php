<div class="">
    <?php foreach($itemsLists as $item){?>
    <div class="has-children">
       <button class="listitem pr-2 bg-0 o-0 relative" <?=$item['attr']?>>
            <div class="d-flex text-left">
                <i class="<?=$item['icon']?> text-lg mr-3 relative"></i>
                <div class=""><?=$item['title']?></div>
            </div>
       </button>
       <?php if(isset($item['children']) && $item['children']){$dropdownItems = $item['children']; $class = "left-50"; include 'dropdownList.php';} ?>
    </div>
    <?php } ?>
</div>