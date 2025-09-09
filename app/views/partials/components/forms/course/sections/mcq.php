<div class="">
    <input name="options" hidden required/>
    <input name="answer" hidden required/>
    <div id="mcq-list" style="margin-left:-5px;">
        <div class="centeredL mcq-item mb-1">
            <div class="col px-0"><input class="form-control p-2 text-md" type="text" placeholder="MCQ Option one"/></div>
            <label class="ml-2"><input class="radio-md" type="radio" setAns style="margin-top:-5px;"/></label>
            <a class="pi pi-times text-md ml-2" onclick="removeMCQItem(this)"></a>
        </div>
    </div>
    <div class="small">Please tick / check the correct answer.</div>  
</div>