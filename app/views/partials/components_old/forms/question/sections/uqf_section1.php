<div class="tab-pane active" id="uplaodQuestionForm1">
    <!-- host -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-host"> Question Host</label>
        <div class="input-lable">
            <input class="form-control" id="ctrl-host" name="host" placeholder="Enter question host" value="<?= $this->set_field_value('host');?>" required>
        </div>
        <div class="">
            <small>E.g JAMB NG. or University of Ghana Legon.</small>
        </div>
    </div>
    <!-- course -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-ciurse">Question subject</label>
        <div class="input-lable">
            <select required=""  id="ctrl-course" name="course"  placeholder="Select a value ..."    class="selectize" >
                <option value="">Select a subject ...</option>
                
                <?php 
                $course_options = $comp_model -> question_course_option_list();
                if(!empty($course_options)){
                foreach($course_options as $option){
                $value = (!empty($option['value']) ? $option['value'] : null);
                $label = (!empty($option['label']) ? $option['label'] : $value);
                $selected = $this->set_field_selected('course',$value, "");
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
            <small>E.g Advanced Mathematics</small>
        </div>
    </div>
    <!-- topic -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-topic"> Question Topic</label>
        <div class="input-lable">
            <input class="form-control" id="ctrl-topic" name="topic" placeholder="Enter question topic" value="<?= $this->set_field_value('topic');?>" required>
        </div>
        <div class="">
            <small>leave blank if not known</small>
        </div>
    </div>
    <!-- exam year -->
    <div class="form-group">
        <label class="text-capitalize" for="ctrl-exam_year"> Question Exam year</label>
        <div class="input-lable">
            <input class="form-control" id="ctrl-exam_year" name="exam_year" placeholder="Enter question exam year" value="<?= $this->set_field_value('exam_year');?>" required>
        </div>
        <div class="">
            <small>E.g 2020/2021</small>
        </div>
    </div>

    <div class="mt-4 centeredR">
        <button class="bg-0" data-toggle="tab" href="#uplaodQuestionForm2">NEXT <i class="ml-2 text-md pi pi-arrow-right"></i></button>
    </div>
</div>