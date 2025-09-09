<?php
$title = 'Enrichment Team';
$wrapperClass = "pb-md-3 pb-2";
$noSearch = 1;
include COMPS.'wt/topBarSearch2.php';
?>
<div class="pageSection pt-0">
    <div class="container px-0">
        <hr>
        <div class="">
            <?php 
            $title = 'Recently Added';
            include COMPS."wt/team.php";
            ?>
        </div>
    </div>
</div>