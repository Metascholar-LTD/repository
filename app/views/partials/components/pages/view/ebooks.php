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
                <h3 class="font2 text-black"><?=$data['title']?></h3>
                <div class="mb-3 text-info"><?=$data['type']?></div>
                <div class="text-md"><?=$data['authors']?> <i class="pi pi-external-link small"></i></div>
                <div class=" mb-4">
                    <span class=""><b>Year Published:</b> <?= $data['year_published']?></span>
                    <span class="ml-2"><b>Edition:</b> <?= $data['edition']?></span>
                </div>
                <div class="submain-5">
                    <div class="t3-module module mb-3 " id="Mod334">
                        <div class="module-inner">
                            <h3 class="module-title ">
                                <span class="titlecard">Description</span>
                            </h3>
                            <div class="module-ct">
                                <div id="mod-custom334" class="mod-custom custom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <h4 class="bold font2">Description</h4>
                <hr class="border border-danger short"/> -->
                <div class="font2 mb-5">
                    <p style="font-size:16px;"><?=$data['description']?></p>
                </div>
                <?php 
                $thumbs = $data['thumbs'];
                if(!empty($thumbs)){?>
                <div class="border border-2 hover-secondary active shadow-0 o-0 mb-5" style="border-radius:20px;"><img src="<?php print_link($data['thumbs'])?>" width="100%"/></div>
                <?php } ?>
                <div class="mb-5">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="mb-3 card hover-secondary active shadow-0 border border-2 py-3">
                                <div class="mb-3">
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
                                    <!-- <h4 class="bold text-lg col-12 font2">Associated File</h4> -->
                                </div>
                                <table class="table table-hover">
                                    <tr>
                                        <th class="px-3 text-md text-black">Type</th>
                                        <td><a class="text-black"><?=$data['type']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Title</th>
                                        <td><a class="text-black"><?=str_truncate($data['title'], 100)?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Authors</th>
                                        <td><a class="text-black"><?=$data['authors']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Edition</th>
                                        <td><a class="text-black"><?=$data['edition']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Faculty</th>
                                        <td><a class="text-black"><?=$data['faculty']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Format</th>
                                        <td><a class="text-black"><?php if($fileDetails) echo strtoupper($fileDetails['extension']);?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Size</th>
                                        <td><a class="text-black">~<?php if($fileDetails) echo $fileDetails['size'];?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">External Link</th>
                                        <td><a class="text-info" target="_blank" href="<?=$data['file_url']?>"><?= substr($data['file_url'], 0, 75) . '...' ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">View Count</th>
                                        <td><a class="text-black"><?=$data['views']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Timestamp</th>
                                        <td><a class="text-black"><?=relative_date($data['datein'])?></a></td>
                                    </tr>
                                </table>
                                <div class="p-3">
                                    <?php if(!empty($url)){ $i = 0;
                                    foreach(explode(',',$url) as $file) { $i++;?>
                                        <button class="btn btn-warning mb-1" onclick="downloadFile('ebooks',<?=$data['id']?>, $(this), <?=($i-1)?>)">
                                            <i class="pi pi-download text-white"></i> Download Book
                                        </button>
                                    <?php } }
                                    if(!empty($data['file_url'])){ ?>
                                    <a class="btn btn-primary mb-1" target="_blank" href="<?=$data['file_url']?>">
                                        <i class="pi pi-download text-white"></i> View from external source
                                    </a>
                                    <?php } ?>
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