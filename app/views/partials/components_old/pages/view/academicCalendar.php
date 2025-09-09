<?php
$url = $data['file'];
$fileDetails = getFileDetails($url);
?>
<div class="pageSection">
    <div class="container">
        <div class="row">
            <div class="col-lg col-12">
                <div class="text-400">
                    RECORD ID: <?=$data['ctrl']?>
                </div>
                <div>Academic Calendar</div>
                <h3 class="mb-3 font2 text-black"><?=$data['title']?></h3>
                <div class="text-md"><?=$data['faculty']?> <i class="pi pi-external-link small"></i></div>
                <div class="text-md"><?=$data['semester'].' Semester '.' / '.$data['year']?></div>
                
                
                <div class="my-5">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="mb-3 card border-danger active shadow-0 border border-2 py-3">
                                <div class="mb-3">
                                    <h4 class="bold text-lg col-12 font2">Associated File</h4>
                                </div>
                                <table class="table table-hover">
                                    <tr>
                                        <th class="px-3 text-md text-black">Title</th>
                                        <td><a class="text-black"><?=str_truncate($data['title'], 100)?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Faculty</th>
                                        <td><a class="text-black"><?=$data['faculty']?></a></td>
                                    </tr>
                                    <?php if(count(explode(',',$url)) <= 1){?>
                                    <tr>
                                        <th class="px-3 text-md text-black">Format</th>
                                        <td><a class="text-black"><?php if($fileDetails) echo strtoupper($fileDetails['extension']);?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Size</th>
                                        <td><a class="text-black">~<?php if($fileDetails) echo $fileDetails['size'];?></a></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th class="px-3 text-md text-black">View Count</th>
                                        <td><a class="text-black"><?=$data['views']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Timestamp</th>
                                        <td><a class="text-black"><?=relative_date($data['datein'])?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Last reviewed</th>
                                        <td><a class="text-black"><?=human_date($data['lastupdate'])?></a></td>
                                    </tr>
                                </table>
                                <div class="p-3">
                                    <?php if(!empty($url)){ $i = 0;
                                    foreach(explode(',',$url) as $file) { $i++;?>
                                        <button class="btn btn-danger text-white mb-1" onclick="downloadFile('conferences',<?=$data['id']?>, $(this), <?=($i-1)?>)">
                                            <i class="pi pi-download"></i> Download Partition <?=$i?>
                                        </button>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>@media(min-width:900px){.hsmart23{height:calc(100vh - 30px);}}</style>