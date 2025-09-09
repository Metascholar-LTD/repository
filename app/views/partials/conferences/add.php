<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div  class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 p-5 shadow-lg border comp-grid curve form-bg">
                    <div class=""><div class="text-center p-3">
                        <h3 class="record-title">Add Conference Record</h3>
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form id="conferences-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("conferences/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="2" name="title" class=" form-control"><?php  echo $this->set_field_value('title',""); ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="authors">Authors <span class="text-danger">*</span></label>
                                    <div id="ctrl-authors-holder" class=""> 
                                        <textarea placeholder="Enter Authors" id="ctrl-authors"  required="" rows="2" name="authors" class=" form-control"><?php  echo $this->set_field_value('authors',""); ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                    <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                        <div class="">- Separate multiple authors with commas "," or semicolumn ";".</div>
                                        <div class="">- Example1: "John Doe, Jane Smith".</div>
                                        <div class="">- Example2: "John Doe; Jane Smith".</div>
                                        <div class="">- Either ways are correct".</div>
                                    <div class="">- If there's a single author, enter their full name.</div></small> -->
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="publisher">Publisher <span class="text-danger">*</span></label>
                                    <div id="ctrl-publisher-holder" class=""> 
                                        <input id="ctrl-publisher"  value="<?php  echo $this->set_field_value('publisher',""); ?>" type="text" placeholder="Enter Publisher"  required="" name="publisher"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="issue_date">Issue Date <span class="text-danger">*</span></label>
                                        <div id="ctrl-issue_date-holder" class=""> 
                                            <input id="ctrl-issue_date" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('issue_date',""); ?>" type="datetime" name="issue_date" placeholder="Enter Issue Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                                            <div id="ctrl-description-holder" class=""> 
                                                <textarea placeholder="Enter Description" id="ctrl-description"  required="" rows="10" name="description" class=" form-control"><?php  echo $this->set_field_value('description',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="link">External Link (OPTIONAL) </label>
                                            <div id="ctrl-link-holder" class=""> 
                                                <input id="ctrl-link"  value="<?php  echo $this->set_field_value('link',""); ?>" type="text" placeholder="Enter External Link (OPTIONAL)"  name="link"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="file">Upload File <span class="text-danger">*</span></label>
                                                <div id="ctrl-file-holder" class=""> 
                                                    <div class="dropzone required" input="#ctrl-file" fieldname="file"    data-multiple="true" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="300" maximum="10">
                                                        <input name="file" id="ctrl-file" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('file',""); ?>" type="text"  />
                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                <div class="form-ajax-status"></div>
                                                <button class="btn btn-primary" type="submit">
                                                    Submit
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="">
                                        <script>
                                            $(document).ready(function(){
                                            initPdfBuilder();
                                            $('#research_document-add-form fieldset').addClass('border-gold border texture-gold p-3 card ')
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