<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>" style="padding-top:50px;background-color:#F0F4F9 !important;">
    <div  class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 p-5 border comp-grid shadow-lg curve" style="background-color: #ffffff !important;">
                <?php
                    if( $show_header == true ){
                    ?>
                    <div  class="p-3 mb-3 text-center">
                        <div class="container">
                            <div class="row ">
                                <div class="col-12 text-center">
                                    <h4 class="record-title">Create an Account</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    <?php $this :: display_page_errors(); ?>

                    <div  class="ui-form animated fadeIn page-content">
                        <form id="accounts-userregister-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("index/register?csrf_token=$csrf_token") ?>" method="post">
                            <!--[main-form-start]-->
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="img">Profile Cover Picture </label>
                                    <div id="ctrl-img-holder" class=""> 
                                        <div class="dropzone " input="#ctrl-img" fieldname="img"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="39" maximum="1">
                                            <input name="img" id="ctrl-img" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('img',""); ?>" type="text"  />
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="regnum">Identity Number <span class="text-danger">*</span></label>
                                        <div id="ctrl-regnum-holder" class=""> 
                                            <input id="ctrl-regnum"  value="<?php  echo $this->set_field_value('regnum',""); ?>" type="text" placeholder="Enter Your Identity Number"  required="" name="regnum"  data-url="api/json/accounts_regnum_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                <div class="check-status"></div> 
                                            </div>
                                            <small class="form-text"><div class="">For A Staff: Please Provide a Unique Identification Number</div>
                                            <div class="">For Student: Please Provide your registration Number</div></small>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="fullname">Fullname <span class="text-danger">*</span></label>
                                            <div id="ctrl-fullname-holder" class=""> 
                                                <input type="text" placeholder="Enter Fullname" id="ctrl-fullname"  required="" rows="2" name="fullname" class=" form-control" value="<?php  echo $this->set_field_value('fullname',""); ?>"/>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                            <div id="ctrl-faculty-holder" class=""> 
                                                <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php 
                                                    $faculty_options = $comp_model -> accounts_faculty_option_list();
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
                                                    $program_options = $comp_model -> accounts_program_option_list();
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
                                            <label class="control-label" for="email">E-mail <span class="text-danger">*</span></label>
                                            <div id="ctrl-email-holder" class=""> 
                                                <input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',""); ?>" type="email" placeholder="Enter Your E-mail Address"  required="" name="email"  data-url="api/json/accounts_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                    <div class="check-status"></div> 
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                                <div id="ctrl-phone-holder" class=""> 
                                                    <input id="ctrl-phone"  value="<?php  echo $this->set_field_value('phone',""); ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                                    <div id="ctrl-password-holder" class="input-group"> 
                                                        <input id="ctrl-password"  value="<?php  echo $this->set_field_value('password',""); ?>" type="password" placeholder="Enter Password"  required="" name="password"  class="form-control  password password-strength" />
                                                            <div class="input-group-append cursor-pointer btn-toggle-password">
                                                                <span class="input-group-text input-icon"><i class="fa fa-eye"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="password-strength-msg">
                                                            <small class="font-weight-bold">Should contain</small>
                                                            <small class="length chip">6 Characters minimum</small>
                                                            <small class="caps chip">Capital Letter</small>
                                                            <small class="number chip">Number</small>
                                                            <small class="special chip">Symbol</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                                        <div id="ctrl-confirm_password-holder" class="input-group"> 
                                                            <input id="ctrl-password-confirm" data-match="#ctrl-password"  class="form-control password-confirm " type="password" name="confirm_password" required placeholder="Confirm Password" />
                                                            <div class="input-group-append cursor-pointer btn-toggle-password">
                                                                <span class="input-group-text input-icon"><i class="fa fa-eye"></i></span>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Password does not match
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--[main-form-end]-->
                                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                                    <button class="btn btn-primary mx-auto" type="submit">
                                                        Submit
                                                        <i class="fa fa-send"></i>
                                                    </button>
                                                    <div class="text-center mt-2">
                                                        Already have an account?  <a class="" style="font-weight:bolder;font-size:19px;color:#004C23;" href="<?php print_link('home') ?>"> Login</a>
                                                    </div>
                                                </div>
                                                    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
<style>
    .input-icon{
        background-color:#ffffff !important;"
    }
    .curve{
        border-radius: 20px;
    }
</style>                