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
                <div class="col-md-10 p-5 shadow-sm border comp-grid curve form-bg">
                    <div class="">
                        <div class="text-center p-3">
                        <h3 class="title">Upload Research Document</h3>
                        <div class="small">Theses & Dissertation</div>
                        </div>
                    </div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form id="research_document-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("research_document/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="3" name="title" class=" form-control"><?php  echo $this->set_field_value('title',""); ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="authors">Authors </label>
                                    <div id="ctrl-authors-holder" class=""> 
                                        <textarea placeholder="Enter Authors " id="ctrl-authors"  required="" rows="3" name="authors" class=" form-control"><?php  echo $this->set_field_value('authors',""); ?></textarea>
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
                                    <label class="control-label" for="degree">Degree <span class="text-danger">*</span></label>
                                    <div id="ctrl-degree-holder" class=""> 
                                        <select required=""  id="ctrl-degree" name="degree"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $degree_options = Menu :: $degree;
                                            if(!empty($degree_options)){
                                            foreach($degree_options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = $this->set_field_selected('degree', $value, "");
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
                                    <label class="control-label" for="subjects">Subjects <span class="text-danger">*</span></label>
                                    <div id="ctrl-subjects-holder" class=""> 
                                        <select required=""  id="ctrl-subjects" name="subjects"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php 
                                            $subjects_options = $comp_model -> research_document_subjects_option_list();
                                            if(!empty($subjects_options)){
                                            foreach($subjects_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('subjects',$value, "");
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
                                <div class="row">
                                    <div class="form-group col-auto">
                                        <label class="control-label" for="issues_date">Issues Date <span class="text-danger">*</span></label>
                                        <div id="ctrl-issues_date-holder" class=""> 
                                            <input id="ctrl-issues_date" class="form-control datepicker" required="" value="<?php  echo $this->set_field_value('issues_date',""); ?>" type="datetime" name="issues_date" placeholder="Enter Issues Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                        <div id="ctrl-faculty-holder" class=""> 
                                            <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                $faculty_options = $comp_model -> research_document_faculty_option_list();
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
                                        <label class="control-label" for="program">Programme <span class="text-danger">*</span></label>
                                        <div id="ctrl-program-holder" class=""> 
                                            <select required=""  id="ctrl-program" name="program"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                $program_options = $comp_model -> research_document_program_option_list();
                                                if(!empty($program_options)){
                                                foreach($program_options as $option){
                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                $selected = $this->set_field_selected('program',$value, "");
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
                                        <label class="control-label" for="abstract">Abstract <span class="text-danger">*</span></label>
                                        <div id="ctrl-abstract-holder" class=""> 
                                            <textarea placeholder="Enter Abstract" id="ctrl-abstract"  required="" rows="10" name="abstract" class=" form-control"><?php  echo $this->set_field_value('abstract',""); ?></textarea>
                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                        </div>
                                    </div>
                                    <fieldset>
                                        <legend><h4 class="font2 bold">Research Document</h4> <div></div></legend>
                                        <div class="form-group">
                                            <label class="control-label" for="file">Upload Document <span class="text-danger">*</span></label>
                                            <div id="ctrl-file-holder" class=""> 
                                                <div class="dropzone required" input="#ctrl-file" fieldname="file"    data-multiple="false" dropmsg="Choose files or drag and drop to upload (PDF only)"    btntext="Browse" filesize="300" maximum="1">
                                                    <input name="file" id="ctrl-file" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('file',""); ?>" type="text"  />
                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                    </div>
                                                </div>
                                                <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                    <div class="">- Ensure the file format is PDF.</div>
                                                    <div class="">- Maximum: 1 PDF file allowed.</div>
                                                <hr class=""/></small> -->
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="thumbs">Thumbs (Automated)</label>
                                                <div id="ctrl-thumbs-holder" class=""> 
                                                    <div class="dropzone required" input="#ctrl-thumbs" fieldname="thumbs"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="100" maximum="1">
                                                        <input name="thumbs" id="ctrl-thumbs" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('thumbs',""); ?>" type="text"  />
                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                        <div class="">- Please wait for the thumbs to upload completely.</div>
                                                        <div class="">- Thumbnails are automatically generated from the uploaded PDF.</div>
                                                    <div class="">- Thumbnails represent 1st pages of the PDF file.</div></small> -->
                                                </div>
                                            </fieldset>
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
                                        $('#research_document-add-form fieldset').addClass('border p-3 card ')
                                        $('#research_document-add-form [input="#ctrl-file"]').attr('extensions',".pdf");
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
    #research_document-add-form,.title, .small{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
    }
</style>