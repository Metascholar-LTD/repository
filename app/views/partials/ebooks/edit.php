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
                        <h3 class="record-title">Modify eBook / Book Chapter</h3>
                        <!-- <div class="small"><mark>RECORD ID: <?=$data['ctrl']?></mark></div> -->
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("ebooks/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="type">Type </label>
                                    <div id="ctrl-type-holder" class=""> 
                                        <select  id="ctrl-type" name="type"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $type_options = Menu :: $type;
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
                                    <label class="control-label" for="year_published">Year Published <span class="text-danger">*</span></label>
                                    <div id="ctrl-year_published-holder" class=""> 
                                        <input id="ctrl-year_published"  value="<?php  echo $data['year_published']; ?>" type="text" placeholder="Enter Year Published"  required="" name="year_published"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="edition">Edition </label>
                                        <div id="ctrl-edition-holder" class=""> 
                                            <input id="ctrl-edition"  value="<?php  echo $data['edition']; ?>" type="text" placeholder="Enter Edition"  name="edition"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                            <div id="ctrl-faculty-holder" class=""> 
                                                <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                    $rec = $data['faculty'];
                                                    $faculty_options = $comp_model -> ebooks_faculty_option_list();
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
                                            <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                                            <div id="ctrl-description-holder" class=""> 
                                                <textarea placeholder="Enter Description" id="ctrl-description"  required="" rows="5" name="description" class=" form-control"><?php  echo $data['description']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                        <fieldset><legend><h4 class="font2 bold"> Document</h4> <div><hr class="border-gold"/></div></legend>
                                            <div class="form-group ">
                                                <label class="control-label" for="file_url">File External Source Url </label>
                                                <div id="ctrl-file_url-holder" class=""> 
                                                    <input id="ctrl-file_url"  value="<?php  echo $data['file_url']; ?>" type="url" placeholder="Enter File External Source Url"  name="file_url"  class="form-control " />
                                                    </div>
                                                </div>
                                                <input id="ctrl-ctrl"  value="<?php  echo $data['ctrl']; ?>" type="hidden" placeholder="Enter Ctrl"  required="" name="ctrl"  class="form-control " />
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