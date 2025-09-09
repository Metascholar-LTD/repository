<script>
// start
var intervalId; 
function initPdfBuilder(){
  // Get the Dropzone instance
  var input = '#ctrl-thumbs';
  var limit = 15;
  const thumbDropzone = new Dropzone("[input='#ctrl-thumbs']", { 
      url: setPathLink("filehelper/uploadfile/"),
      addRemoveLinks: true,
      params: {
        csrf_token: csrfToken,
        fieldname: 'thumbs',
      },
      init: function() {
        this.on("success", function(file, responseText) {
          if(responseText){
            var files = $(input).val();
              files = files + ',' + responseText;
              files = files.trim().trimLeft(',')
                        $(input).val(files);
              console.log(files);
          }
        });
        this.on("removedfile", function(file) {
          if(file.xhr){
            var filename = file.xhr.responseText;
            var files = $(input).val();
            var arrFiles = files.split(',');
            while (arrFiles.indexOf(filename) !== -1) {
              arrFiles.splice(arrFiles.indexOf(filename), 1);
            }
            $(input).val(arrFiles.toString());
            var remUrl = setPathLink('filehelper/removefile/')
            $.ajax({
              type:'POST',
              url: remUrl,
              data : {filepath: filename, csrf_token: csrfToken},
              success : function (data) {
                console.log(data);
              }
            });
          }
          var inputFiles = $(input).val();
          if(inputFiles){
            var inputFilesLen = inputFiles.split(',').length;
            if (  limit > inputFilesLen){
              $(input).closest('.dropzone').find('.dz-file-limit').text('');
            }
          }
        })
      }
  });
  
  if (intervalId) {
    clearInterval(intervalId); // Clear the old interval
  }

  var v = 0;
  intervalId = setInterval(() => {
      if(v != $('#ctrl-file').val()){
          $('#pdfHolder').html('');
          thumbDropzone.removeAllFiles(true);
          v = $('#ctrl-file').val();
          $('#ctrl-thumbs').val('');
          getPdf(v, thumbDropzone);
      }
  },1000);
};

// Load PDF file {}
function dataURItoBlob(dataURI) {
  const byteString = atob(dataURI.split(',')[1]);
  const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
  const ab = new ArrayBuffer(byteString.length);
  const ia = new Uint8Array(ab);
  for (let i = 0; i < byteString.length; i++) {
    ia[i] = byteString.charCodeAt(i);
  }
  return new Blob([ab], { type: mimeString });
}

function getPdf(v, thumbDropzone){
  function startBlob(el){
    $(el).each(function(i) {
        var canvas = $("#pdfHolder canvas")[i];
        // convert to imgURLData
        var dataURL = canvas.toDataURL();
        // Create a new Blob object from the base64-encoded image data
        const imageBlob = dataURItoBlob(dataURL);
        // Add the image to Dropzone
        thumbDropzone.addFile(imageBlob);
    });
  }
  file = v.split(',');
  var p = 0;
  $.each(file, function(i, path){
    // stat
    placeHolderId = 'pdfHolder-'+i;
    $('#pdfHolder').append('<span id="'+placeHolderId+'"></span>')
    pdfjsLib.getDocument(path).promise.then(function(pdf) {
      // Load the first page
      pdf.getPage(1).then(function(page) {
        var scale = 2.5;
        var viewport = page.getViewport({scale: scale});
    
        // Prepare canvas using PDF page dimensions
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        canvas.width = viewport.width;
        canvas.height = viewport.height;
        document.getElementById('pdfHolder-'+i).appendChild(canvas);
    
        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: context,
          viewport: viewport
        };
        page.render(renderContext);
        p = p + 1; if(p === file.length){ setTimeout(() => startBlob('#pdfHolder canvas'), 1000);}
      });
    });
  })
}
// []
</script>
<div id="pdfHolder" style="display:none;"></div>

