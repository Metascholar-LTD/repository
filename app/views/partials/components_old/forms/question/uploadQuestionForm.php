<?php
$item = $this->set_field_value('item');
$item_id = $this->set_field_value('item_id');
$arr = [
    ['name'=>'host', 'placeHolder'=>'Enter host title', 'helpText'=>'E.g JAMB NG. or University of Ghana Legon.'],
    ['name'=>'exam_year', 'placeHolder'=>'Enter Exam Year', 'helpText'=>'E.g 2020/2021'],
    // ['name'=>'course', 'placeHolder'=>'Enter course / subject title', 'helpText'=>'E.g Advanced Mathematics'],
    // ['name'=>'topic', 'placeHolder'=>'Enter question topic', 'helpText'=>'leave blank if not known']
]
?>
<form id="question-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation h-100" action="<?php print_link("question/add?csrf_token=$csrf_token") ?>" method="post">
    <div class="h-100 flex-column col-12 tab-content">
        <?php 
        include FORMS.'question/sections/uqf_section1.php';
        include FORMS.'question/sections/uqf_section2.php';
        ?>
    </div>
</form>

<style>
.small-input{
    width: 100px;
}
.form-group label{
    visibility: hidden;
    display: block;
    position: relative;
    opacity: 0;
    transition: 0.3s ease-in-out;
    margin-bottom: -10px !!important;
}
.form-group label.visible{
    margin-bottom: 10px !important; 
    visibility: visible;
    opacity: 1;
}
</style>

<script>
{
    // initFormPlugins();
    var mcqItem = null;
    // callback on pattern change
    $(document).on('change', 'form .tab-content [name="pattern"]', function(){
        setPatternDom();
    });
    // callback on MCQ input
    $(document).on('input', "form .tab-content .mcq-item input[type='text']", function(){
        var options = '';
        var tab = $(this).closest('.tab-content #question-response-type-wrapper ');
        var item = $(this).closest('.list-item');
        var $mcqList = tab.find('#mcq-list');
        var $inputs = tab.find(".mcq-item [type='text']");
        var optionEl = tab.find("[name='options']");
        var $lastItem = $inputs.last();
        var $secondLastItem = $inputs.eq(-2);
        // set and remove entry (auth)
        if($lastItem.val() != ''){$mcqList.append(mcqItem);}
        if($secondLastItem.val() == '' && $lastItem.val() == ''){$lastItem.closest('.mcq-item').remove();}
        // set MCQ options
        $inputs.each(function(i){
            var value = $(this).val();
            if(value != ''){(i == 0 ? options = value : options =  options + '[],' + value);}
            else{uncheckAns()}
        });
        optionEl.val(options);
    });
    // set MCQ answer
    $(document).on('change', "form .tab-content .mcq-item input[type='radio']", function(){
        var inputParent = $(this).closest('.tab-content #question-response-type-wrapper .mcq-item');
        var $ansEl = $(this).closest('#question-response-type-wrapper').find("input[name='answer']");
        var $input = inputParent.find("[type='text']");
        uncheckAns()
        if($input.val() != ''){$ansEl.val($input.val()); $(this).prop('checked',true)}
        else{showToastDanger('selected item is empty ','red');}
    });
    // remove MCQ item function
    function removeMCQItem(dis){
        var $mcqItems = $(dis).closest('.tab-content #question-response-type-wrapper').find('.mcq-item');
        if($mcqItems.length >= 2){$(dis).closest('.mcq-item').remove()} 
        else{ showToastDanger('You cant remove the last item ','red')}
    }
    // uncheck MCQ function
    function uncheckAns(dis){
        (dis ? radio = $(dis) : radio = $("form .tab-content .mcq-item input[type='radio']"));
        radio.prop("checked", false);
        $('input[name="answer"]').val('');
    }
    function submitForm(act){
        var $form = $('#question-add-form');
        if(act == 'still'){ $form.addClass('still-on-submit');}
        else if(act == 'back'){ $form.addClass('still-on-submit'); history.back();}
        else { $form.removeClass('still-on-submit');}
        $('#question-add-form').submit();
        if(validateForm($form)){
            setTimeout(function(){
                $('#uplaodQuestionForm2 input[name], #uplaodQuestionForm2 textarea[name]').val('');
                setPatternDom();
            }, 200);
        } else {
            checkInputRequired();
        }
    }
    function checkInputRequired(){
        var name = $('[required][name]').filter(function(){return this.value == ''}).attr('name');
        if(name.length >= 1){
            showToastDanger('please fill the '+name+' field...');
            return false;
        } else {
            return true;
        }
    }
    // load question pattern dom
    function setPatternDom(){
        var value = $("#question-add-form [name='pattern']").val();
        var patternHolder = $('#question-add-form #question-response-type-wrapper');
        $.get(siteAddr+'app/views/partials/components/forms/question/patterns/'+value+'.php', function(d){
            (value.toLowerCase() == 'mcq' ? mcqItem = $(d).find('#mcq-list').html() : mcqItem = mcqItem);
            patternHolder.html(d);
        });
    }
    // show label when input placeholder is not visisble i.e input is not empty
    $(document).on('input', 'input', function(){
        var label = $(this).closest('.form-group').find('label');
        var text = $(this).val();
        (text != '' ? label.addClass('visible') : label.removeClass('visible'));
    });
}
</script>