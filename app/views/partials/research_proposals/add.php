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
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Research Proposals</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="research_proposals-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("research_proposals/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="5" name="title" class=" form-control"><?php  echo $this->set_field_value('title',""); ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="community">Community <span class="text-danger">*</span></label>
                                    <div id="ctrl-community-holder" class=""> 
                                        <input id="ctrl-community"  value="<?php  echo $this->set_field_value('community',""); ?>" type="text" placeholder="Enter Community"  required="" name="community"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="subjects">Subjects <span class="text-danger">*</span></label>
                                        <div id="ctrl-subjects-holder" class=""> 
                                            <input id="ctrl-subjects"  value="<?php  echo $this->set_field_value('subjects',""); ?>" type="text" placeholder="Enter Subjects"  required="" name="subjects"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="format">Format <span class="text-danger">*</span></label>
                                            <div id="ctrl-format-holder" class=""> 
                                                <input id="ctrl-format"  value="<?php  echo $this->set_field_value('format',""); ?>" type="text" placeholder="Enter Format"  required="" name="format"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="size">Size <span class="text-danger">*</span></label>
                                                <div id="ctrl-size-holder" class=""> 
                                                    <input id="ctrl-size"  value="<?php  echo $this->set_field_value('size',""); ?>" type="text" placeholder="Enter Size"  required="" name="size"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="file">File <span class="text-danger">*</span></label>
                                                    <div id="ctrl-file-holder" class=""> 
                                                        <textarea placeholder="Enter File" id="ctrl-file"  required="" rows="5" name="file" class=" form-control"><?php  echo $this->set_field_value('file',""); ?></textarea>
                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="lastupdate">Lastupdate <span class="text-danger">*</span></label>
                                                    <div id="ctrl-lastupdate-holder" class="input-group"> 
                                                        <input id="ctrl-lastupdate" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('lastupdate',""); ?>" type="datetime"  name="lastupdate" placeholder="Enter Lastupdate" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="session_id">Session Id <span class="text-danger">*</span></label>
                                                        <div id="ctrl-session_id-holder" class=""> 
                                                            <input id="ctrl-session_id"  value="<?php  echo $this->set_field_value('session_id',""); ?>" type="text" placeholder="Enter Session Id"  required="" name="session_id"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                                            <div id="ctrl-status-holder" class=""> 
                                                                <input id="ctrl-status"  value="<?php  echo $this->set_field_value('status',""); ?>" type="text" placeholder="Enter Status"  required="" name="status"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="ctrl">Ctrl <span class="text-danger">*</span></label>
                                                                <div id="ctrl-ctrl-holder" class=""> 
                                                                    <input id="ctrl-ctrl"  value="<?php  echo $this->set_field_value('ctrl',""); ?>" type="text" placeholder="Enter Ctrl"  required="" name="ctrl"  class="form-control " />
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
