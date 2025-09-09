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
                        <h3 class="record-title">Upload Report & Dataset</h3>
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form id="reports_dataset-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("reports_dataset/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="type">Type <span class="text-danger">*</span></label>
                                    <div id="ctrl-type-holder" class=""> 
                                        <select required=""  id="ctrl-type" name="type"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $type_options = Menu :: $type2;
                                            if(!empty($type_options)){
                                            foreach($type_options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = $this->set_field_selected('type', $value, "");
                                            ?>
                                            <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                            </option>                                   
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
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
                                    <label class="control-label" for="subject">Subject <span class="text-danger">*</span></label>
                                    <div id="ctrl-subject-holder" class=""> 
                                        <select required=""  id="ctrl-subject" name="subject"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php 
                                            $subject_options = $comp_model -> reports_dataset_subject_option_list();
                                            if(!empty($subject_options)){
                                            foreach($subject_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('subject',$value, "");
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                            </option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                    <div id="ctrl-faculty-holder" class=""> 
                                        <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php 
                                            $faculty_options = $comp_model -> reports_dataset_faculty_option_list();
                                            if(!empty($faculty_options)){
                                            foreach($faculty_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('faculty',$value, "");
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                            </option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="year_published">Year Published <span class="text-danger">*</span></label>
                                    <div id="ctrl-year_published-holder" class=""> 
                                        <input id="ctrl-year_published"  value="<?php  echo $this->set_field_value('year_published',""); ?>" type="text" placeholder="Enter Year Published"  required="" name="year_published"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                                        <div id="ctrl-description-holder" class=""> 
                                            <textarea placeholder="Enter Description" id="ctrl-description"  required="" rows="12" name="description" class=" form-control"><?php  echo $this->set_field_value('description',""); ?></textarea>
                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="file">Upload File </label>
                                        <div id="ctrl-file-holder" class=""> 
                                            <div class="dropzone " input="#ctrl-file" fieldname="file"    data-multiple="true" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="210" maximum="5">
                                                <input name="file" id="ctrl-file" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('file',""); ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                            <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                <div class="">- The file format can be any extention or format.</div>
                                                <div class="">- Maximum: 5 file allowed.</div>
                                                <div class="">- Maximum file size of 200 MB.</div>
                                            </small> -->
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
                                    $('#reports_dataset-add-form fieldset').addClass('border-gold border texture-gold p-3 card ')
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