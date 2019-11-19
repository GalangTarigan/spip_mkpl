//bar chart
var myChart;
function renderChart(data, labels) {
    let ctx = document.getElementById('bar-chart');
    if (myChart != null) myChart.destroy()
    myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
                {
            data : data,
            backgroundColor: bgColor(data),
        }
    ]
},
    options: {
        responsive: 'true',
        scales: {
            yAxes: [{
                    // barThickness: 75, //lebar barnya
                ticks: {
                    beginAtZero: true,
                    fontSize: 13,
                    stepSize: 1,
                }
                ,
                scaleLabel: {
                    fontStyle: 'bold',
                    fontSize: 15,
                    display: true,
                    labelString: 'Jumlah Keluhan'
                }
            }],
            xAxes: [{
                    // barThickness: 75,                    
                ticks:{
                    fontSize: 13,
                },
                barPercentage: 0.5,
                scaleLabel: { 
                    fontStyle: 'bold',
                    fontSize: 15,
                    display: true,
                    labelString: 'Subjek Keluhan'
                }
            }]
        },
        legend: {
            display: false
            }
        }
    });
}
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


//define function to calculate time differences between now and given date
function diffDuration(date_start, date_end) {
    const startDate = moment(date_start, 'YYYY-MM-DD HH:mm:ss')
    const endDate = moment(date_end, 'YYYY-MM-DD HH:mm:ss')

    // get the difference between the moments
    const diff = endDate.diff(startDate, 'hours');

    // display
    return diff
}

$(function () {
    let token = $('meta[name="csrf-token"]').attr('content')
    $('#daterangepicker_dashboard').daterangepicker({
        ranges: {
            'Kemarin': [moment().subtract(1, 'days'), moment()],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            "customRangeLabel": "Tanggal"
        },
    });
    $('#daterangepicker_dashboard').on('apply.daterangepicker', function (ev, picker) {
        $('#daterangepicker_dashboard span').html(picker.startDate.locale('id').format('D MMMM YYYY') + ' - ' + picker.endDate.locale('id').format('D MMMM YYYY'));
        $('input[name="date_start"]').val(picker.startDate.format('DD/MM/YYYY HH:mm'))
        $('input[name="date_end"]').val(picker.endDate.format('DD/MM/YYYY HH:mm'))
        $('#msg-info').html('')
        $('#spinner').fadeIn()
        $.ajax({
            url: "/admin/statistik/keluhan-proyek/bar-keluhan",
            type: 'post',
            data: {
                _token: token,
                date_start: $('input[name="date_start"]').val(),
                date_end: $('input[name="date_end"]').val(),
            },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                $('#spinner').hide()
                const allEqual = (arr) => arr.every( v => v === 0 )
                if (allEqual(result.total_project)) {
                    if (myChart != null) myChart.destroy();
                    $('#msg-info').html('<span>Project tidak ada / belum selesai </span>');                
                } else {
                    console.log(result)
                    renderChart(result.total_project, result.subjek);
                }
            },
            error: function (err) {
                $('#spinner').hide()
                $('#msg-info').html('<span >Data tidak dapat dimuat, harap refresh ulang halaman</span>')
            }
        })
    })
})
