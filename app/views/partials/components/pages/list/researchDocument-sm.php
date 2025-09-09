<?php 
$title = $this->set_field_value('pageTitle');
$title = !empty($title)?$title:'';
include COMPS."wt/exploreItems.php";
?>