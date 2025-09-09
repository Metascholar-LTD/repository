<?php
$count_id = random_num(3);
$swId = random_num(3);
$assignedFaculty = assignedFaculty();
?>
<div class="pageSection pt-4">
    <div class="container">
        <div class="">
            <div class="mb-3">
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
                <!-- <div class="text-400 text-md"><?=get_active_user('fullname')?></div>
                <h1 class="bold text-black" style="font-size:40px;">Welcome Back</h1> -->
            </div>

            <div class="swiper counter-bg classViewCounter<?=$swId?>">
                <div class="swiper-wrapper counter-bg">
                    <div class="swiper-slide" style="width: 350px; max-width:100%;">
                        <?php 
                        $table = "research_document"; 
                        $subquery = NULL;
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide" style="width: 350px; max-width:100%;">
                        <?php 
                        $table = "research_article"; 
                        $subquery = NULL;
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide" style="width: 300px; max-width:100%;">
                        <?php 
                        $table = "ebooks"; 
                        $subquery = NULL;
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide" style="width: 300px; max-width:100%;">
                        <?php 
                        $table = "lecture_notes"; 
                        $subquery = NULL;
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide" style="width: 300px; max-width:100%;">
                        <?php 
                        $table = "past_questions"; 
                        $subquery = NULL;
                        include 'adminCounter.php';
                        ?>
                    </div>
                </div>
            </div>

            <?php $queryFaculty = NULL; include 'adminCounter2.php'; ?>
        </div>
        <div></div>
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
    height: 250px;
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
