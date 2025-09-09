<?php 
$export_link = isset($export_link) ? $export_link : '';
$print_link = isset($print_link) ? $print_link : '';
$creat_link = isset($creat_link) ? $creat_link : '';
$headerSearch = isset($headerSearch) ? $headerSearch : false;
?>
<div class="">
    <div class="row">
        <div class="col">
            <h4 class="record-title"><?=$pageTitle?></h4>
        </div>
        <div class="col-auto">
            <?php 
            if($headerSearch) { ?>
                <form class="border bg-white round-sm p-0 centeredL">
                    <input class="form-control border-0 shadow-0" placeholder="Search records" name="search"/>
                    <i class="pi pi-search p-2 text-md"></i>
                </form>
            <?php } 
            if($export_link) { ?> 
                <button class="btn btn-sm btn-outline-light mr-2" <?=$export_link?>><i class="bi bi-box-arrow-up-right"></i>  Export</button>
            <?php } 
            if($print_link) { ?>
                <button class="btn btn-sm btn-outline-light mr-2" <?=$print_link?>><i class="bi bi-printer"></i> Print</button>
            <?php }
            if($creat_link) { ?>
                <button class="btn btn-sm btn-primary" <?=$creat_link?>><i class="pi pi-plus"></i> New <?=$pageTitle?></button>
            <?php } ?>
        </div>
    </div>
</div>