<div class="tab-pane" id="newCourseForm2">
    
    <div class="surface round-3 border p-3">
        <!-- img -->
        <div class="form-group ">
            <label class="control-label mb-2" for="img" style="visibility:visible;opacity:1;">Cover picture</label>
            <div id="ctrl-img-holder" class=""> 
                <div class="dropzone required bg-0 p-4" input="#ctrl-img" fieldname="img"    data-multiple="false" dropmsg="Click to choose or drag and drop a picture to upload"    btntext="[html-lang-0082]" extensions=".jpg,.png,.gif,.jpeg" filesize="5" maximum="1">
                    <input name="img" id="ctrl-img" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('img',""); ?>" type="text"  />
                    <!--<div class="invalid-feedback animated bounceIn text-center">[html-lang-0129]</div>-->
                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                </div>
            </div>
        </div>
        <!-- title -->
        <div class="form-group">
            <label class="text-capitalize" for="ctrl-title">Course Title</label>
            <div class="">
                <input name="title" placeholder="Give it a title" class="form-control plain text-lg bg-0 p-0" value="<?= $this->set_field_value('title');?>" required/>
            </div>
        </div>
    </div>
    <!-- description -->
    <div class="form-group mb-4">
        <label class="text-capitalize" for="ctrl-description">Describe this course briefly</label>
        <div class="input-lable">
            <textarea class="form-control" id="ctrl-description" name="description" rows="2" placeholder="Enter course description"><?= $this->set_field_value('description');?></textarea>
        </div>
        <div class="">
            <small>Provide aditional infomation about this course</small>
        </div>
    </div>
    <!-- visisbility -->
    <div class="surface round-3 border p-3">
        <div class="centeredL">
            <label for="ctrl-visibility" class="bold-sm">Question visibility</label>
            <select class="ml-1 bg-0 border-0" name="visibility">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>
        <div class="text-400 small">Public by default</div>
    </div>
    <div class="mt-4 centeredB">
        <button class="bg-0" data-toggle="tab" href="#newCourseForm1">
            <i class="mr-2 text-md pi pi-arrow-left"></i> Prev
        </button>
        <div class="relative">
            <button class="btn btn-primary text-white btn-lg pill bold px-4">Submit</button>
        </div>
    </div>
</div>