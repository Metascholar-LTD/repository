<div>
    <div class="bg-white">
        <ul class="">
                        <li>
                            <a class="" to href="<?=SITE_ADDR?>">
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
    <div class="bg-black mx-fill p-3 py-5 mt-4" style="margin-bottom:-15px;">
        <div class="p-3">
            <div>
                <h3 class="text-white font"><?="External Links"?></h3>
                <hr class="short border-2 border-danger"/>
            </div>
            <div>
                <?php
                $Items = [
                    [
                        'title'=>'CUG Official website',
                        'icon'=>'pi pi-globe',
                        'attr'=>'target="__blank" href="cug.edu.gh"',
                    ],
                    [
                        'title'=>'Admission',
                        'icon'=>'pi pi-users',
                        'attr'=>'to href="speech"',
                    ],
                    [
                        'title'=>'Academics',
                        'icon'=>'pi pi-book',
                        'attr'=>'to href="academic_calendar"',
                    ],
                    [
                        'title'=>'Carrier',
                        'icon'=>'pi pi-heart',
                        'attr'=>'to href="academic_calendar"',
                    ],
                    [
                        'title'=>'Compus Life',
                        'icon'=>'pi pi-building',
                        'attr'=>'to href="academic_calendar"',
                    ],
                    [
                        'title'=>'Media',
                        'icon'=>'pi pi-video',
                        'attr'=>'to href="academic_calendar"',
                    ],
                    [
                        'title'=>'Contact',
                        'icon'=>'pi pi-phone',
                        'attr'=>'to href="academic_calendar"',
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
    </div>
</div>