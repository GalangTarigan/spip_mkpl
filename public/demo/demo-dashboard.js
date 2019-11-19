
//DOM Manipulation to move datatable elements integrate to panel
/*$('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
$('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

$('.panel-footer').append($(".dataTable+.row"));
$('.dataTables_paginate>ul.pagination').addClass("pull-right m0");*/

//chart
var myChart;
function renderChart(data, labels) {
    let ctx = document.getElementById('bar-chart');
    if (myChart != null) myChart.destroy()
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: bgColor(data)
            }]
        },
        options: {
            responsive: 'true',
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                    ,
                    scaleLabel: {
                        display: true,
                        labelString: 'Durasi Instalasi (jam)'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Instansi'
                    },
                    barPercentage: 0.2,
                    ticks: {
                        display: !isMobileDeviceAndCountData(data)
                    }
                }]
            },
            legend: {
                display: false
            },
            aspectRatio: 1,
            maintainAspectRatio: false,
        },

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
//check whether users device mobile
function isMobileDeviceAndCountData(data) {
    return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) && data.length <= 10;
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
function extractLabel(data) {
    let label = []
    $.each(data, function (index, value) {
        label.push(value.instansi.nama_instansi)
    })
    return label
}
function getDuration(data) {
    let duration = []
    let diff
    $.each(data, function (index, value) {
        diff = diffDuration(value.waktu_mulai, value.waktu_selesai)
        duration.push(diff)
    })
    return duration
}
//define header and footer for render calendar
function defineHeader() {
    let header = {}
    if ($(window).width() >= 480) {
        header = {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        }
    } else {
        header = {
            left: 'title',
            center: '',
            right: 'prev,next today'
        }
    }
    return header
}
function defineFooter() {
    let footer = {}
    if ($(window).width() >= 480) {
        footer = {
            left: '',
            center: '',
            right: ''
        }
    } else {
        footer = {
            left: '',
            center: '',
            right: 'dayGridMonth,timeGridWeek'
        }
    }
    return footer
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
            url: '/statistik/proyek/list-proyek',
            type: 'post',
            data: {
                _token: token,
                date_start: $('input[name="date_start"]').val(),
                date_end: $('input[name="date_end"]').val(),
                q_status: "fin"
            },
            dataType: 'json',
            success: function (data) {
                $('#spinner').hide()
                if (data.data.length == 0) {
                    if (myChart != null) myChart.destroy()
                    $('#msg-info').html('<span>Tidak ada data</span>')
                } else {
                    let dataChart = extractLabel(data.data)
                    let labels = getDuration(data.data)
                    renderChart(labels, dataChart)
                }
            },
            error: function (err) {
                $('#spinner').hide()
                $('#msg-info').html('<span >Data tidak dapat dimuat, harap refresh ulang halaman</span>')
            }
        })
    })

    function renderEvents(data) {
        calendar.batchRendering(function() {
        $.each(data, function (index, val) {
            if (val.waktu_selesai != null) {
                calendar.addEvent({
                    title: `Instalasi di ${val.instansi.nama_instansi}`,
                    start: moment(val.waktu_mulai).format(),
                    end: moment(val.waktu_selesai).format(),
                    backgroundColor: '#7EB73D',
                    borderColor: '#7EB73D',
                })
            } else {
                calendar.addEvent({
                    title: `Instalasi di ${val.instansi.nama_instansi}`,
                    start: moment(val.waktu_mulai).format(),
                    backgroundColor: '#3788D8',
                    borderColor: '#3788D8'
                })
            }

        })
        })
    }
    //remove duplicate events
    function issetEvent(start, end){
        var calendarE = calendar.getEvents()
        if(calendarE.length == 0){
            return 
        }else{
            $.each(calendarE, function(index, val){
                if(moment(val.start).isBetween(start, end) || moment(val.end).isBetween(start, end)) calendarE[index].remove()
            })
        }
        return calendarE
    }
    var calendarEl = document.getElementById('full-calendar')
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid', 'timeGrid'],
        locale: 'id',
        defaultView: 'dayGridMonth',
        header: defineHeader(),
        footer: defineFooter(),
        windowResize: function (view) {
            calendar.setOption('header', defineHeader())
            calendar.setOption('footer', defineFooter())
        },
        datesRender: function (info) {
            let date_start = moment(info.view.currentStart).format('DD/MM/YYYY HH:mm')
            let date_end = moment(info.view.currentEnd).format('DD/MM/YYYY HH:mm')
            $.ajax({
                url: '/statistik/proyek/list-proyek',
                type: 'post',
                data: {
                    _token: token,
                    date_start: date_start,
                    date_end: date_end,
                    q_status: "all"
                },
                dataType: 'json',
                success: function (data) {
                    issetEvent(info.view.currentStart, info.view.currentEnd)
                    renderEvents(data.data, calendar)
                },
                error: function (err) {

                }
            })
        }
    });
    calendar.render()
})
