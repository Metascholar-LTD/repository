<?php
$count_id = random_num(3);
$swId = random_num(3);
?>
<div class="pageSection">
    <div class="container">
        <div>
            <div class="py-3 mb-3">
                <div class="submain-5">
                    <div class="t3-module module mb-3 " id="Mod334">
                        <div class="module-inner">
                            <h3 class="module-title ">
                                <span class="titlecard">Welcome Back <span class=""><?=get_active_user('fullname')?></span></span>
                            </h3>
                            <div class="module-ct">
                                <div id="mod-custom334" class="mod-custom custom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display: flex; justify-content: center;" class="card shadow-sm" style="border-radius:10px;">
                <div class="bg-white p-4 swiper classViewCounter<?=$swId?>">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide bg-white" style="width: 300px; max-width:100%;">
                            <?php include 'studentUpCounter.php';?>
                        </div>
                        <div class="swiper-slide bg-white" style="width: 300px; max-width:100%;">
                            <?php include 'studentDownCounter.php';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <?= render_data('activities');?>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    const swiper = new Swiper('.swiper.classViewCounter<?=$swId?>', {
        // Optional parameters
        direction: 'horizontal',
        loop: false,
        slidesPerView: "auto",
        spaceBetween: 30,
        keyboard: {
        enabled: true,
        onlyInViewport: false,
        },
        // If we need pagination
        pagination: {
        el: '.swiper-pagination',
        },
        // Navigation arrows
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        // And if we need scrollbar
        scrollbar: {
        el: '.swiper-scrollbar',
        },
    });
});
</script>
<style>
.swiper{
    height: 220px;
    width: 100%;
}
.module-title {
        border-bottom: 5px solid #004C23;

    }

    .titlecard {
        background: #004C23;
        display: inline-block;
        color: #ffffff;
        padding: 5px;
        font-size: 17px;
    }

    .badge-circle {
        border-radius: 50%;
        width: 20px; /* Adjust the width and height as needed for your design */
        height: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

