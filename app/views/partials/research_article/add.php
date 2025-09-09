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
    <div  class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 p-5 shadow-lg border comp-grid curve form-bg">
                    <div class=""><div class="text-center p-3">
                        <h3 class="record-title">Upload Research Article</h3>
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form id="research_article-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("research_article/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="2" name="title" class=" form-control"><?php  echo $this->set_field_value('title',""); ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="authors">Authors </label>
                                    <div id="ctrl-authors-holder" class=""> 
                                        <textarea placeholder="Enter Authors" id="ctrl-authors"  required="" rows="2" name="authors" class=" form-control"><?php  echo $this->set_field_value('authors',""); ?></textarea>
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
                                    <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                    <div id="ctrl-faculty-holder" class=""> 
                                        <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php 
                                            $faculty_options = $comp_model -> research_article_faculty_option_list();
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
                                    <label class="control-label" for="subject">Subject <span class="text-danger">*</span></label>
                                    <div id="ctrl-subject-holder" class=""> 
                                        <select required=""  id="ctrl-subject" name="subject"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php 
                                            $subject_options = $comp_model -> research_article_subject_option_list();
                                            if(!empty($subject_options)){
                                            foreach($subject_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('subject',$value, "");
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
                                    <label class="control-label" for="keywords">Keywords <span class="text-danger">*</span></label>
                                    <div id="ctrl-keywords-holder" class=""> 
                                        <input id="ctrl-keywords"  value="<?php  echo $this->set_field_value('keywords',""); ?>" type="text" placeholder="Enter Keywords"  required="" name="keywords"  class="form-control " />
                                        </div>
                                        <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                            <div class="">- Separate multiple keywords with commas ",".</div>
                                        <div class="">- Example1: "Malaria, Technology, pneumonia, Health".</div></small> -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-auto">
                                            <label class="control-label" for="year_of_publication">Year Of Publication <span class="text-danger">*</span></label>
                                            <div id="ctrl-year_of_publication-holder" class=""> 
                                                <input id="ctrl-year_of_publication"  value="<?php  echo $this->set_field_value('year_of_publication',""); ?>" type="text" placeholder="Enter Year Of Publication"  required="" name="year_of_publication"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group col">
                                                <label class="control-label" for="country_of_publication">Country Of Publication <span class="text-danger">*</span></label>
                                                <div id="ctrl-country_of_publication-holder" class=""> 
                                                    <select required=""  id="ctrl-country_of_publication" name="country_of_publication"  placeholder="Select a value ..."    class="custom-select" >
                                                        <option value="">Select a value ...</option>
                                                        <?php
                                                        $country_of_publication_options = Menu :: $country_of_publication;
                                                        if(!empty($country_of_publication_options)){
                                                        foreach($country_of_publication_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        $selected = $this->set_field_selected('country_of_publication', $value, "");
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
                                        <div class="form-group ">
                                            <label class="control-label" for="journal_name">Journal Name <span class="text-danger">*</span></label>
                                            <div id="ctrl-journal_name-holder" class=""> 
                                                <input id="ctrl-journal_name"  value="<?php  echo $this->set_field_value('journal_name',""); ?>" type="text" placeholder="Enter Journal Name"  required="" name="journal_name"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-auto">
                                                    <label class="control-label" for="doi_issn">DOI or ISSN <span class="text-danger">*</span></label>
                                                    <div id="ctrl-doi_issn-holder" class=""> 
                                                        <input id="ctrl-doi_issn"  value="<?php  echo $this->set_field_value('doi_issn',""); ?>" type="text" placeholder="Enter DOI or ISSN"  required="" name="doi_issn"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-auto">
                                                        <label class="control-label" for="volume">Volume <span class="text-danger">*</span></label>
                                                        <div id="ctrl-volume-holder" class=""> 
                                                            <input id="ctrl-volume"  value="<?php  echo $this->set_field_value('volume',""); ?>" type="text" placeholder="Enter Volume"  required="" name="volume"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="abstract">Abstract <span class="text-danger">*</span></label>
                                                        <div id="ctrl-abstract-holder" class=""> 
                                                            <textarea placeholder="Enter Abstract" id="ctrl-abstract"  required="" rows="5" name="abstract" class=" form-control"><?php  echo $this->set_field_value('abstract',""); ?></textarea>
                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                        </div>
                                                    </div>
                                                    <fieldset>
                                                        <legend><h4 class="font2 bold">Research Document</h4><div></div></legend>
                                                        <div class="form-group">
                                                            <label class="control-label" for="source_url">Source Url <span class="text-danger">*</span></label>
                                                            <div id="ctrl-source_url-holder" class=""> 
                                                                <input id="ctrl-source_url"  value="<?php  echo $this->set_field_value('source_url',""); ?>" type="text" placeholder="Enter Source Url"  required="" name="source_url"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="file">Upload Document <span class="text-danger">*</span></label>
                                                                <div id="ctrl-file-holder" class=""> 
                                                                    <div class="dropzone required" input="#ctrl-file" fieldname="file"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="30" maximum="1">
                                                                        <input name="file" id="ctrl-file" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('file',""); ?>" type="text"  />
                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                                        <div class="">- Ensure the file format is PDF.</div>
                                                                        <div class="">- Maximum: 1 PDF file allowed.</div>
                                                                    </small> -->
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="thumbs">Thumbs (Automated)</label>
                                                                    <div id="ctrl-thumbs-holder" class=""> 
                                                                        <div class="dropzone required" input="#ctrl-thumbs" fieldname="thumbs"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="10" maximum="1">
                                                                            <input name="thumbs" id="ctrl-thumbs" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('thumbs',""); ?>" type="text"  />
                                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                                                            <div class="">- Please wait for the thumbs to upload completely.</div>
                                                                            <div class="">- Thumbnails are automatically generated from the uploaded PDF.</div>
                                                                        <div class="">- Thumbnails represent 1st pages of the PDF file.</div></small> -->
                                                                    </div>
                                                                </fieldset>
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
                                                    <div class="">
                                                        <script>
                                                            $(document).ready(function(){
                                                            initPdfBuilder();
                                                            $('#research_article-add-form fieldset').addClass('border p-3 card ');
                                                            $('#research_article-add-form [input="#ctrl-file"]').attr('extensions',".pdf");
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