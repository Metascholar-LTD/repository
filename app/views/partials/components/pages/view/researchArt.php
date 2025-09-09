<?php
$url = $data['file'];
$fileDetails = getFileDetails($url);
$keywords = $data['keywords'];
$source = $data['source_url'];
$shareItems = [
    ['title'=>'Twitter','icon'=>'pi pi-twitter','attr'=>'target="_blank" href="https:twitter.com/"'],
    ['title'=>'Facebook','icon'=>'pi pi-facebook','attr'=>'target="_blank" href="https:facebook.com/"'],
    ['title'=>'LinkedIn','icon'=>'pi pi-linkedin','attr'=>'target="_blank" href="https:twitter.com/"'],
    ['title'=>'Email','icon'=>'pi pi-envelope','attr'=>'target="_blank" href="https:twitter.com/"'],
];
?>
<div class="pageSection">
    <div class="container">
        <div class="row">
            <div class="col-lg col-12">
                <div class="text-500">
                    <!-- RECORD ID: <?=$data['ctrl']?> -->
                </div>
                <div class="bg-white p-3 shadow-sm">
                    <h3 class="mb-3 font2 text-black"><?=$data['title']?></h3>
                    <div class="text-md"><?=$data['authors']?> <i class="pi pi-external-link small"></i></div>
                    <div class="text-md"><?=$data['journal_name']?>, DOI-ISSN: <?=$data['doi_issn']?>, Volume: <?=$data['volume']?></div>
                    <div><a class="text-info" target="_blank" href="<?=$source?>"><?=str_truncate($source,100)?></a></div>
                
                <div class="mb-4 pt-3">
                    <span><b>Country of Publication:</b> <?=$data['country_of_publication']?></span>
                    <span class="ml-2"><b>Published Year:</b> <?= $data['year_of_publication']?></span>
                    <span class="ml-2 has-children">
                        <b>Intricacies</b> <i class="pi pi-chevron-down small"></i>
                        <div class="dropdown right-0" style="width:270px;">
                            <div class="">
                                <div class="bold p-2 text-center">
                                    Record Timeline
                                </div>
                                <table class="table table-borderless table-hover text-black">
                                    <tr>
                                        <th class="text-black">Year Published</th>
                                        <td><?=$data['year_of_publication']?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-black">Date Recieved</th>
                                        <td><?=human_date($data['timestamp'])?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-black">Date Approved</th>
                                        <td><?=human_date($data['lastupdate'])?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </span>
                </div>
                
                <div class="centeredL">
                    <div>
                    <a class="centeredL bg-success p-3" onclick="downloadFile('research_article',<?=$data['id']?>, $(this))">
                        <i class="pi pi-file-pdf text-lg text-red mr-1"></i> Download PDF
                    </a>
                    </div>
                    <div>
                    <a class="centeredL bg-info p-3 ml-4 text-white" target="_blank" href="<?=$source?>">
                        <i class="pi pi-eye text-lg mr-1"></i> View From Original Source
                    </a>
                    </div>
                    <span class="centeredL bg-warning p-3 ml-4 has-children">
                        <i class="pi pi-share-alt text-lg mr-2"></i> Share <i class="pi pi-chevron-down small ml-1"></i>
                        <?php $dropdownItems = $shareItems; $class="right-0";include UTILS.'dropdownList.php';?>
                    </span>
                </div>
                </div>
                <!-- <hr class=""> -->
                <!-- <h4 class="bold font2">Abstract</h4>
                <hr class="border border-danger short"/> -->
                <div class="submain-5 mt-2">
                    <div class="t3-module module mb-3 " id="Mod334">
                        <div class="module-inner">
                            <h3 class="module-title ">
                                <span class="titlecard">Abstract</span>
                            </h3>
                            <div class="module-ct">
                                <div id="mod-custom334" class="mod-custom custom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="font2 mb-5">
                    <p style="font-size:16px;"><?=$data['abstract']?></p>
                </div>
                <?php 
                $thumbs = $data['thumbs'];
                if(!empty($thumbs)){?>
                <div class="border border-2 active shadow-sm o-0 mb-5" style="border-radius:20px;"><img src="<?php print_link($data['thumbs'])?>" width="100%"/></div>
                <?php } ?>
                <div class="mb-5">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="mb-3 active shadow-0 py-3">
                                <div class="mb-3">
                                    <!-- <h4 class="bold text-lg col-12 font2">Associated File</h4> -->
                                    <div class="submain-5">
                                        <div class="t3-module module mb-3 " id="Mod334">
                                            <div class="module-inner">
                                                <h3 class="module-title ">
                                                    <span class="titlecard">Associated File</span>
                                                </h3>
                                                <div class="module-ct">
                                                    <div id="mod-custom334" class="mod-custom custom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover">
                                    <tr>
                                        <th class="px-3 text-md text-black">Title</th>
                                        <td><a class="text-black"><?=str_truncate($data['title'], 50)?></a></td>
                                    </tr>


                                    <tr>
                                        <th class="px-3 text-md text-black">Faculty</th>
                                        <td><a class="text-black"><?=$data['faculty']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Subject</th>
                                        <td><a class="text-black"><?=$data['subject']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Journal Name</th>
                                        <td><a class="text-black"><?=$data['journal_name']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Country of Publication</th>
                                        <td><a class="text-black"><?=$data['country_of_publication']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Year of Publication</th>
                                        <td><a class="text-black"><?=$data['year_of_publication']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">DOI / ISSN</th>
                                        <td><a class="text-black"><?=$data['doi_issn']?></a></td>
                                    </tr>




                                    <tr>
                                        <th class="px-3 text-md text-black">Format</th>
                                        <td><a class="text-black"><?php if($fileDetails) echo strtoupper($fileDetails['extension']);?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Size</th>
                                        <td><a class="text-black"><?php if($fileDetails) echo $fileDetails['size'];?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">View Count</th>
                                        <td><a class="text-black"><?=$data['views']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Timestamp</th>
                                        <td><a class="text-black"><?=human_datetime($data['timestamp'])?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Last reviewed</th>
                                        <td><a class="text-black"><?=human_date($data['lastupdate'])?></a></td>
                                    </tr>
                                </table>
                                <div class="p-3">
                                    <button class="btn btn-success" onclick="downloadFile('research_article',<?=$data['id']?>, $(this))">Download Full Issue</button>
                                    <a class="btn btn-primary" target="_blank" href="<?=$source?>">View From Original Source</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0 col-12">
                <div class="h-100">
                    <?php if(!empty($keywords)){?>
                    <div class="px-3 mb-3">
                        <div class="mb-3">
                            <!-- <h4 class="bold text-lg font2">Keywords</h4> -->
                            <div class="submain-5">
                                <div class="t3-module module mb-3 " id="Mod334">
                                    <div class="module-inner">
                                        <h3 class="module-title ">
                                            <span class="titlecard">Keywords</span>
                                        </h3>
                                        <div class="module-ct">
                                            <div id="mod-custom334" class="mod-custom custom">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="short border border-danger"/> -->
                        <div>
                            <?php 
                            $param = explode(',', $keywords);
		                    if(!empty($param)){
		                    foreach($param as $item){ 
		                    ?>
                            <button class="btn btn-outline-info bg-info text-white mb-1"><?=urldecode($item)?></button>
                            <?php
		                    } 
		                    }	
		                    ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="sticky-top" style="top:20px">
                        <div class="scroll-y bg-white bar-0 p-3 hsmart23">
                            <div>
                                <?= render_data("research_article/sm?pageTitle=CONTINUE READING");?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>@media(min-width:900px){.hsmart23{height:calc(100vh - 30px);}}</style>
<style>

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