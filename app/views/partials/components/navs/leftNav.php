<?php
$superAdminItems = [
    ['title' => 'Accounts', 'icon' => 'pi pi-users', 'link' => 'accounts', 'fn' => ''],
    ['title' => 'Settings', 'icon' => 'pi pi-cog', 'link' => 'settings', 'fn' => ''],
    ['title' => 'Faculties', 'icon' => 'pi pi-building', 'link' => 'faculties', 'fn' => ''],
    ['title' => 'Team', 'icon' => 'pi pi-users', 'link' => 'team', 'fn' => ''],
];
if(strtolower((string)USER_ROLE) != 'super admin'){
    $superAdminItems = [[],[],[],[]]; 
}
$navItems = [
    ['title' => 'Dashboard', 'icon' => 'pi pi-home', 'link' => 'home', 'fn' => ''],
    $superAdminItems[0],
    ['title' => 'Explore', 'icon' => 'pi pi-compass', 'link' => 'explore', 'fn' => ''],
    ['title' => 'Scholarly', 'icon' => 'bi bi-book', 'link' => '', 'fn' => "",
        'children'=>[
            [
                'title'=>'Theses & Dissertation',
                'icon'=>'pi pi-copy small',
                'attr'=>'to href="research_document/admin"',
            ],
            [
                'title'=>'Research Articles',
                'icon'=>'pi pi-copy small',
                'attr'=>'to href="research_article/admin"',
            ],
            [
                'title'=>'Report and Dataset',
                'icon'=>'pi pi-chart-line',
                'attr'=>'to href="reports_dataset/admin"',
            ]
        ]
    ],
    ['title' => 'studyMaterials', 'icon' => 'pi pi-book', 'link' => '', 'fn' => "",
        'children'=>[
            [
                'title'=>'Lecture Notes',
                'icon'=>'pi pi-copy small',
                'attr'=>'to href="lecture_notes/admin"',
            ],
            [
                'title'=>'Books and Chapters',
                'icon'=>'pi pi-copy small',
                'attr'=>'to href="ebooks/admin"',
            ],
            [
                'title'=>'Past questions',
                'icon'=>'pi pi-chart-line',
                'attr'=>'to href="past_questions/admin"',
            ]
        ]
    ],
    ['title' => 'Events+', 'icon' => 'bi bi-easel2', 'link' => '', 'fn' => "",
        'children'=> [
            [
                'title'=>'Conference Proce..',
                'icon'=>'pi pi-folder',
                'attr'=>'to href="conferences/admin"',
            ],
            [
                'title'=>'Speech',
                'icon'=>'pi pi-comments',
                'attr'=>'to href="speech/admin"',
            ],
            [
                'title'=>'Academic Calendar',
                'icon'=>'pi pi-calendar',
                'attr'=>'to href="academic_calendar/admin"',
            ],
        ]
    ],
    ['title' => 'Finance', 'icon' => 'bi bi-cash-coin', 'link' => 'finance', 'fn' => ""],
    ['title' => 'Upload', 'icon' => 'pi pi-plus-circle', 'link' => '', 'fn' => "openNav('upload')"],
    $superAdminItems[2],
    $superAdminItems[3],
    ['title' => 'My Account', 'icon' => 'pi pi-user', 'link' => '', 'fn' => "",
        'children'=>[
            [
                'title'=>'Profile & Accounts Settings',
                'icon'=>'pi pi-user',
                'attr'=>'to href="account"',
            ],
            [
                'title'=>'Log Out',
                'icon'=>'pi pi-chevron-right',
                'attr'=>'onclick="logout()"',
            ]
        ]
    ],
    $superAdminItems[1],
]; 
$dropdownItems = [
    ['title'=>'Monitize account', 'icon'=>'pi pi-money-bill', 'link' => 'settings', 'act'=>''],
    ['title'=>'Settings', 'icon'=>'pi pi-cog pi-spin', 'link' => 'settings', 'act'=>''],
];
?>
<div id="left-nav"> 
    <!-- style="background-color: #F0F4F9 !important;" -->
    <?php if(strtolower((string)USER_ROLE) == 'super admin' || strtolower((string)USER_ROLE) == 'admin'){?>
    <div class="wrapper">
        <div class="relative">
           <div class="bg-white centeredL text-nowrap" style="height:50px;">
                <div class="">
                    <!-- <img src="<?php print_link(set_img_src(SITE_LOGO,35))?>" alt=""/> -->
                    <div class="menu-label">
                        <div class="bold text-black font2" style="font-size:14px!important;"><?=strtoupper('Catholic')?></div>
                        <div class="small text-lg">
                           <?=strtoupper('University')?>
                           <span class="border-top border-danger"><?=strtoupper('of')?></span>
                           <?=strtoupper('Ghana')?>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <!-- <div class="scrollable-container"> -->
                <ul class="">
                    <?php foreach($navItems as $item){ if(isset($item['title'])){
                        $ref = $item['link']; $fn = $item['fn'];
                    ?>
                    <li class="<?= (isset($item['children']) ? 'has-children' : null)?>">
                        <a class="" to <?= (!empty($ref) ? "href='$ref'": 'onclick="'.$fn.'"'); ?> target="">
                            <i class="menu-icon <?=$item['icon']?>"></i>
                            <span class="menu-label"><?=$item['title']?></span>
                        </a>
                        <?php if(isset($item['children'])){ ?>
                        <div class="dropdown pt-2 pb-2" style="left: 50%;">
                            <?php foreach($item['children'] as $child){ ?>
                            <div <?=$child['attr']?> class="dropdown-item"> 
                                <i class="menu-icon text-md <?=$child['icon']?>"></i>
                                <span class="ml-2"><?=$child['title']?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </li>
                    <?php } } ?>
                </ul> 
            <!-- </div> -->
        </div>
    </div>
    <?php } ?>
    <div class="sidebar-modal-holder">
        <a class="closeSideBarModal bg-light pi pi-times centered" onclick="closeSideNav()"></a>
        <div class="modal-item scroll-y p-3" item="menu">
            <div class="submain-5">
                <div class="t3-module module mb-3 " id="Mod334">
                    <div class="module-inner">
                        <h3 class="module-title ">
                            <span class="titlecard"><?='Menu'?></span>
                        </h3>
                        <div class="module-ct">
                            <div id="mod-custom334" class="mod-custom custom">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h2 class="mb-3 bold text-black"><?='Menu'?></h2>
            <hr class="short border-danger border-2"> -->
            <div class="">
                <?php include "leftMenu.php";?>
            </div>
        </div>
        <div class="modal-item scroll-y p-3" item="upload">
            <?php 
            if(strtolower((string)USER_ROLE) == 'super admin'){include "superAdminUploadOptions.php";}
            else if(strtolower((string)USER_ROLE) == 'admin'){include "adminUploadOptions.php";}
            else if(strtolower((string)USER_ROLE) == 'staff'){include "staffUploadOptions.php";}
            else{ include "studentUploadOptions.php";}
            ?>
        </div>
        <div class="modal-item scroll-y p-3" item="inbox">
            <h2 class="mb-3 bold">Inbox</h2>
            <div class="mb-3">
                <input class="form-control" placeholder="Search messages"/>
            </div>
            <data data-url="inbox" state="0">
                <div class="centered p-5">
                    <i class="pi pi-comments text-400" style="font-size:40px;"></i>
                </div>
            </data>
        </div>
        
        <div class="modal-item scroll-y p-3 px-md-5 reset-grids" item="more">
            <data data-url=""></data>
        </div>
    </div>    
</div>
<style>
    .scrollable-container {
        /* max-height: 400px;
        overflow-y: auto;
        overflow-x: hidden; */
    }
</style>
<script>
var opend = null;
{
    $(document).on('click', '[to][href]', function(){closeSideNav()})
}

function openNav(target, url){
    var sideNav = $('#left-nav'),
    sideNavState = sideNav.attr('state');
    function resetNav(){
        opend = null;
        sideNav.attr('state', 0); 
        $(".sidebar-modal-holder .modal-item").removeClass('active');
    };
    function setNav(){
        opend = target; 
        sideNav.attr('state', 1); 
        $(".sidebar-modal-holder .modal-item").removeClass('active');
        $(".sidebar-modal-holder .modal-item[item='"+target+"']").addClass('active');
    };
    (!sideNavState ? sideNavState = 0 : null);
    (sideNavState == 0 || opend != target ? setNav() : resetNav());
    if(target == 'more' && url){
        var dom = $(".modal-item[item='"+target+"'] data");
        dom.html('<div class="p-5 text-center"><i class="pi pi-clock pi-spin"></i></div>');
        dom.attr({'data-url':url, 'state':0});
        setNav();
    }
}
function closeSideNav(){
    opend = null;
    $('#left-nav').attr('state', 0); 
    $(".sidebar-modal-holder .modal-item").removeClass('active');
}
$(document).on('click','.sidebar-modal-holder .modal-item a[href]', function(){
    closeSideNav();
});
$(document).on('click','[openNav]', function(){
    var ref = $(this).attr('openNav');
    openNav('more', ref);
});
</script>