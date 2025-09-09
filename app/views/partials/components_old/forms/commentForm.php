<?php
$item = $this->set_field_value('item');
$item_id = $this->set_field_value('item_id');
?>
<form id="comment-comment-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation h-100" action="<?php print_link("comment/comment?csrf_token=$csrf_token") ?>" method="post">
<div class="h-100 flex-column col-12">
    <!-- visibility -->
    <div class="centeredL mb-3 h-55" >
        <div class="bold-sm">Comment visibility </div>
        <div class="small text-muted pill bg-light ml-2">
            <select name="visibility" required class="form-control" style="width:80px;height:25px;font-size:14px;padding:1px;">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>
    </div>
    <!-- data -->
    <div class="flex-grow-1">
        <div class="">
            <!--text-->
            <div class="relative" style="min-height:100px">
                <textarea name="comment" required="" placeholder="Write your comment here" col="30" class="form-control plain text-lg p-0" rows="5" maxlength="300" max-height="300px"></textarea>
            </div>
            <!---->
        </div>
        <input name="item" value="<?=$item?>" hidden/>
        <input name="item_id" value="<?=$item_id?>" hidden/>
        <div class="form-ajax-status"></div>
    </div>
    <div class="bg-white sticky-bottom relative">
        <div class="centeredB" style="font-size:150%;height:55px;">
                <e class="pr-1">💎</e>
                <e class="px-1">👏</e>
                <e class="px-1">❤️</e>
                <e class="px-1">🎓</e>
                <e class="px-1">🧠</e>
                <e class="px-1">🍰</e>
                <e class="px-1">👍</e>
                <e class="px-1">😂</e>
                <e class="pl-1">👎</e>
        </div>
        <div class="centeredR" style="height:55px;">
            <button class="btn bold-sm btn-primary curve-sm">Submit</button>
        </div>
    </div>
</div>
</form>

<style>
@media(max-width: 767px){
#clippModal [ajaxmodal],
#clippModal #appmodal,
#clippModal .modal-body,
#clippModal .modal-body > section{
    height: 100%;
}
}
</style>