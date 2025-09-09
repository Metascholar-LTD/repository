<?php
$url = $data['file'];
$fileDetails = getFileDetails($url);
$subject = $data['subjects'];
$program = $data['program'];
$faculty =  $data['faculty'];
?>
<div class="pageSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="text-500">
                    <!-- RECORD ID: <?=$data['ctrl']?> -->
                </div>
                <div class="bg-white p-3 shadow-sm">
                    <h3 class="mb-3 font2 text-black"><?=$data['title']?></h3>
                    <div class="text-md">Subject: <?=$data['subjects']?></div>
                    <div class="text-md">Date Issued: <?=human_date($data['issues_date'])?></div>
                    <div class="text-md mb-4">Author:  <?=$data['authors']?></div>
                </div>
                <div class="submain-5 pt-3">
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
                            <div class="mb-3 active shadow-0  py-3">
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
                                        <td><a class="text-black"><?=$data['title']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Faculty</th>
                                        <td><a class="text-black"><?=$data['faculty']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Programme</th>
                                        <td><a class="text-black"><?=$data['program']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Subject</th>
                                        <td><a class="text-black"><?=$data['subjects']?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="px-3 text-md text-black">Date Issued</th>
                                        <td><a class="text-black"><?=$data['issues_date']?></a></td>
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
                                        <td><a class="text-black"><?=relative_date($data['timestamp'])?></a></td>
                                    </tr>
                                 
                                </table>
                                <div class="p-3">
                                    <button class="btn btn-success" onclick="downloadFile('research_document',<?=$data['id']?>, $(this))">Download Full Issue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-fill mt-5">
                    <?= render_data("research_document/sm?program=$program&subject=$subject&faculty=$faculty&pageTitle=CONTINUE READING");?>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="h-100 relative" data-page-url="<?php print_link('research_document');?>">
                    <div class="bg-white">
                        <div class="card p-3 shadow-0 border border-white border-2 bar-0" style="height:100%;">
                            <?php 
                                $this->render_page("api/moreFilter/research_document/authors", ['f'=>'authors', 'title'=>'Authors']);
                                $wrapperClass = "mt-4";
                                $this->render_page("api/moreFilter/research_document/subjects", ['f'=>'subject', 'title'=>'Subjects']);
                                $this->render_page("api/moreFilter/research_document/date(issues_date)", ['f'=>'date', 'title'=>'Date Issued']);
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
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
<script>
function downloadFile($table, $id, dis) {
    var l = siteAddr + 'api/fileUrl/' + $table + '/' + $id;
    
    // Remove any existing refresh icon and add a spinning refresh icon
    dis.find('.pi-refresh').remove();
    dis.append('<i class="pi pi-refresh pi-spin ml-2"></i>');

    // Make a GET request to the API to get the file path
    $.get(l, function (filePath) {
        // Remove the spinning refresh icon
        dis.find('.pi-refresh').remove();

        // Check if the file path is not empty
        if (filePath) {
            // Create a hidden anchor element
            var link = document.createElement('a');
            link.href = filePath;
            link.target = '_blank'; // Open the link in a new tab
            link.download = ''; // You can set a default filename if needed

            // Append the anchor element to the document
            document.body.appendChild(link);

            // Trigger a click on the anchor element to start the download
            link.click();

            // Remove the anchor element from the document
            document.body.removeChild(link);
        } else {
            // Handle the case when the file path is empty or not available
            console.error('File path is empty or not available.');
        }
    });
}
</script>
