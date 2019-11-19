//field mask
$(".mask").inputmask();

$("#icon").on("click", function() {
    $("#editModal").modal();
    $("#submit-update").on("click", function() {
        var email = $('input[name="email"]').val();
        var alamat = $('input[name="alamat"]').val();
        var no_telepon = $('input[name="no_telepon"]').val();
        if (email != "" || alamat != "" || no_telepon != "") {
            $("#validate-form")
                .parsley()
                .validate();
            $(".modal-body form").submit();
            window.location.href = "/admin/editTeknisi/?user=" + uuid;
        } else {
            $("#editModal").modal("hide");
        }
    });
});

$.ajax({
    url: "/admin/statistik/teknisi/detailTeknisiBar?user=" + user,
    success: function(result) {
        console.log(result)
        if (result.duration.length == 0 && result.title.length == 0) {
            if (myChart != null) myChart.destroy();
            $('#msg-info').html('<span>Project tidak ada / belum selesai </span>');
        } else {
        renderChart(result.duration, result.title);
        }
    }
});



//Focus input if its has value
$(".input100").each(function() {
    if (
        $(this)
            .val()
            .trim() != ""
    ) {
        $(this).addClass("has-val");
    } else {
        $(this).removeClass("has-val");
    }
});
/*Form==================================================================
   [ Focus input ]*/
$(".input100").each(function() {
    $(this).on("blur", function() {
        if (
            $(this)
                .val()
                .trim() != ""
        ) {
            $(this).addClass("has-val");
        } else {
            $(this).removeClass("has-val");
        }
    });
});
//Remove error message after server validation if input has changed
$(".input100").each(function() {
    //If focused on particular input, then remove its parent next element
    $(this).on("focus", function() {
        if (
            $(this)
                .parent()
                .next()
        ) {
            $(this)
                .parent()
                .next()
                .remove();
        }
    });
});

$(function() {
    //ajax upload image profile
    var progress = $("#progress");
    var bar = $("#progress-bar");
    var percentage = $(".progress-percentage");
    $('input[name="image"]').change(function() {
        if (this.files[0].size > 1024 * 1024 * 3) {
            Swal.fire(
                'Error!',
                'Ukuran File Terlalu Besar, Maks. 3MB',
                'error'
            )
            return
        } else {
            $("#image-form").submit();
        }
    });
    $("#image-form").ajaxForm({
        beforeSend: function() {
            $(".contextual-progress").show(300);
            percentage.text('')
            progress.addClass("progress-striped active");
            bar.removeClass(
                "progress-bar-success progress-bar-danger"
            ).addClass("progress-bar-primary");
        },
        uploadProgress: (event, position, total, percentComplete) => {
            percentage.text("Uploading " + percentComplete + "%");
            bar.css("width", percentComplete + "%");
        },
        success: (data) => {
            if (data.errors) {
                alert(data.errors);
                percentage.text("Failed");
                progress.removeClass("progress-striped active");
                bar.removeClass("progress-bar-primary").addClass(
                    "progress-bar-danger"
                );
                bar.css("width", "100%");
                $(".contextual-progress").fadeOut(300);
            }
            if (data.success) {
                percentage.text("Uploaded");
                progress.removeClass("progress-striped active");
                bar.removeClass("progress-bar-primary").addClass(
                    "progress-bar-success"
                );
                bar.css("width", "100%");
                $(".contextual-progress").fadeOut("slow");
                window.location.reload();
            }
        },
        error: (err) => {
            percentage.text(`Failed, ${err.statusText}`);
            progress.removeClass("progress-striped active");
            bar.removeClass("progress-bar-primary").addClass(
                "progress-bar-danger"
            );
            bar.css("width", "100%");
            $(".contextual-progress").fadeOut(1000);
        }
    });
});
