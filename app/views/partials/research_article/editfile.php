<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div  class="my-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 p-5 shadow-lg border comp-grid curve form-bg">
                    <div class=""><div class="text-center p-3">
                        <h3 class="record-title">Modify Research Article</h3>
                        <!-- <div class="small"><mark>RECORD ID: <?=$data['ctrl']?></mark></div> -->
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("research_article/editfile/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="file">File <span class="text-danger">*</span></label>
                                    <div id="ctrl-file-holder" class=""> 
                                        <div class="dropzone required" input="#ctrl-file" fieldname="file"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".pdf" filesize="300" maximum="1">
                                            <input name="file" id="ctrl-file" required="" class="dropzone-input form-control" value="<?php  echo $data['file']; ?>" type="text"  />
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                            </div>
                                        </div>
                                        <?php Html :: uploaded_files_list($data['file'], '#ctrl-file'); ?>
                                        <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                            <div class="">- Ensure the file format is PDF.</div>
                                            <div class="">- Maximum: 1 PDF file allowed.</div>
                                        <hr class="border-gold"/></small> -->
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="thumbs">Thumbs (Automated)</label>
                                        <div id="ctrl-thumbs-holder" class=""> 
                                            <div class="dropzone required" input="#ctrl-thumbs" fieldname="thumbs"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="100" maximum="1">
                                                <input name="thumbs" id="ctrl-thumbs" required="" class="dropzone-input form-control" value="<?php  echo $data['thumbs']; ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                            <?php Html :: uploaded_files_list($data['thumbs'], '#ctrl-thumbs'); ?>
                                            <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                <div class="">- Please wait for the thumbs to upload completely.</div>
                                                <div class="">- Thumbnails are automatically generated from the uploaded PDF.</div>
                                            <div class="">- Thumbnails represent 1st pages of the PDF file.</div></small> -->
                                        </div>
                                    </div>
                                    <div class="form-ajax-status"></div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit">
                                            Update
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <script>
                                    $(document).ready(function(){
                                    initPdfBuilder();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<style>
    .curve{
        border-radius: 20px;
    }
</style>