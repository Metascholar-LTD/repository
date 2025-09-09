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
                        <h3 class="record-title">Upload Research Article</h3>
                    </div></div>
                    <?php $this :: display_page_errors(); ?>
                    <div  class="ui-form animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("research_article/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div id="ctrl-title-holder" class=""> 
                                        <textarea placeholder="Enter Title" id="ctrl-title"  required="" rows="2" name="title" class=" form-control"><?php  echo $data['title']; ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="authors">Authors <div class="small">Names of authors involved in the document</div> <span class="text-danger">*</span></label>
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
                                    <label class="control-label" for="faculty">Faculty <span class="text-danger">*</span></label>
                                    <div id="ctrl-faculty-holder" class=""> 
                                        <select required=""  id="ctrl-faculty" name="faculty"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $rec = $data['faculty'];
                                            $faculty_options = $comp_model -> research_article_faculty_option_list();
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
                                    <label class="control-label" for="subject">Subject <span class="text-danger">*</span></label>
                                    <div id="ctrl-subject-holder" class=""> 
                                        <select required=""  id="ctrl-subject" name="subject"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                            $rec = $data['subject'];
                                            $subject_options = $comp_model -> research_article_subject_option_list();
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
                                    <label class="control-label" for="keywords">Keywords <span class="text-danger">*</span></label>
                                    <div id="ctrl-keywords-holder" class=""> 
                                        <input id="ctrl-keywords"  value="<?php  echo $data['keywords']; ?>" type="text" placeholder="Enter Keywords"  required="" name="keywords"  class="form-control " />
                                        </div>
                                        <!-- <small class="form-text"><div class="text-red bold">- ℹ️ Guidance:</div>
                                            <div class="">- Separate multiple keywords with commas ",".</div>
                                        <div class="">- Example1: "Malaria, Technology, pneumonia, Health".</div></small> -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-auto">
                                            <label class="control-label" for="year_of_publication">Year Of Publication <span class="text-danger">*</span></label>
                                            <div id="ctrl-year_of_publication-holder" class=""> 
                                                <input id="ctrl-year_of_publication"  value="<?php  echo $data['year_of_publication']; ?>" type="text" placeholder="Enter Year Of Publication"  required="" name="year_of_publication"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group col">
                                                <label class="control-label" for="country_of_publication">Country Of Publication <span class="text-danger">*</span></label>
                                                <div id="ctrl-country_of_publication-holder" class=""> 
                                                    <select required=""  id="ctrl-country_of_publication" name="country_of_publication"  placeholder="Select a value ..."    class="custom-select" >
                                                        <option value="">Select a value ...</option>
                                                        <?php
                                                        $country_of_publication_options = Menu :: $country_of_publication;
                                                        $field_value = $data['country_of_publication'];
                                                        if(!empty($country_of_publication_options)){
                                                        foreach($country_of_publication_options as $option){
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
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="journal_name">Journal Name <span class="text-danger">*</span></label>
                                            <div id="ctrl-journal_name-holder" class=""> 
                                                <input id="ctrl-journal_name"  value="<?php  echo $data['journal_name']; ?>" type="text" placeholder="Enter Journal Name"  required="" name="journal_name"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-auto">
                                                    <label class="control-label" for="doi_issn">DOI or ISSN <span class="text-danger">*</span></label>
                                                    <div id="ctrl-doi_issn-holder" class=""> 
                                                        <input id="ctrl-doi_issn"  value="<?php  echo $data['doi_issn']; ?>" type="text" placeholder="Enter DOI or ISSN"  required="" name="doi_issn"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-auto">
                                                        <label class="control-label" for="volume">Volume <span class="text-danger">*</span></label>
                                                        <div id="ctrl-volume-holder" class=""> 
                                                            <input id="ctrl-volume"  value="<?php  echo $data['volume']; ?>" type="text" placeholder="Enter Volume"  required="" name="volume"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="abstract">Abstract <span class="text-danger">*</span></label>
                                                        <div id="ctrl-abstract-holder" class=""> 
                                                            <textarea placeholder="Enter Abstract" id="ctrl-abstract"  required="" rows="5" name="abstract" class=" form-control"><?php  echo $data['abstract']; ?></textarea>
                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                        </div>
                                                    </div>
                                                    <fieldset><legend><h4 class="font2 bold">Research Document</h4> </legend>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="source_url">Source Url <span class="text-danger">*</span></label>
                                                            <div id="ctrl-source_url-holder" class=""> 
                                                                <input id="ctrl-source_url"  value="<?php  echo $data['source_url']; ?>" type="text" placeholder="Enter Source Url"  required="" name="source_url"  class="form-control " />
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
                                                        $('#research_article-add-form fieldset').addClass('border-gold border texture-gold p-3 card ')
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