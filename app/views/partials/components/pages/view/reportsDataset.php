<?php
$url = $data['file'];
$fileDetails = getFileDetails($url);
echo phpversion();
?>
<div class="pageSection">
    <div class="container">
        <div class="row">
            <div class="col-lg col-12">
                <div class="text-500">
                    <!-- RECORD ID: <?=$data['ctrl']?> -->
                </div>
                <div class="p-3 shadow-sm" style="background-color:#F0F4F9 !important;">
                <h3 class="mb-3 font2 text-black"><?=$data['title']?></h3>
                <div class="text-md"><?=$data['authors']?> <i class="pi pi-external-link small"></i></div>
                <div class=" mb-4">
                    <span class=""><b>Published Year:</b> <?= $data['year_published']?></span>
                    <span class="ml-2 has-children">
                        <b>Deatails</b> <i class="pi pi-chevron-down small"></i>
                        <div class="dropdown" style="width:270px;">
                            <div>
                                <div class="bold p-2 text-center">
                                    Record Timeline
                                </div>
                                <table class="table table-borderless table-hover text-black">
                                    <tr>
                                        <th class="text-black">Year Published</th>
                                        <td><?=$data['year_published']?></td>
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
                </div>
                <div class="submain-5 pt-3">
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
                <div class="font2 mb-5" style="background-color:#F0F4F9 !important;">
                    <p style="font-size:16px;"><?=$data['description']?></p>
                </div>
                <div class="mb-5">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="mb-3 card active shadow-sm py-3">
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
                                <table class="table table-hover" style="background-color:#F0F4F9 !important;">
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
                                        <th class="px-3 text-md text-black">Subject</th>
                                        <td><a class="text-black"><?=$data['subject']?></a></td>
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
                                        <td><a class="text-black"><?=relative_date($data['timestamp'])?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Last reviewed</th>
                                        <td><a class="text-black"><?=human_date($data['lastupdate'])?></a></td>
                                    </tr>
                                </table>
                                <div class="p-3">
                                    <?php if(!empty($url)){ $i = 0;
                                    foreach(explode(',',$url) as $file) { $i++;?>
                                        <button class="btn bg-primary text-white mb-1" onclick="downloadFile('reports_dataset',<?=$data['id']?>, $(this), <?=($i-1)?>)">
                                            <i class="pi pi-download text-white"></i> Download Partition <?=$i?>
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