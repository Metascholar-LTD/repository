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
                        <h3 class="record-title">Modify Past Question</h3>
                        <!-- <div class="small"><mark>RECORD ID: <?=$data['ctrl']?></mark></div> -->
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("past_questions/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="course_code">Course Code <span class="text-danger">*</span></label>
                                    <div id="ctrl-course_code-holder" class=""> 
                                        <input id="ctrl-course_code"  value="<?php  echo $data['course_code']; ?>" type="text" placeholder="Enter Course Code"  required="" name="course_code"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="course_title">Course Title <span class="text-danger">*</span></label>
                                        <div id="ctrl-course_title-holder" class=""> 
                                            <input id="ctrl-course_title"  value="<?php  echo $data['course_title']; ?>" type="text" placeholder="Enter Course Title"  required="" name="course_title"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="control-label" for="academic_year">Year <span class="text-danger">*</span></label>
                                                <div id="ctrl-academic_year-holder" class=""> 
                                                    <input id="ctrl-academic_year"  value="<?php  echo $data['academic_year']; ?>" type="text" placeholder="Enter Year"  required="" name="academic_year"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label class="control-label" for="academic_session">Semester <span class="text-danger">*</span></label>
                                                    <div id="ctrl-academic_session-holder" class=""> 
                                                        <input id="ctrl-academic_session"  value="<?php  echo $data['academic_session']; ?>" type="text" placeholder="Enter Semester"  required="" name="academic_session"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                                    <div id="ctrl-faculty-holder" class=""> 
                                                        <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $rec = $data['faculty'];
                                                            $faculty_options = $comp_model -> past_questions_faculty_option_list();
                                                            if(!empty($faculty_options)){
                                                            foreach($faculty_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = ( $value == $rec ? 'selected' : null );
                                                            ?>
                                                            <option 
                                                                <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
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
                                                            $rec = $data['program'];
                                                            $program_options = $comp_model -> past_questions_program_option_list();
                                                            if(!empty($program_options)){
                                                            foreach($program_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = ( $value == $rec ? 'selected' : null );
                                                            ?>
                                                            <option 
                                                                <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input id="ctrl-ctrl"  value="<?php  echo $data['ctrl']; ?>" type="hidden" placeholder="Enter Ctrl"  required="" name="ctrl"  class="form-control " />
                                                    <fieldset><legend><h4 class="font2 bold">Past Question File</h4> <div></div></legend>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="file">Upload Past Question <span class="text-danger">*</span></label>
                                                            <div id="ctrl-file-holder" class=""> 
                                                                <div class="dropzone required" input="#ctrl-file" fieldname="file"    data-multiple="true" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="30" maximum="7">
                                                                    <input name="file" id="ctrl-file" required="" class="dropzone-input form-control" value="<?php  echo $data['file']; ?>" type="text"  />
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                <?php Html :: uploaded_files_list($data['file'], '#ctrl-file'); ?>
                                                                <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                                    <div class="">- Ensure the file format is either PDF, DOC, DOCX, JPEG, JPG, CSV.</div>
                                                                    <div class="">- Maximum: 7 PDF file allowed.</div>
                                                               </small> -->
                                                            </div>
                                                        </fieldset>
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