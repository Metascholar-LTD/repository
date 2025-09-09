
<div id="clippModal" class="w-100">
    <div class="w-100 h-100 d-none modalHolder" gallery style="max-width: 100%; background:rgba(0,0,0,0.9);"><!--gallery-->
        <div class="w-100 relative" page="" id="appmodal_holder">
            <button class="closemodal bg-0 right-0 m-2" style="z-index:100;position:fixed;top:0px;">
                <i class="pi pi-times text-white text-lg"></i>
            </button>
            <div id="app-gallery" class="scroll-y h-100v"></div>
        </div>
    </div>

    <div class="w-100 h-100 d-none modalHolder " quoteThis="" aid=""><!--addquote-->
        <div class="animated fadeInUp" id="appmodal_holder">
           <div class="p-5 text-center"><div class="lds-ring"> <div></div> <div></div> <div></div> <div></div> </div></div>
        </div>
        <!---->
    </div>

    <div class="w-100 h-100 d-none modalHolder" ajaxModal><!--any content can be loaded-->
        <div class="animated fadeInUp" id="appmodal_holder">
            <div id="appmodal">
                <button class="pi pi-times text-lg closemodal bg-0 absolute top-0 right-0 p-2 mr-1" style="z-index:100;"></button>
                <div class="modal-body reset-grids inline-page p-0 w-100"></div>
            </div>
        </div>
    </div>

    <div class="w-100 h-100 d-none modalHolder" pushdown=""><!--pushdown options-->
        <div class="animated fadeInUp" page="" id="appmodal_holder">
            <div class="sm_ shadow curve-md-sm" id="appmodal" style="overflow: hidden;max-height:80vh;">
                <div class="border-bottom" id="appmodal_header" style="height: 55px;">
                    <div class="col-12 px-1 h-100 centeredB text-center mhead">
                        <i class="btn-cr btn40"></i>
                        <h4 class="title"></h4>
                        <i class="btn-cr btn-0 btn40 bi bi-x-lg closemodal"></i>
                    </div>
                </div>
                <div class="" id="appmodal_body">
                </div>
            </div>
        </div>
        <!---->
    </div>

    <div class="w-100 h-100 d-none modalHolder" shareItem=""><!--share questions options-->
        <div page="" id="appmodal_holder">
            <div class="sm_ shadow curve-md-sm" id="appmodal" style="overflow: hidden;max-height:80vh;">
                <button class="pi pi-times text-lg closemodal bg-0 absolute top-0 right-0 p-2"></button>
                <div class="centered" id="appmodal_header" style="height: 55px;">
                    <div class="text-lg bold-sm">Share</div>
                </div>
                <div class="" id="appmodal_body">
                    <div class="repostOption">

                    </div>
                    <hr/>
                    <div class="">
                        <div class="text-center centeredB col bar-0">
                            <span class="closethismodal" shareSave>
                                <button class="avt centered bg-0 border border-dark avt-65">
                                    <i class="text-xl pi pi-google"></i>
                                </button>
                                <div class="small p-1">Google</div>
                            </span>
                            <span class="closethismodal" shareSave>
                                <button class="avt centered bg-0 border border-dark avt-65">
                                    <i class="text-xl pi pi-clone"></i>
                                </button>
                                <div class="small p-1">Copy</div>
                            </span>
                            <button class="bg-0 to-modal closethismodal savetocollection" href="<?=SITE_ADDR?>collection/saveto">
                                <a class="avt centered border border-dark avt-65">
                                    <i class="text-xl pi pi-bookmark"></i>
                                </a>
                                <div class="small p-1">Save</div>
                            </button>
                            <span class="" shareMore>
                                <button class="avt centered bg-0 border border-dark avt-65">
                                    <i class="text-xl pi pi-share-alt"></i>
                                </button>
                                <div class="small p-1">More</div>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 mb-3">
                        <div class="centeredB">
                            <h6 class="bold-sm text-dark">Send Via Direct Message</h6>
                            <button class="bg-0 text-lg pi pi-search"></button>
                        </div>
                    </div>
                    <div class="pb-3" style="height:200px;">
                        
                    </div>
                </div>
            </div>
        </div>
        <!---->
    </div>
</div>
<style>
[gallery] #app-gallery img[src]{
    width: auto;
    height: auto;
    max-width: 100% !important;
    max-height: 100% !important;
}
</style>
<script>
{
    $(document).on('click', '[shareSave]', function(){
        var selItem = $('[item].selected');
        var item = selItem.attr('item');
        var itemId = selItem.attr('item-id');
        
    });
    $(document).on('click', '[modal]', function(){
        var item = '['+$(this).attr('modal-item')+']';
        appModal(this, item);
    });
    $(document).on('click', '[modal][modal-item="shareItem"]', () => {
        setTimeout(() => {
            var selItem = $('[item].selected');
            var item = selItem.attr('item');
            var itemId = selItem.attr('item-id');
            var saveBtn = $('.modalHolder[shareItem] .savetocollection');
            var repostOption = $('.modalHolder[shareItem] .repostOption');
            $href = saveBtn.attr('href').split('?')[0];
            $href = $href+'?item='+item+'&item_id='+itemId; 
            saveBtn.attr('href',$href);
            item == 'question' ? repostOption.html(repostEntry(itemId)) : repostOption.html('');
        },0); 
    });
    $(document).on('click', '.closemodal', function(){
        closemodal()
    });
    $(document).on('click', '.closethismodal', function(){
        var el = $(this).closest('.modalHolder');
        closemodal(el);
    });
    $(document).on('click', '[item]', function(){
        $('[item]').removeClass('selected');
        $(this).addClass('selected');
    });
}

function repostEntry(itemId){
    var img = '';
    var name = '<?=USER_NAME?>';
    var ref = "<?php print_link('post/add?item=question&item_id=')?>"+itemId;
    var postHtml = `
    <button class="listitem text-left w-100 bg-0 centeredL d-flex closethismodal py-3 to-modal" href="${ref}">
        <div class="avt fit-object avt-sm surface">
            <img width="100%" src="${img}" class="btn-cr"/>
        </div>
        <div class="col">
            <div class="text-400">Discuss as ${name}</div>
            <div class="text-lg"> What's on you mind?</div>
        </div>
    </button>
    `;
    return postHtml;
}
function setGallery(){
	$(document).on('click','[item] img[src]', function(){
		var thisImg = $(this).attr('m-gallery');
        var data = $(this).closest('.img-grid').find('img[src], a[src]');
        var modalDom = $('#app-gallery');
		modalDom.html('');
		appModal(this, '#clippModal [gallery]');
		data.each(function(){
            var src = $(this).attr('src').split('?src=');
            var src = (src.length >= 2 ? src[1] : src[0]);
            var src = (src.split('&w=').length >= 2 ? src.split('&w=')[0] : src);
            modalDom.append('<div class="p-3 w-100 h-100v centered"><img src="'+src+'"/></div>');
        });
		// swiperGallery.update();
	});
}
setGallery();

function closemodal(el){
    if(el && $(el).addClass('d-none').removeClass('visible')){return}
    $('body').css('overflow-y','scroll');
    $('#clippModal, .modalHolder').addClass('d-none').removeClass('visible');
    $('#clippModal [ajaxModal] .modal-body, #clippModal #app-gallery').html('');
    (document.URL.split('#m').length >= 2 ? history.back() : null);
}
function appModal(dis, el){
    dis = $(dis);
    $('#clippModal, ' + el).removeClass('d-none');
    setTimeout(() => {$('#clippModal, ' + el).addClass('visible')}, 0);
    $('body').css('overflow-y','hidden');
    location.href='#m';
}
</script>