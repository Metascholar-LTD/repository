<div class="tab-pane active" id="newCourseForm1">
    <!-- host -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-host">School or Host</label>
        <div class="input-lable">
            <input class="form-control" id="ctrl-host" name="school" placeholder="Enter the school or host title for this course" value="<?= $this->set_field_value('school');?>" required>
        </div>
        <div class="">
            <small>E.g JAMB NG. / University of Ghana Legon. / Medical & Dental Council Ghana</small>
        </div>
    </div>
    <!-- program -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-program">Course program</label>
        <div class="input-lable">
            <select required=""  id="ctrl-program" name="program"  placeholder="Select a value ..."    class="selectize" >
                <option value="">Select a program ...</option>
                
                <?php 
                $course_options = $comp_model -> question_course_option_list();
                if(!empty($course_options)){
                foreach($course_options as $option){
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
        <div class="">
            <small>E.g Bsc Nursing / JAMB / WAEC <br>leave blank if not known</small>
        </div>
    </div>
    <!-- category -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-category">Category</label>
        <div class="input-lable">
            <input class="form-control" id="ctrl-category" name="category" placeholder="What category would you classify this course?" value="<?= $this->set_field_value('category');?>" required>
        </div>
        <div class="">
            <small>E.g Science / Biology / Social Science / art <br>leave blank if not known</small>
        </div>
    </div>
    <div class="mt-4 centeredR">
        <button class="bg-0" data-toggle="tab" href="#newCourseForm2">NEXT <i class="ml-2 text-md pi pi-arrow-right"></i></button>
    </div>
</div>