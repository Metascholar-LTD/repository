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
                        <h3 class="record-title">Modify Report / Dataset</h3>
                        <!-- <div class="small"><mark>RECORD ID: <?=$data['ctrl']?></mark></div> -->
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("reports_dataset/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="type">Type <span class="text-danger">*</span></label>
                                    <div id="ctrl-type-holder" class=""> 
                                        <select required=""  id="ctrl-type" name="type"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $type_options = Menu :: $type2;
                                            $field_value = $data['type'];
                                            if(!empty($type_options)){
                                            foreach($type_options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = ( $value == $field_value ? 'selected' : null );
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
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="2" name="title" class=" form-control"><?php  echo $data['title']; ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="authors">Authors <span class="text-danger">*</span></label>
                                    <div id="ctrl-authors-holder" class=""> 
                                        <textarea placeholder="Enter Authors" id="ctrl-authors"  required="" rows="2" name="authors" class=" form-control"><?php  echo $data['authors']; ?></textarea>
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
                                            $rec = $data['subject'];
                                            $subject_options = $comp_model -> reports_dataset_subject_option_list();
                                            if(!empty($subject_options)){
                                            foreach($subject_options as $option){
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
                                    <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                    <div id="ctrl-faculty-holder" class=""> 
                                        <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $rec = $data['faculty'];
                                            $faculty_options = $comp_model -> reports_dataset_faculty_option_list();
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
                                    <label class="control-label" for="year_published">Year Published <span class="text-danger">*</span></label>
                                    <div id="ctrl-year_published-holder" class=""> 
                                        <input id="ctrl-year_published"  value="<?php  echo $data['year_published']; ?>" type="text" placeholder="Enter Year Published"  required="" name="year_published"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                                        <div id="ctrl-description-holder" class=""> 
                                            <textarea placeholder="Enter Description" id="ctrl-description"  required="" rows="12" name="description" class=" form-control"><?php  echo $data['description']; ?></textarea>
                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="file">Upload File </label>
                                        <div id="ctrl-file-holder" class=""> 
                                            <div class="dropzone " input="#ctrl-file" fieldname="file"    data-multiple="true" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="210" maximum="5">
                                                <input name="file" id="ctrl-file" class="dropzone-input form-control" value="<?php  echo $data['file']; ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                            <?php Html :: uploaded_files_list($data['file'], '#ctrl-file'); ?>
                                            <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                <div class="">- The file format can be any extention or format.</div>
                                                <div class="">- Maximum: 5 file allowed.</div>
                                                <div class="">- Maximum file size of 200 MB.</div>
                                            </small> -->
                                        </div>
                                        <input id="ctrl-ctrl"  value="<?php  echo $data['ctrl']; ?>" type="hidden" placeholder="Enter Ctrl"  required="" name="ctrl"  class="form-control " />
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