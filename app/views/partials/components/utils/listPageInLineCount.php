<div class="row sha">
    <div class="col-lg col-12 mb-3 order">
        <ul class="breadcrumb m-0 p-0 bg-0">
            <?php foreach($countItems as $item){ $active = $item['state'];?>
                <li style="font-size:13px;" class="breadcrumb-item bold <?=$active?'text-primary':'text-black';?> px-2" <?=$item['attr']?>>
                    <?=$item['text']?>
                    <?php if(isset($item['val'])){?>
                    <badge class="round-sm <?=$item['state']=='active'?'badge-warning':'badge-light';?>"
                    style="padding: 2px 5px;">
                        <?=$item['val']?>
                    </badge>
                    <?php } ?>
                <li>
            <?php }?>
        </ul>
    </div>
    <div class="col-auto">
        <div class="text-black px-2" style="font-size:13px;">
            Showing <?=$record_count.' of '.$total_records?> records ----- item per page <span class="bold">(<?=$this->limit_count?>)</span>
        </div>
    </div>
</div>