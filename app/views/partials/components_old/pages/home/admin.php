<?php
$count_id = random_num(3);
$swId = random_num(3);
$assignedFaculty = assignedFaculty();
?>
<div class="pageSection pt-4">
    <div class="container">
        <div class="">
            <div class="mb-3">
                <div class="text-400 text-md"><?=get_active_user('fullname')?></div>
                <h1 class="bold text-black" style="font-size:40px;">Welcome Home</h1>
            </div>

            <div class="bg-white swiper classViewCounter<?=$swId?>">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-white" style="width: 350px; max-width:100%;">
                        <?php 
                        $table = "research_document"; 
                        $subquery = "AND faculty = '$assignedFaculty'";
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide bg-white" style="width: 350px; max-width:100%;">
                        <?php 
                        $table = "research_article"; 
                        $subquery = "AND faculty = '$assignedFaculty'";
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide bg-white" style="width: 300px; max-width:100%;">
                        <?php 
                        $table = "ebooks"; 
                        $subquery = "AND faculty = '$assignedFaculty'";
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide bg-white" style="width: 300px; max-width:100%;">
                        <?php 
                        $table = "lecture_notes"; 
                        $subquery = "AND faculty = '$assignedFaculty'";
                        include 'adminCounter.php';
                        ?>
                    </div>
                    <div class="swiper-slide bg-white" style="width: 300px; max-width:100%;">
                        <?php 
                        $table = "past_questions"; 
                        $subquery = "AND faculty = '$assignedFaculty'";
                        include 'adminCounter.php';
                        ?>
                    </div>
                </div>
            </div>

            <?php $queryFaculty = "WHERE faculty = '$assignedFaculty'"; include 'adminCounter2.php'; ?>
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
</style>
