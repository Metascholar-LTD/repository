$(document).ready(function(){

    // $('body').on('click', '', function(e){
        
    // });

    // postItem toggle questions
    $('body').on('click', '[question]', function(e){
        $(this).closest('.data-cont').find('[question-option]').toggleClass('show');
    });
    $('body').on('click', '[to][href], td a:not(.page-modal, .record-delete-btn, [data-gallery])', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        pushurl(link);
        $('#main-page-modal').modal('hide');
    });

    // filtes []
    $('body').on('click', '[to][filter]', function(e){
        e.preventDefault();
		e.stopPropagation();
        var param = $(this).attr('filter');
        var key = param.split('=')[0];
        var value = param.split('=')[1];
        // dynamic url (inTab && on main Page)
        var url = $(this).closest('[data-page-url]').attr('data-page-url');
        url = !url ? $(this).closest('[data-url]').attr('data-url'): url;
        url = (url=='inTab')?$(this).closest('[data-url]').attr('data-url'):url;
        url = $(this).closest('#left-nav').length != 0 ? document.URL : url;
        console.log(url);
        // []
        url = new URL(url);
        var params = new URLSearchParams(url.search);
        params.set(key, value.replace('+',' '));
        params.set('ps', encodeURIComponent('-1'));
        params.delete('ph');
        url.search = params.toString();
        newUrl = url.toString();

        $('#main-page-modal').modal('hide');
        // pushurl(newUrl);
        document.location = newUrl;
    });
    $('body').on('click', '[to][removefilter]', function(e){
        e.preventDefault();
        e.stopPropagation();
        var key = $(this).attr('removefilter');
        var delurl = new URL(document.URL);
        delurl.searchParams.delete(key);
        var newUrl = delurl.toString();
        console.log(newUrl);
        pushurl(newUrl);
    });
    // ajaxa searchs []
    $('body').on('input','[searchFilterItems]', function(){
        var dis = $(this);
        var value = dis.val();
        var parent = dis.closest('[filterPath]');
        var dom = parent.find('.filterItems');
        var url = new URL(siteAddr+parent.attr('filterPath'));
        var params = new URLSearchParams(url.search);
        params.set('search', value);
        url.search = params.toString();
        newUrl = url.toString();
        
        $.get(newUrl, function(d){
            data = $(d).find('.filterItems').html();
            dom.html(data);
        });
        console.log(newUrl);
    });
    // filter ends
    $('body').on('input','[searchPageAjax]', function(){
        var dis = $(this);
        var value = dis.val();
        var parent = dis.closest('[data-page-url]');
        var dom = parent.find('.pageRecords');
        // dynamic url (inTab && main Page)
        var url = parent.attr('data-page-url');
        if(url == 'inTab'){
            parent = parent.find('.z-tab-pane.active');
            url = parent.find('data[data-url]').attr('data-url');
            dom = parent.find('.pageRecords');
        }
        // []
        url = new URL(url);
        var params = new URLSearchParams(url.search);
        params.set('search', value);
        url.search = params.toString();
        newUrl = url.toString();
        $.get(newUrl, function(d){
            data = $(d).find('.pageRecords').html();
            dom.html(data);
        });
    });
    // ajax search end 

    $('body').on('change', '[setStatus] [name="status"]', function(){
        var v = $(this).val();
        var parent = $(this).closest('[setStatus]');
        var t = parent.attr('setStatus');
        var id = parent.attr('id');
        var $ctrl = parent.attr('ctrl');
        var l = `${siteAddr}api/setStatus/${t}/${id}/${v}?ctrl=${$ctrl}`;
        $.get(l, function(d){
            parent.find('.has-children').html(d);
            showToastSuccess('Status Updated Successfully');
        })
    });

    $('body').on('input', '[setItem] [name="sval"]', function(){
        var v = $(this).val();
        var parent = $(this).closest('[setItem]');
        var id = parent.attr('setItem');
        var l = `${siteAddr}settings/edit/${id}?csrf_token=${csrfToken}`;
        $.post(l, {sval:v}, function(d){
            console.log(d);
        });
    })
    
    function pushurl(ref){
        var intRef = ref;
        var docUrl = decodeURIComponent(document.URL);
		// dynamic variable
        ref = decodeURIComponent((ref.includes(siteAddr) ? ref : siteAddr + ref).toLowerCase());
		// take actions
		if(docUrl.toLowerCase() != ref){
			docUrl.includes('#') ?
			window.history.replaceState({prevUrl: siteAddr}, null , ref) :
			window.history.pushState({prevUrl: siteAddr}, 'hortpapers' , ref);
            createPage(intRef, '', '');
			doNavigation();
		}
		// scroll to top when its not a modal push 
		if (intRef.split('#').length <= 1) $(window).scrollTop(0);
    }

    // play questions  on the go
    function playQuestions(){
        $(document).on('click', '[question-option][answer] .option-item', function(){
            var ds = $(this);
            var itemId = ds.closest('[item]').attr('item-id');
            var parent = ds.closest('[question-option]');
            var answer = parent.attr('answer');
            var chosenAnswer = ds.text();
            var correct = 'alert-success border-success';
            var wrong = 'border-danger';
            var ref = siteAddr+'question/view/'+itemId;
            var solutionHtml = `<a class="btn btn-primary mt-2 mb-1" to href="${ref}">View solution</a>`;
            if(answer == chosenAnswer){
                ds.addClass(correct);
                setTimeout(()=>{ ds.removeClass(correct)}, 1000)
            } else {
                ds.addClass(wrong);
                parent.find('.solution').html(solutionHtml);
                setTimeout(()=>{ ds.removeClass(wrong)}, 1000)
            }
        })
    }
    playQuestions();


    // set dropdown postion wheh hover
    $(document).on('mouseenter', '.has-children', function(){
        var elHeight = $(this).offset().top + $(this).height();
        if(elHeight <= (window.innerHeight - elHeight)){
            $(this).find('.dropdown').css({'top':'0px','bottom':'unset'});
        } else {
            $(this).find('.dropdown').css({'top':'unset','bottom':'0px'});
        }
    });
    // bootstap fix active button once click to allow multiple click
    $(document).on('click', 'form .tab-content [data-toggle="tab"]', function(){
        $(this).closest('.tab-content').find('[data-toggle="tab"]').removeClass('active');
    });
    $(document).on('click', '.refreshNewRecPageHtml', function(){
        $(this).fadeOut('fast');
		$(this).closest('[data-count]').attr({'state':0,'data-state':'updated'});
	});

    // chat and messages
    var sentState = true;
    $(document).on('input', '[messageEntry]', function(){
            var ds = $(this);
            var text = ds.val();
            var parent = ds.closest('.form-control.input-wrap');
            var sendBtn = parent.find('button[sendMsg]');
            var activeClass = 'bg-primary text-white';
            // console.log(text);
            (text != '' ? sendBtn.addClass(activeClass) : sendBtn.removeClass(activeClass) );
    });
    $(document).on('click', '.tab-pane.active .form-control.input-wrap button[sendMsg]', function(){
        var ds = $(this);
        var rid = ds.attr('sendMsg');
        var parent = ds.closest('.form-control.input-wrap');
        var input = parent.find('input');
        var text = input.val();
        var ref = `${siteAddr}message/chat?csrf_token=${csrfToken}`;
        if(text != '' && sentState){
            $.post(ref, {text:text, file:'', recipient:rid})
            .done((d)=>{
                ds.closest('[spage]').find('data[state]').attr('state','0');
                $('.modal-item[item="inbox"] data').attr('state','0'); 
                showToastSuccess(d); 
                input.val(''); 
                sentState = true;
            })
            .fail((d)=>{console.log(d); showToastDanger('something went wrong'); sentState = true;});
        } else {
            showToastDanger('please wait');
        }
    });
    // general scroll function 
    $(window).scroll(function(){
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 1000) {
            rootPage = $('[spage].tab-pane.active');
            var actPage = $(":not(data) .tab-pane.active section[data-page-url], :not(data) section[data-page-url].tab-pane.active ").first();
            var page_records = rootPage.find('.page-records');
            actPage = (page_records.length >= 1 ? page_records : actPage);
            actPage.each(function(){
                var dis = $(this);
                // infinity scroll diabled
                // if(dis.inInViewport()){_appendPageData(dis);}
            });
        }
    });
});


function insertEditFile(id){
    var dis = $(id);
    var el = $(id).html();
    dis.closest('tr').find('.td-btn .dropdown-menu').prepend(el);
}

function downloadFile($table, $id, dis, i) {
    var l = siteAddr + 'api/fileUrl/' + $table + '/' + $id;
    i = (i && i.length) ? i : 0;
    console.log(i);
    // Remove any existing refresh icon and add a spinning refresh icon
    dis.find('.pi-refresh').remove();
    dis.append('<i class="pi pi-refresh pi-spin ml-2"></i>');
    
    // Make a GET request to the API to get the file path
    $.get(l, function (filePath) {
        // Remove the spinning refresh icon
        dis.find('.pi-refresh').remove();
        filePath = filePath.split(',')[i];
        console.log(filePath);
        // Check if the file path is not empty
        if (filePath) {
            var regAction = siteAddr + 'api/regAction/' + $table + '/' + $id+'/download';
            // register download action
            $.get(regAction);
            // Create a hidden anchor element
            var link = document.createElement('a');
            link.href = filePath;
            link.target = '_blank'; // Open the link in a new tab
            link.download = ''; // You can set a default filename if needed

            // Append the anchor element to the document
            document.body.appendChild(link);

            // Trigger a click on the anchor element to start the download
            link.click();

            // Remove the anchor element from the document
            document.body.removeChild(link);
        } else {
            // Handle the case when the file path is empty or not available
            console.error('File path is empty or not available.');
        }
    });
    
}
function loadMore(target){
    var $target = $(target);
    _appendPageData(target);
}
// multiple upload
function importRecs(path, recData){
    // Loop through the student data array and make AJAX POST requests
    recData.forEach(function(Records) {
        $.ajax({
            type: "POST",
            url: `${siteAddr}${path}?csrf_token=${csrfToken}`, // Replace with your actual endpoint URL
            data: Records,
            success: function(response) {
                console.log("Records added successfully:", Records);
                console.log("Server response:", response);
            },
            error: function(error) {
                console.error("Error adding Records:", Records);
                console.error("Error details:", error);
            }
        });
    });
}
// load more content on scroll
function _appendPageData(ajaxPage){
    var pageUrl = ajaxPage.attr("data-page-url");
    pageUrl = (!pageUrl ? ajaxPage.closest('data').attr('data-url') : pageUrl);
    pageUrl = (!pageUrl ? ajaxPage.closest('section').attr('data-page-url') : pageUrl);
    console.log(pageUrl);
    var url = new Url(pageUrl);
    var currentPage = parseInt(url.query.limit_start) || 1;
    url.query.limit_start = currentPage + 1;
    var pageUrl = url.toString();
    var no_rec = ajaxPage.find('.no-record-found');
    var limit_start = ajaxPage.attr('limit_start');
    if(no_rec.length === 0 && (!limit_start || limit_start != 0))
    {
        $.ajax({
            url: pageUrl,
            success : function(result) {
                ajaxPage.attr({"data-page-url": pageUrl, "limit_start": currentPage + 1});
                ajaxPage.find('.data-loading').remove();
                ajaxPage.append($(result).find('.page-records').html());
            },
            error : function(err) {
                showToastDager('Error', 'red');
                console.log(err);
            }
        })
    } 
    else
    { ajaxPage.find('.data-loading').remove();}
    ajaxPage.attr('limit_start',0);
}


// setInterval(function(){
    // if ($('[spage].active #chatBoxParent').scrollTop() <= 500) {
        // _appendPageData($('[spage].active #chatBoxParent .page-records'));
    // } 
// },500);