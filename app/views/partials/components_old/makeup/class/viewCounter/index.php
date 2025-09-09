<?php 
$swId = random_num(8);
?>
<div clas="">
    <div class="swiper classViewCounter<?=$swId?>">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-white" style="width: 400px; max-width:100%;">
                <?php include 'classCount.php';?>
            </div>
            <div class="swiper-slide bg-white" style="width: 400px; max-width:100%;">
                <?php include 'classSubjectCount.php';?>
            </div>
            <div class="swiper-slide bg-white" style="width: 500px; max-width:100%;">
                <?php include 'classFinanceCount.php';?>
            </div>
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
</style>
