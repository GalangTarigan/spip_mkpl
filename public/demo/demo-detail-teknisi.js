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

//bar chart
var myChart;
function renderChart(data, labels) {
    let ctx = document.getElementById('bar-chart');
    if (myChart != null) myChart.destroy()
    myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    data: data,
                    backgroundColor: bgColor(data),
                }
            ]
        },
        options: {
            responsive: "false",
            scales: {
                yAxes: [
                    {
                        // barThickness: 75, //lebarnya
                        ticks: {
                            beginAtZero: true,
                            fontSize: 13
                        },
                        scaleLabel: {
                            fontStyle: "bold",
                            fontSize: 15,
                            display: true,
                            labelString: "Durasi Instalasi per Jam"
                        }
                    }
                ],
                xAxes: [
                    {
                        // barThickness: 75,
                        ticks: {
                            fontSize: 13
                        },
                        barPercentage: 0.5,
                        scaleLabel: {
                            fontStyle: "bold",
                            fontSize: 15,
                            display: true,
                            labelString: "Nama Instansi"
                        }
                    }
                ]
            },
            legend: {
                display: false
            }
        }
    });

        //generate background color
function bgColor(data) {
    const color = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(113, 126, 111, 1)',
        'rgba(130, 157, 151, 1)',
        'rgba(108, 99, 107, 1)',
        'rgba(38, 46, 68, 1)'
    ]
    var bg = []
    let numBefore = Math.floor(Math.random() * (6 - 0 + 1) + 0)
    $.each(data, function (index, value) {
        let ran = randomNumber(6, 0, numBefore)
        bg.push(color[ran])
        numBefore = ran
    })
    return bg
}
//generating random number
function randomNumber(max, min, except) {
    let num = Math.floor(Math.random() * (max - min + 1)) + min;
    return (num === except) ? randomNumber(max, min, except) : num;
}
}

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
