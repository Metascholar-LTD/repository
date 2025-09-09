<?php 
$home = (user_login_status())?'home':'index';
?>
<div>
    <div class="bg-white">
        <ul class="">
                        <li>
                            <a class="" to href="<?php print_link($home);?>">
                                <i class="pi pi-home text-xl mr-2 "></i>
                                <span class="text-lg">Home</span>
                            </a>
                        </li>
                        <?php
                        $Items =  [
                            [
                                'title'=>'Theses & Dissertation.',
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
                        foreach($Items as $Item){?>
                        <li>
                            <a <?=$Item['attr']?>>
                                <i class="text-xl mr-2 <?=$Item['icon']?>"></i>
                                <span class="text-lg"><?=$Item['title']?></span>
                            </a>
                        </li>
                        <?php } ?>


                        <hr/>
                        <?php
                        $Items = [
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
                        foreach($Items as $Item){?>
                        <li>
                            <a <?=$Item['attr']?>>
                                <i class="text-xl mr-2 <?=$Item['icon']?>"></i>
                                <span class="text-lg"><?=$Item['title']?></span>
                            </a>
                        </li>
                        <?php } ?>


                        <hr/>
                        <?php
                        $Items = [
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
                        foreach($Items as $Item){?>
                        <li>
                            <a <?=$Item['attr']?>>
                                <i class="text-xl mr-2  <?=$Item['icon']?>"></i>
                                <span class="text-lg"><?=$Item['title']?></span>
                            </a>
                        </li>
                        <?php } ?>
        </ul>
    </div>
    <!-- <div class="bg-black mx-fill p-3 py-5 mt-4" style="margin-bottom:-15px;">
        <div class="p-3">
            <div>
                <h3 class="text-white font"><?="External Links"?></h3>
                <hr class="short border-2 border-danger"/>
            </div>
            <div>
                <?php
                $Items = [
                    [
                        'title'=>'About CUG',
                        'icon'=>'pi pi-globe',
                        'attr'=>'target="__blank" href="https://www.cug.edu.gh/AboutUs/WhoWeAre.php"',
                    ],
                    [
                        'title'=>'Leadership',
                        'icon'=>'pi pi-users',
                        'attr'=>'target="__blank" href="https://www.cug.edu.gh/AboutUs/leadership.php"',
                    ],
                    [
                        'title'=>'Programmes',
                        'icon'=>'pi pi-book',
                        'attr'=>'target="__blank" href="https://www.cug.edu.gh/Programmes/graduate.php"',
                    ],
                    [
                        'title'=>'Admission',
                        'icon'=>'pi pi-heart',
                        'attr'=>'target="__blank" href="https://www.cug.edu.gh/Admissionw/postgraduate.php"',
                    ],
                    [
                        'title'=>'Compus Life',
                        'icon'=>'pi pi-building',
                        'attr'=>'target="__blank" href="https://www.cug.edu.gh/Admissionw/postgraduate.php"',
                    ],
                    [
                        'title'=>'Research',
                        'icon'=>'pi pi-copy',
                        'attr'=>'target="__blank" href="https://www.cug.edu.gh/Researchw/staffpub.php"',
                    ],
                    [
                        'title'=>'CUG Journal',
                        'icon'=>'pi pi-phone',
                        'attr'=>'target="__blank" href="https://ijmsirjournal.com/index.php/ojs"',
                    ],
                ];  
                foreach($Items as $Item){?>
                <li class="mb-2">
                    <a <?=$Item['attr']?>>
                        <i class="text-xl mr-2 text-gold  <?=$Item['icon']?>"></i>
                        <span class="text-lg text-white"><?=$Item['title']?></span>
                    </a>
                </li>
                <?php } ?>
            </div>
        </div>
    </div> -->
</div>