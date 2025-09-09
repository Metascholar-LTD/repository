<?php
$title = str_replace('_', ' ', $table);
$pending = adminCount($table,"WHERE status = '0.0' $subquery");
$approved = adminCount($table,"WHERE status = '1' $subquery");
$rejected = adminCount($table,"WHERE status = '-1' $subquery");
?>
<div class="border shadow-sm hover-success p-3 round-3 cursor-point bg-counter">
    <div>Total <?=$title?> count.</div>
    <h2 class="bold text-black"><?= adminCount($table, "WHERE id != '0' $subquery").' Records'?></h2>
    <hr class="short"/>
    <div>
        <div class="">
            <a to href="<?=$table.'/admin/?status=0.0&ps=-1'?>" class="d-block">
                <i class="pi pi-circle-fill mr-2 text-danger small"></i> <b><?=$pending?></b> Records Pending <i class="pi pi-external-link small text-400"></i>
            </a>
            <a to href="<?=$table.'/admin/?status=1&ps=-1'?>">
                <i class="pi pi-check-circle mr-2 text-success small"></i> <b><?=$approved?></b> Records Approved <i class="pi pi-external-link small text-400"></i>
            </a>
            <a to href="<?=$table.'/admin/?status=-1&ps=-1'?>" class="d-block">
                <i class="pi pi-times-circle mr-2 text-muted small"></i> <b><?=$rejected?></b> Records Rejected <i class="pi pi-external-link small text-400"></i>
            </a>
        </div>
    </div>
    <hr>
    <a to href="<?=$table.'/admin'?>" class="text-primary">
        Explore <?=$title?> <i class="pi pi-arrow-right ml-2 small"></i>
    </a>
</div>