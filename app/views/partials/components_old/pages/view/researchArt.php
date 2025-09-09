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
                <div class="text-400">
                    RECORD ID: <?=$data['ctrl']?>
                </div>
                <h3 class="mb-3 font2 text-black"><?=$data['title']?></h3>
                <div class="text-md"><?=$data['authors']?> <i class="pi pi-external-link small"></i></div>
                <div class="text-md"><?=$data['journal_name']?>, DOI-ISSN: <?=$data['doi_issn']?>, Volume: <?=$data['volume']?></div>
                <div><a class="text-info" target="_blank" href="<?=$source?>"><?=str_truncate($source,100)?></a></div>
                <div class=" mb-4">
                    <span><b>Country of Publication:</b> <?=$data['country_of_publication']?></span>
                    <span class="ml-2"><b>Published Year:</b> <?= $data['year_of_publication']?></span>
                    <span class="ml-2 has-children">
                        <b>Deatails</b> <i class="pi pi-chevron-down small"></i>
                        <div class="dropdown border-gold border right-0" style="width:270px;">
                            <div>
                                <div class="bold p-2 text-gold">
                                    Record Timeline
                                </div>
                                <table class="table table-bordered table-hover text-black">
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
                    <a class="centeredL" onclick="downloadFile('research_article',<?=$data['id']?>, $(this))">
                        <i class="pi pi-file-pdf text-lg text-red mr-1"></i> Download PDF
                    </a>
                    <a class="centeredL ml-4" target="_blank" href="<?=$source?>">
                        <i class="pi pi-eye text-lg mr-1"></i> View From Original Source
                    </a>
                    <span class="centeredL ml-4 has-children">
                        <i class="pi pi-share-alt text-lg mr-2"></i> Share <i class="pi pi-chevron-down small ml-1"></i>
                        <?php $dropdownItems = $shareItems; $class="right-0";include UTILS.'dropdownList.php';?>
                    </span>
                </div>
                <hr class="mt-2">
                <h4 class="bold font2">Abstract</h4>
                <hr class="border border-danger short"/>
                <div class="font2 mb-5">
                    <p><?=$data['abstract']?></p>
                </div>
                <?php 
                $thumbs = $data['thumbs'];
                if(!empty($thumbs)){?>
                <div class="border border-2 hover-primary active shadow-sm o-0 mb-5" style="border-radius:20px;"><img src="<?php print_link($data['thumbs'])?>" width="100%"/></div>
                <?php } ?>
                <div class="mb-5">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="mb-3 card hover-primary active shadow-0 border border-2 py-3">
                                <div class="mb-3">
                                    <h4 class="bold text-lg col-12 font2">Associated File</h4>
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
                    <div class="px-3">
                        <div class="mb-3">
                            <h4 class="bold text-lg font2">Keywords</h4>
                        </div>
                        <hr class="short border border-danger"/>
                        <div>
                            <?php 
                            $param = explode(',', $keywords);
		                    if(!empty($param)){
		                    foreach($param as $item){ 
		                    ?>
                            <button class="pill border border-dark bg-white mb-1"><?=urldecode($item)?></button>
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
