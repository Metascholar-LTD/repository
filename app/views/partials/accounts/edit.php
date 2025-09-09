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
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 text-center">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Accounts</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 p-5 shadow-sm border curve comp-grid form-bg">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("accounts/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="img">Img </label>
                                    <div id="ctrl-img-holder" class=""> 
                                        <div class="dropzone " input="#ctrl-img" fieldname="img"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="30" maximum="1">
                                            <input name="img" id="ctrl-img" class="dropzone-input form-control" value="<?php  echo $data['img']; ?>" type="text"  />
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                            </div>
                                        </div>
                                        <?php Html :: uploaded_files_list($data['img'], '#ctrl-img'); ?>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="role">Role <span class="text-danger">*</span></label>
                                        <div id="ctrl-role-holder" class=""> 
                                            <select required=""  id="ctrl-role" name="role"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php
                                                $role_options = Menu :: $role;
                                                $field_value = $data['role'];
                                                if(!empty($role_options)){
                                                foreach($role_options as $option){
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
                                        <label class="control-label" for="regnum">Regnum <span class="text-danger">*</span></label>
                                        <div id="ctrl-regnum-holder" class=""> 
                                            <input id="ctrl-regnum"  value="<?php  echo $data['regnum']; ?>" type="text" placeholder="Enter Regnum"  required="" name="regnum"  data-url="api/json/accounts_regnum_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                <div class="check-status"></div> 
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="fullname">Fullname <span class="text-danger">*</span></label>
                                            <div id="ctrl-fullname-holder" class=""> 
                                                <textarea placeholder="Enter Fullname" id="ctrl-fullname"  required="" rows="2" name="fullname" class=" form-control"><?php  echo $data['fullname']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                            <div id="ctrl-faculty-holder" class=""> 
                                                <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                    $rec = $data['faculty'];
                                                    $faculty_options = $comp_model -> accounts_faculty_option_list();
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
                                                    $program_options = $comp_model -> accounts_program_option_list();
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
                                            <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                            <div id="ctrl-phone-holder" class=""> 
                                                <input id="ctrl-phone"  value="<?php  echo $data['phone']; ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  class="form-control " />
                                                </div>
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