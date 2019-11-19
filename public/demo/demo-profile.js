$(function () {
  //ajax upload image profile  
  var progress = $('#progress')
  var bar = $('#progress-bar')
  var percentage = $('.progress-percentage')
  $('input[name="image"]').change(function(){
    if(this.files[0].size > 1024 * 1024 * 3){
        alert("Ukuran File Terlalu Besar, Maks. 3MB")
    }else{
        $('#image-form').submit()
    }
  })
  $('#image-form').ajaxForm({
      beforeSend: function () {
          $('.contextual-progress').show(300)
          progress.addClass("progress-striped active")
          bar.removeClass('progress-bar-success progress-bar-danger').addClass('progress-bar-primary')
      },
      uploadProgress: function (event, position, total, percentComplete) {
          percentage.text('Uploading ' + percentComplete + '%')
          bar.css('width', percentComplete + '%')
      },
      success: function (data) {
          if (data.errors) {
              alert(data.errors)
              percentage.text('Failed')
              progress.removeClass('progress-striped active')
              bar.removeClass('progress-bar-primary').addClass('progress-bar-danger')
              bar.css('width', '100%')
              $('.contextual-progress').fadeOut(300)
          }
          if (data.success) {
              percentage.text('Uploaded');
              progress.removeClass('progress-striped active')
              bar.removeClass('progress-bar-primary').addClass('progress-bar-success')
              bar.css('width', '100%')
              $('.contextual-progress').fadeOut('slow')
              window.location.reload()
          }
      }
  });

  
});