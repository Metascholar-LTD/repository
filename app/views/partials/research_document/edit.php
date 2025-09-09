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
                <div class="col-md-10 p-5 shadow-sm border comp-grid curve form-bg">
                    <div class=""><div class="text-center p-3">
                        <h3 class="record-title">Modify Research Document</h3>
                        <!-- <div class="small"><mark>RECORD ID: <?=$data['ctrl']?></mark></div> -->
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("research_document/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="3" name="title" class=" form-control"><?php  echo $data['title']; ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="authors">Authors </label>
                                    <div id="ctrl-authors-holder" class=""> 
                                        <textarea placeholder="Enter Authors " id="ctrl-authors"  required="" rows="3" name="authors" class=" form-control"><?php  echo $data['authors']; ?></textarea>
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
                                            $field_value = $data['degree'];
                                            if(!empty($degree_options)){
                                            foreach($degree_options as $option){
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
                                    <label class="control-label" for="subjects">Subjects <span class="text-danger">*</span></label>
                                    <div id="ctrl-subjects-holder" class=""> 
                                        <select required=""  id="ctrl-subjects" name="subjects"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $rec = $data['subjects'];
                                            $subjects_options = $comp_model -> research_document_subjects_option_list();
                                            if(!empty($subjects_options)){
                                            foreach($subjects_options as $option){
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
                                <div class="row">
                                    <div class="form-group col-auto">
                                        <label class="control-label" for="issues_date">Issues Date <span class="text-danger">*</span></label>
                                        <div id="ctrl-issues_date-holder" class=""> 
                                            <input id="ctrl-issues_date" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['issues_date']; ?>" type="datetime" name="issues_date" placeholder="Enter Issues Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                                $faculty_options = $comp_model -> research_document_faculty_option_list();
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
                                                $program_options = $comp_model -> research_document_program_option_list();
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
                                    <div class="form-group ">
                                        <label class="control-label" for="abstract">Abstract <span class="text-danger">*</span></label>
                                        <div id="ctrl-abstract-holder" class=""> 
                                            <textarea placeholder="Enter Abstract" id="ctrl-abstract"  required="" rows="10" name="abstract" class=" form-control"><?php  echo $data['abstract']; ?></textarea>
                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                        </div>
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