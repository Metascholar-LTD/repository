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
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-12 p-3 ">
                    <h4 class="record-title">Add New Tags</h4>
                </div>
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form id="tags-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("tags/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <input id="ctrl-title"  value="<?php  echo $this->set_field_value('title',""); ?>" type="text" placeholder="Enter Title"  required="" name="title"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="role">Role <span class="text-danger">*</span></label>
                                        <div id="ctrl-role-holder" class=""> 
                                            <select required=""  id="ctrl-role" name="role"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php
                                                $role_options = Menu :: $role2;
                                                if(!empty($role_options)){
                                                foreach($role_options as $option){
                                                $value = $option['value'];
                                                $label = $option['label'];
                                                $selected = $this->set_field_selected('role', $value, "");
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
