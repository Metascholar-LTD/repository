<?php
$home = (user_login_status())?'home':'';
$home = SITE_ADDR.$home;
?>
<div id="top-nav">
    <div class="logo-holder" style="top:-20px;">
        <div class="centeredL">
            <img src="<?php print_link(set_img_src(SITE_LOGO,75))?>" alt=""/>
            <div class="p-3">
                <h1 class="bold text-black font2"><?=strtoupper('Catholic')?></h1>
                <div class="text-lg">
                   <?=strtoupper('University')?>
                   <span class="border-top border-danger"><?=strtoupper('of')?></span>
                   <?=strtoupper('Ghana')?>
                </div>
            </div>
        </div>
    </div>
    <div class="surface">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div style="height:30px;"></div>
                </div>
                <div class="col-auto px-3">
                    <ul class="d-none d-md-flex navH bold text-capitalize centeredL">
                        <li>
                            <a class="text-400" target="_blank" href="https://www.cug.edu.gh/AboutUs/WhoWeAre.php">About CUG</a>
                        </li>
                        <li>
                            <a class="text-400" target="_blank" href="https://www.cug.edu.gh/AboutUs/leadership.php">Leadership</a>
                        </li>
                        <li>
                            <a class="text-400" target="_blank" href="https://www.cug.edu.gh/Programmes/graduate.php">Programmes</a>
                        </li>
                        <li>
                            <a class="text-400" target="_blank" href="https://www.cug.edu.gh/Admissionw/postgraduate.php">Admission</a>
                        </li>
                        <li>
                            <a class="text-400" target="_blank" href="https://www.cug.edu.gh/Admissionw/postgraduate.php">Campus life</a>
                        </li>
                        <li>
                            <a class="text-400" target="_blank" href="https://www.cug.edu.gh/Researchw/staffpub.php">Research</a>
                        </li>
                        <li>
                            <a class="text-400" target="_blank" href="https://ijmsirjournal.com/index.php/ojs">CUG Journal</a>
                        </li>
                        <li class="bg-gold">
                            <?php if(user_login_status()){?>
                            <a class="text-white centeredL" to href="account">
                                <i class="pi pi-user text-lg text-white"></i>
                                <i class="pi pi-chevron-down text-white small ml-2"></i>
                            </a>
                            <?php } else {?>
                            <a class="text-white btn" href="<?php print_link('home')?>">
                                LogIn
                                <i class="pi pi-chevron-down text-white small ml-2"></i>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                    <ul class="d-flex d-md-none navH bold text-capitalize centeredL">              
                        <li class="bg-gold">
                            <?php if(user_login_status()){?>
                            <a class="text-white centeredL" to href="account">
                                <i class="pi pi-user text-lg text-white"></i>
                                <i class="pi pi-chevron-down text-white small ml-2"></i>
                            </a>
                            <?php } else {?>
                            <a>LogIn</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper shadow-sm">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col">
                </div>
                <div class="col-auto">
                    <ul class="d-none d-md-flex navH">
                        <li>
                            <a class="text" to href="<?=$home?>"><?=user_login_status()?'Dashboard':'Home';?></a>
                        </li>
                        <li>
                            <a class="text" to href="explore">Explore</a>
                        </li>
                        <li class="has-children">
                            <a class="text">Scholarly & Research</a>
                            <?php 
                            $dropdownItems = [
                                [
                                    'title'=>'Theses & Disserta...',
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
                            $class="top-100";
                            include UTILS.'dropdownList.php'?>
                        </li>
                        <li class="has-children">
                            <a class="text">Learning Materials</a>
                            <?php 
                            $dropdownItems = [
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
                            include UTILS.'dropdownList.php'?>
                        </li>
                        <li class="has-children">
                            <a class="text">Academic Events</a>
                            <?php 
                            $dropdownItems = [
                                [
                                    'title'=>'Conference Proce..',
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
                            $class="top-100";
                            include UTILS.'dropdownList.php'?>
                        </li>
                        <?php if(user_login_status()){?>
                        <li class="has-children">
                            <a class="text">Upload</a>
                            <?php 
                            $dropdownItems = [
                                [
                                    'title'=>'Thesis or Disserta..',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="research_document/add"',
                                ],
                                [
                                    'title'=>'Research article',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="research_article/add"',
                                ],
                                [
                                    'title'=>'Reports & Dataset',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="reports_dataset/add"',
                                ],
                                [
                                    'title'=>'Lecture Notes',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="lecture_notes/add"',
                                ],
                                [
                                    'title'=>'Books & chapters',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="ebooks/add"',
                                ],
                                [
                                    'title'=>'Past Question',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="past_questions/add"',
                                ],
                                [
                                    'title'=>'Confrence',
                                    'icon'=>'pi pi-plus',
                                    'attr'=>'to href="conferences/add"',
                                ],
                            ];
                            $class = "right-0"; include UTILS.'dropdownList.php'?>
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="d-flex d-md-none navH text-capitalize" onclick="openNav('menu')">
                        <li><span class="p-2">Menu</span></li>
                        <li>
                            <a><i class="pi pi-bars text-xl"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

