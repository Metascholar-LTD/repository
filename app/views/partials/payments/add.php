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
                    <h4 class="record-title">Add New Payments</h4>
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
                        <form id="payments-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("payments/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="amount">Amount <span class="text-danger">*</span></label>
                                    <div id="ctrl-amount-holder" class=""> 
                                        <input id="ctrl-amount"  value="<?php  echo $this->set_field_value('amount',""); ?>" type="text" placeholder="Enter Amount"  required="" name="amount"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                        <div id="ctrl-status-holder" class=""> 
                                            <input id="ctrl-status"  value="<?php  echo $this->set_field_value('status',""); ?>" type="text" placeholder="Enter Status"  required="" name="status"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="datein">Datein <span class="text-danger">*</span></label>
                                            <div id="ctrl-datein-holder" class="input-group"> 
                                                <input id="ctrl-datein" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('datein',""); ?>" type="datetime"  name="datein" placeholder="Enter Datein" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
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
                                                    <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                                                    <div id="ctrl-description-holder" class=""> 
                                                        <textarea placeholder="Enter Description" id="ctrl-description"  required="" rows="5" name="description" class=" form-control"><?php  echo $this->set_field_value('description',""); ?></textarea>
                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
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
