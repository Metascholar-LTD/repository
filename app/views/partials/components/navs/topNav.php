<?php
$home = (user_login_status())?'home':'index';
$home = SITE_ADDR.$home;
?>
<div id="top-nav">
    <div class="surface">
        <div class="container" style="background-color:#004C23 !important;">
            <div class="row">
                <div class="col">
                    <div style="height:30px;"></div>
                </div>
                <div class="col-auto px-3">
                    <ul class="d-none d-md-flex navH bold text-capitalize centeredL">
                        <li>
                            <a class="text-400" style="color:#ffffff;" target="_blank" href="https://www.cug.edu.gh/about/overview">About CUG</a>
                        </li>
                        <li>
                            <a class="text-400" style="color:#ffffff;" target="_blank" href="https://www.cug.edu.gh/about/the-university-governance">University Governance</a>
                        </li>
                        <li>
                            <a class="text-400" style="color:#ffffff;" target="_blank" href="https://www.cug.edu.gh/admissions/udergraduate-programmes">Admission</a>
                        </li>
                        <li>
                            <a class="text-400" style="color:#ffffff;" target="_blank" href="https://www.cug.edu.gh/academics/academic-department">Academic Department</a>
                        </li>
                        <li>
                            <!-- <a class="text-400" style="color:#ffffff;" target="_blank" href="https://www.cug.edu.gh/Admissionw/postgraduate.php">Campus life</a> -->
                        </li>
                        <li>
                            <a class="text-400" style="color:#ffffff;" target="_blank" href="https://www.cug.edu.gh/office-research-and-innovation">Research</a>
                        </li>
                        <li>
                            <a class="text-400" style="color:#ffffff;" target="_blank" href="https://ijmsirjournal.com/index.php/ojs">CUG Journal</a>
                        </li>
                        <li>
                            <?php if(user_login_status()){?>
                            <a class="text-white centeredL" to href="account">
                                <i class="pi pi-user text-lg text-white"></i>
                                <i class="pi pi-chevron-down text-white small ml-2"></i>
                            </a>
                         
                            <?php } else {?>
                            <a class="text-white btn" href="<?php print_link('home')?>">
                                LOGIN
                                <!-- <i class="pi pi-chevron-down text-white small ml-2"></i> -->
                            </a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if(user_login_status()){?>
                                <a class="text-white" onclick="logout()">
                                    LOGOUT
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
                            <a class="text-white btn" href="<?php print_link('home')?>">
                                LogIn
                                <i class="pi pi-chevron-down text-white small ml-2"></i>
                            </a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if(user_login_status()){?>
                                <a class="text-white" onclick="logout()">
                                    LOGOUT
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper shadow-sm" style="background-color:#F0F4F9 !important;">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col">
                    <div class="d-md-block d-block position-absolute" style="bottom:-20px;">
                        <div class="pl-5 centeredL align-items-end">
                            <img src="assets/images/cug-repo.jpeg" width="50" style="height:47px;" alt="logo"/>
                            <div class="pl-2">
                                <div class="bold text-black font2" style="font-size: 25px;"><?=strtoupper('Catholic')?></div>
                                <div class="small">
                                   <?=strtoupper('University')?>
                                   <span class="border-top border-danger"><?=strtoupper('of')?></span>
                                   <?=strtoupper('Ghana')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto pr-5">
                    <ul class="d-none d-md-flex navH">
                        <li>
                            <a class="text text-black" to href="<?=$home?>"><?=user_login_status()?'Dashboard':'Home';?></a>
                        </li>
                        <li>
                            <a class="text text-black" to href="explore">Discover</a>
                        </li>
                        <li class="has-children">
                            <a class="text">Documentation</a>
                            <?php 
                            $dropdownItems = [
                                [
                                    'title'=>'Theses & Dissertation',
                                    // 'icon'=>'pi pi-copy small',
                                    'attr'=>'to href="research_document"',
                                ],
                                [
                                    'title'=>'Research Articles',
                                    // 'icon'=>'pi pi-copy small',
                                    'attr'=>'to href="research_article"',
                                ],
                                [
                                    'title'=>'Report and Dataset',
                                    // 'icon'=>'pi pi-chart-line',
                                    'attr'=>'to href="reports_dataset"',
                                ],
                            ];
                            $class="top-100";
                            include UTILS.'dropdownList.php'?>
                        </li>
                        <li class="has-children">
                            <a class="text">Resources</a>
                            <?php 
                            $dropdownItems = [
                                [
                                    'title'=>'Lecture Notes',
                                    // 'icon'=>'pi pi-file',
                                    'attr'=>'to href="lecture_notes"',
                                ],
                                [
                                    'title'=>'Books and Chapters',
                                    // 'icon'=>'pi pi-book',
                                    'attr'=>'to href="ebooks"',
                                ],
                                [
                                    'title'=>'Past questions',
                                    // 'icon'=>'pi pi-clone',
                                    'attr'=>'to href="past_questions"',
                                ],
                            ];
                            include UTILS.'dropdownList.php'?>
                        </li>
                        <li class="has-children">
                            <a class="text">Scholastic Forums</a>
                            <?php 
                            $dropdownItems = [
                                [
                                    'title'=>'Conference Proce..',
                                    // 'icon'=>'pi pi-folder',
                                    'attr'=>'to href="conferences"',
                                ],
                                [
                                    'title'=>'Speech',
                                    // 'icon'=>'pi pi-comments',
                                    'attr'=>'to href="speech"',
                                ],
                                [
                                    'title'=>'Academic Calendar',
                                    // 'icon'=>'pi pi-calendar',
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
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="research_document/add"',
                                ],
                                [
                                    'title'=>'Research article',
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="research_article/add"',
                                ],
                                [
                                    'title'=>'Reports & Dataset',
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="reports_dataset/add"',
                                ],
                                [
                                    'title'=>'Lecture Notes',
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="lecture_notes/add"',
                                ],
                                [
                                    'title'=>'Books & chapters',
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="ebooks/add"',
                                ],
                                [
                                    'title'=>'Past Question',
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="past_questions/add"',
                                ],
                                [
                                    'title'=>'Confrence',
                                    // 'icon'=>'pi pi-plus',
                                    'attr'=>'to href="conferences/add"',
                                ],
                            ];
                            $class = "right-0"; include UTILS.'dropdownList.php'?>
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="d-flex d-md-none navH text-capitalize" onclick="openNav('menu')">
                        <!-- <li><span class="p-2">Menu</span></li> -->
                        <li>
                            <a><i class="pi pi-bars text-xl"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

