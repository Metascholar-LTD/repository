<?php 
if($this->set_field_value('ph') != 'unset'){?>
<div class="pageSection <?=isset($wrapperClass)?$wrapperClass:'';?>" style="background: url('assets/images/explore.jpg') no-repeat center center fixed; background-size: cover; position: relative; padding-top: 150px;">
    <div class="overlay"></div> <!-- Dark overlay -->
    <div class="container px-0">
        <div class="">
            <h1 class="display-4 text-center header-color font2"><?=isset($title)?$title:Null;?></h1>
        </div>
        <?php if(!isset($noSearch)){?>
        <div class="centered mt-5">
            <form class="input-group centeredB p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                <input type="text" searchPageAjax autocomplete="off" name="search" placeholder="Welcome! May the light of Knowledge and Wisdom Shine Forth" aria-describedby="button-addon1" class="form-control border-0 bg-light searchbar-height">
                <div class="input-group-append">
                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
                <!-- <input type="text" searchPageAjax autocomplete="off" class="form-control text-md-xl text-muted border-0 shadow-0 " name="search" placeholder="Search & Discover the Wealth of Knowledge"/>
                <span> <button class="pi-search centered pi text-xl avt-sm bg-danger text-white"></button></span> -->
            </form>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<style>
    .searchbar-height {
        height: 60px !important;
    }

    .overlay {
        background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .header-color{
        color: #ffb606 !important;
        font-weight: bolder !important;
    }
</style>
