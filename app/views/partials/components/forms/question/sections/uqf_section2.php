<div class="tab-pane" id="uplaodQuestionForm2">
    <!-- paterrn -->
    <div class="mb-3">
        <div class="centeredL">
            <label for="ctrl-pattern" class="bold-sm"></label>
            <select class="border-0 bg-0 px-0" name="pattern">
                <option value="TF">True/False Question</option>
                <option value="MCQ">Multiple Choice Question</option>
                <option value="FIB">Fill In the Blank Question</option>
            </select>
        </div>
    </div>
    
    <div class="surface round-3 border p-3">
        <!-- question text -->
        <textarea name="question" required="" placeholder="Type / write the question here" col="30" class="form-control plain text-md bg-0 p-0" rows="5" maxlength="300" max-height="300px"></textarea>
        <!-- question response type -->
        <div id="question-response-type-wrapper">
            <?php include FORMS."question/patterns/tf.php";?>        
        </div>
    </div>
    <!-- solution -->
    <div class="form-group mb-4">
        <label class="text-capitalize" for="ctrl-solution">Question solution</label>
        <div class="input-lable">
            <input class="form-control" id="ctrl-solution" name="solution" placeholder="Enter answer solution">
        </div>
        <div class="">
            <small>Provide an explanation to the answer (optional)</small>
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
        <button class="bg-0" data-toggle="tab" href="#uplaodQuestionForm1">
            <i class="mr-2 text-md pi pi-arrow-left"></i> Prev
        </button>
        <div class="has-children relative">
            <a class="btn btn-primary text-white btn-lg pill bold px-4">Submit</a>
            <div class="dropdown">
                <div class="px-3 pt-2 bold-sm">Choose action on submit</div>
                <hr/>
                <div class="listitem" onclick="submitForm()">Submit and view question</div>
                <div class="listitem" onclick="submitForm('back')">Submit and go back</div>
                <div class="listitem" onclick="submitForm('still')">Submit and continue</div>
            </div>
        </div>
    </div>
</div>