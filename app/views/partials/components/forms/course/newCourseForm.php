<?php
$item = $this->set_field_value('item');
$item_id = $this->set_field_value('item_id');
?>
<form id="couese-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation h-100" action="<?php print_link("course/add?csrf_token=$csrf_token") ?>" method="post">
    <div class="h-100 flex-column col-12 tab-content">
        <?php 
        include FORMS.'course/sections/ncf_section1.php';
        include FORMS.'course/sections/ncf_section2.php';
        ?>
    </div>
</form>

<style>
.small-input{
    width: 100px;
}
.form-group label{
    visibility: hidden;
    display: block;
    position: relative;
    opacity: 0;
    transition: 0.3s ease-in-out;
    margin-bottom: -10px !!important;
}
.form-group label.visible{
    margin-bottom: 10px !important; 
    visibility: visible;
    opacity: 1;
}
</style>