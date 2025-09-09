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
    <div  class="bg-light p-3 mb-3 text-center">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Team Member</h4>
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
                <div class="col-md-7 comp-grid card shadow-lg">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form id="team-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("team/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="img">Img <span class="text-danger">*</span></label>
                                    <div id="ctrl-img-holder" class=""> 
                                        <div class="dropzone required" input="#ctrl-img" fieldname="img"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="30" maximum="1">
                                            <input name="img" id="ctrl-img" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('img',""); ?>" type="text"  />
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                        <div id="ctrl-name-holder" class=""> 
                                            <input id="ctrl-name"  value="<?php  echo $this->set_field_value('name',""); ?>" type="text" placeholder="Enter Name"  required="" name="name"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                            <div id="ctrl-status-holder" class=""> 
                                                <input id="ctrl-status"  value="<?php  echo $this->set_field_value('status',""); ?>" type="text" placeholder="Enter Status"  required="" name="status"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="affiliation">Affiliation </label>
                                                <div id="ctrl-affiliation-holder" class=""> 
                                                    <input id="ctrl-affiliation"  value="<?php  echo $this->set_field_value('affiliation',""); ?>" type="text" placeholder="Enter Affiliation"  name="affiliation"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="country">Country </label>
                                                    <div id="ctrl-country-holder" class=""> 
                                                        <select  id="ctrl-country" name="country"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $country_options = Menu :: $country_of_publication;
                                                            if(!empty($country_options)){
                                                            foreach($country_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('country', $value, "");
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
                                                    <label class="control-label" for="profile_link">Profile Link </label>
                                                    <div id="ctrl-profile_link-holder" class=""> 
                                                        <input id="ctrl-profile_link"  value="<?php  echo $this->set_field_value('profile_link',""); ?>" type="url" placeholder="Enter Profile Link"  name="profile_link"  class="form-control " />
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
