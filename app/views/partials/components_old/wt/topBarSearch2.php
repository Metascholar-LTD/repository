<?php 
if($this->set_field_value('ph') != 'unset'){?>
<div class="pageSection  <?=isset($wrapperClass)?$wrapperClass:'';?>">
    <div class="container px-0">
        <div class="">
            <h1 class="display-3 text-center text-black font2"><?=isset($title)?$title:Null;?></h1>
        </div>
        <?php if(!isset($noSearch)){?>
        <div class="centered mt-3">
            <form class="input-group border border-2 border-gold p-md-3 p-1 centeredB bg-white">
                <input type="text" searchPageAjax autocomplete="off" class="form-control text-md-xl text-muted border-0 shadow-0 " name="search" placeholder="Search & Discover the Wealth of Knowledge"/>
                <span> <button class="pi-search centered pi text-xl avt-sm bg-danger text-white"></button></span>
            </form>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>


