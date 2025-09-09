<div class="row">
    <div class="col-lg col-12 mb-3 order">
        <ul class="breadcrumb m-0 p-0 bg-0">
            <?php foreach($countItems as $item){ $active = $item['state'];?>
                <li class="breadcrumb-item bold small <?=$active?'text-primary':'text-muted';?> px-2" <?=$item['attr']?>>
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
        <div class="small text-muted px-2">
            Showing <?=$record_count.' of '.$total_records?> records ----- item per page <span class="bold">(<?=$this->limit_count?>)</span>
        </div>
    </div>
</div>