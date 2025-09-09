/*
[]
still safe zone start



end
[]
 */

window.addEventListener('popstate', (e) => {
    {
        
        root = decodeURIComponent(document.URL.split(siteAddr)[1].toLowerCase());
        var page = root != '' ? root : 'home';
        var pageExist = $('#page-content [spage="'+ page + '"]').length;
        if(!pageExist) createPage(page,'','');
        if($('#page-content [spage]').length <= 0) location.reload();
        doNavigation();
        clearPages();
        if(document.URL.split('#m').length <= 1) closemodal();
    }
    setTimeout(() => { 
        $('.dropzone[status=0]').each(function(){Dropzone.forElement(this).removeAllFiles(true);})
    }, 500);
});


function clearPages(){
    var activePage = $('.tab-pane[pageIndex].active');
    var activePageIndex = $('.tab-pane[pageIndex].active').attr('pageIndex');
    var activePageIndex =  activePage.length >= 1 ? activePageIndex :  0;
    $('.tab-pane[pageIndex]:not(.active)').each(function(){
        var disIndex = $(this).attr('pageIndex');
        if(disIndex >= activePageIndex) $(this).remove();
    });
}
// logout function
function logout(){
    var logout = `${siteAddr}index/logout?csrf_token=${csrfToken}`;
    history.back();
    location.href = logout;
}

let pageIndex = 0;
function createPage(page, pageId, title) {
    const formattedPage = page.replace(siteAddr, '').toLowerCase();
    pageIndex = (formattedPage === 'home') ? -1 : pageIndex;
    
    const pageContent = `
        <div class="tab-pane active" state="0" pageId="${pageId}" pageIndex="${pageIndex}" sPage="${formattedPage}">
            <div class="" pullUrl="${formattedPage.replace(/~!~/g, " ")}">
                <div class="">
                    <div class="bg-white w-100 mw-auto" style="min-height: 100vh;">
                        <div class="row mx-0 bg-white centeredB shadow-scroll sticky-top d-md-none" smNav>
                            <div class="col-auto pl-2 closemodal">
                                <span class="btn-cr btn40">
                                    <i class="bi bi-arrow-left lg"></i>
                                </span>
                            </div>
                            <div class="col p-0">
                                <h4 class="">${title}</h4>
                            </div>
                        </div>
                        <div class="">
                            <div class="p-5 text-center">
                                <i class="pi pi-clock pi-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    const pageExists = $(`#page-content [spage="${formattedPage}"]`).length;
    if (!pageExists) $('#main-content #page-content').append(pageContent);
    pageIndex++;
}



// funaction variable the major doNavigation Engine kick stat 
function nUrl(){
    $nUrl = document.URL.split(siteAddr)[1].toLowerCase();
    var docUrl = document.URL;
    if(docUrl == siteAddr || docUrl == siteAddr + 'home'){$nUrl = 'home';} 
    else if($nUrl.includes('#m') && $nUrl.startsWith('#m') || $nUrl.split('#m')[0] == 'home' ){$nUrl = 'home';}
    else if(docUrl.split('#')[1] == 'm'){$nUrl = docUrl.split('#')[0].replace(siteAddr,'');}
    else if(docUrl.includes('ps=-1')){ $nUrl = docUrl.replace(siteAddr,'');} 
    else if($nUrl.split('?csrf_token').length >= 2){ $nUrl = $nUrl; } 
    else if($nUrl.includes('?') && $nUrl.split('?')[0] != ''){ $nUrl = $nUrl.split('?')[0]; } 
    else if($nUrl.includes('?') && $nUrl.split('?')[0] == ''){ $nUrl = 'home'; }
    else if($nUrl.includes('#') && $nUrl.split('#')[0] != ''){ $nUrl = $nUrl.split('#')[0];}
    return $nUrl;
}
function doNavigation(){
    var $nUrl = nUrl();
    // variable || engin end[]
    decodedUrl = decodeURIComponent($nUrl);
    var actPage = $("[sPage='"+decodedUrl+"']");
    actNav = $("[pushUrl='"+document.URL.split('/')[4]+"']");
    if($nUrl == 'home' || $nUrl == ''){actNav = $("[pushUrl='']");}

    // set and indicate spage active and show
    $('[sPage]').removeClass('active show');
    actPage.addClass('active show');
    // set and indicate nav buttons active 
    $('[pushUrl]').removeClass('active');
    actNav.addClass('active');

    // toggle right suggestion Nav
    if(document.URL.includes('v=v2')){
        $('.appRightNav').removeClass('d-md-block');
        $('#main-content').removeClass('view1').addClass('view2');
    } else {
        $('.appRightNav').addClass('d-md-block');
        $('#main-content').removeClass('view2 view1');
    }

    // bottom nav on mobile behaviour
    var lastParamSection = document.URL.split('/').length;
    var mUrlRoot = document.URL.split('/')[lastParamSection-1].split('=')[0].split('#')[0].toLowerCase();
    if(mUrlRoot.toLowerCase() == '' || mUrlRoot.toLowerCase() == 'home'){
        $('.bottomNav_p, .push-float-btn').removeClass('d-none');
    } else {
        $('.bottomNav_p, .push-float-btn').addClass('d-none');
    }

    // find pullUrl DOM then, get Data for an active spage if there is no data on it
    function getpullurl() {
    if(actPage.attr('state') <= 0){
        actPage.find('[pullUrl]').each(function(i){
        var $this = $(this), link = siteAddr + $this.attr('pullUrl');
        if($this.attr('find')){findData = $this.attr('find');}
        $.get({url: link})
        .then(function(pulledHtml){
            var pTitle = $(pulledHtml).find('[smNav] h4').text();
            $this.html(pulledHtml);
            if(!pTitle || pTitle == ''){ pTitle = siteName.toUpperCase()}
            document.title = pTitle;
        })
        .done(function(){
            $this.closest('[sPage]').attr('state',1);
            $this.attr('dataState',1);
        })
        .fail(function(params, status) {
            $this.html($retryAgainHtml);
        })
        });
    }
    }
    getpullurl();
}



// element Data get data from element url
function geturl(){
    $('data[state="0"]').each(function(){
        var dis = $(this), dom = '.compData';
        if(dis.inInViewport()){
            var url = dis.attr('data-url');
            (url.split(siteAddr).length >= 2 ? url = url : url = siteAddr + url);
            $.get(url, function(data){
                ($(data).find(dom).length <= 0 ? dom = 'div:first-child' : dom = dom);
                var getdata = $(data).find(dom).html();
                var dataCount = $(data).find('count').attr('data-count');
                dis.html(getdata);
                dis.attr({'state':1,'data-count': dataCount});
            })
            .fail(function(params, status) {
                dis.html($retryAgainHtml);
                dis.attr('state',0);
            });
        }
    });
}
// load image when in view
function setImgOnViewport(){
    $('[img-src]').each(function(){
        var dis = $(this);
        if(dis.inInViewport()){
            dis.attr('src',dis.attr('img-src'));
            dis.closest('div').addClass('overflow-0');
            dis.on('load', function(){
                dis.css('opacity','1');
                setTimeout(function(){dis.removeAttr('img-src')},300)
            });
        }
    });
}
// indicate record update (like tweeter)
function refresh_getUrl(){
    $('[spage].active [data-url][data-count]:not([data-state="await"])').each(function(){
        var dis = $(this);
        if(dis.inInViewport()){
            var url = dis.attr('data-url');
            $.get(url, function(data){
                var newDataCount = $(data).find('[data-count]').attr('data-count');
                var dataCount = dis.attr('data-count');
                if(newDataCount > dataCount || newDataCount < dataCount){
                    dis.find('.refreshNewRecPageHtml').remove();
                    dis.prepend(refreshNewRecPageHtml);
                    dis.attr('data-state','await');
                }
            })
        }
    });
}
// do functions before reseting scrolled variable
setInterval(function(){
    geturl();
    setImgOnViewport();
    refresh_getUrl();
},1000);
// check for element on view 
$.fn.inInViewport = function(){
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).outerHeight();
    var child = $(this).is(":hidden");
    var parents = $(this).parents();
    var parent = 0;
    for(let i = 0; i < parents.length; i++){
        if($(parents[i]).is(":hidden")){parent++;}
    }
    return elementBottom > viewportTop && elementTop < viewportBottom && !child && parent <= 0;
}

$(document).ready(function(){
    root = document.URL.split(siteAddr)[1].toLowerCase();
    $('#main-content #page-content').addClass('tab-content');
    $('#main-content #page-content > :first-child()').each(function(){
        var $dis = $(this), spage;
        (root != '' && root != 'home' ? spage = root : spage = 'home');
        $dis.addClass('tab-pane active').attr({'spage': spage,'pageIndex':'0'});
        (!$dis.attr('id') ? $dis.attr('id','index-page') : null);
    });
    
    $loader = '<div id="loader_loading" class="p-5 text-center"><div class="lds-ring"> <div></div> <div></div> <div></div> <div></div> </div></div>';
	$retryAgainHtml = `<div class=""><div class="text-center p-4 col-12"><h4 class="bold">It looks like you're offline.</h4><div class="mb-3">Check your connection and try again.</div><div class=""><button class="btn btn-dark pill px-4" refreshCont>Refresh page</button></div</div></div>`;
	refreshNewRecPageHtml = '<div class="refreshNewRecPageHtml text-center w-100 sticky-top" style="top:55px;height:15px;"><div class="animated fadeInDown pt-2"><button class="btn btn-primary shadow-sm pill px-4" refreshGetCont>Recored update available</button></div></div>';
});