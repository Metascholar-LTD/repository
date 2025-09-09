<?php
$DocNavs = 
[
    [
        'title'=>'Lecture Notes+',
        'icon'=>'pi pi-file',
        'attr'=>'to href="lecture_notes"',
    ],
    [
        'title'=>'Books and Chapters',
        'icon'=>'pi pi-book',
        'attr'=>'to href="ebooks"',
    ],
    [
        'title'=>'Past questions',
        'icon'=>'pi pi-clone',
        'attr'=>'to href="past_questions"',
    ],
];
$comNavs = 
[
    [
        'title'=>'Conference',
        'icon'=>'pi pi-folder',
        'attr'=>'to href="conferences"',
    ],
    [
        'title'=>'Speech',
        'icon'=>'pi pi-comments',
        'attr'=>'to href="speech"',
    ],
    [
        'title'=>'Academic Calendar',
        'icon'=>'pi pi-calendar',
        'attr'=>'to href="academic_calendar"',
    ],
];
$serNavs  = 
[
    [
        'title'=>'Theses & Dissertation',
        'icon'=>'pi pi-copy small',
        'attr'=>'to href="research_document"',
    ],
    [
        'title'=>'Research Articles',
        'icon'=>'pi pi-copy small',
        'attr'=>'to href="research_article"',
    ],
    [
        'title'=>'Report and Dataset',
        'icon'=>'pi pi-chart-line',
        'attr'=>'to href="reports_dataset"',
    ],
];
?>

<?php include COMPS."pages/sections/indexSec2.php";?>
<footer class="">
    <div class="p-3 pt-5 texture-gold">
        <div class="p-3 container">
            <div class="row">
                <div class="col-xl col-12 mb-5">
                    <div class="row h-100 align-items-center mb-5">
                        <div class="col-auto">
                            <img src="<?php print_link(set_img_src(IMGDIR.'logo.png',50))?>" alt="">
                        </div>
                        <div class="col border-left border-danger pt-2">
                            <h4 class="bold text-black font2 mb-1">Catholic University of Ghana</h4>
                            <div style="font-family:monospace;letter-spacing:4px;">Academic Repository</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-auto col-lg col-md-4 col-6 mb-3">
                    <h4 class="bold mb-2 text-danger">Scholary & Research</h4>
                    <ul class="">
                        <?php foreach($serNavs as $item){?>
                        <li><a <?=$item['attr']?>><?=$item['title']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-xl-auto col-lg  col-md-4 col-6 mb-3">
                    <h4 class="bold mb-2 text-danger">Learning Materials</h4>
                    <ul class="">
                        <?php foreach($DocNavs as $item){?>
                        <li><a  <?=$item['attr']?>><?=$item['title']?></a></li>
                        <?php } ?>
                        <li class="mt-3">
                            <?php if(user_login_status()){?>
                            <button onclick="logout()" class="btn btn-outline-dark btn-md">
                                <label for="">Log out</label>
                            </button>
                            <?php } else { ?>
                            <a href="<?php print_link('home');?>" class="btn btn-outline-dark btn-md">
                                <label for="">Log In</label>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-auto col-lg  col-md-4 col-6 mb-3">
                    <h4 class="bold mb-2 text-danger">Academic Events</h4>
                    <ul class="">
                        <?php foreach($comNavs as $item){?>
                        <li><a <?=$item['attr']?>><?=$item['title']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-danger pt-1"></div>
    <div class="bg-black p-2">
        <div class="container text-center text-light">
            <div>Powered By <a to href="team" class="text-gold">CUG Academic Computing & Research Unit</a> | Copyright &copy; <?=date('Y')?> CUG</div>
        </div>
    </div>
</footer>

<style>
footer{
    /* color: white; */
}
footer ul li a{
    /* color:white !important; */
}
footer ul li{
    padding: 4.99px 0px;
}

</style>