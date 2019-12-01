//bar chart
var myChart;
function renderChart(data, labels) {
    let ctx = document.getElementById('bar-chart');
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
                }
                ,
                scaleLabel: {
                    fontStyle: 'bold',
                    fontSize: 15,
                    display: true,
                    labelString: 'Durasi Instalasi per Jam'
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
                    labelString: 'Nama Instansi'
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

$(function () {
    let token = $('meta[name="csrf-token"]').attr('content')
    $('#daterangepicker_daftarProyek').daterangepicker({
        ranges: {
            'Tahun Ini': [moment().subtract(0, 'year'), moment()],
            '1 tahun lalu': [moment().subtract(1, 'year'), moment()],
            '2 tahun lalu': [moment().subtract(2, 'year'), moment()],
            '3 tahun lalu': [moment().subtract(3, 'year'), moment()],
             },
        locale: {
            "customRangeLabel": "Tahun",
          },
    });

    $('#daterangepicker_daftarProyek').on('apply.daterangepicker', function (ev, picker) {
        $('#daterangepicker_daftarProyek span').html(picker.startDate.locale('id').format('YYYY') );
        $('input[name="date_start"]').val(picker.startDate.format('YYYY'))
        $('#msg-info').html('')
        $('#spinner').fadeIn()
        $.ajax({
            url: '/admin/statistik/proyek/barProyek',
            type: 'post',
            data: {
                _token: token,
                date_start: $('input[name="date_start"]').val(),
                q_status: "fin"
            },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                $('#spinner').hide()
                if (result.duration.length == 0 && result.title.length == 0) {
                    if (myChart != null) myChart.destroy();
                    $('#msg-info').html('<span>Project tidak ada</span>');                
                } else {
                    console.log(result)
                    renderChart(result.duration, result.title);
                }
            },
            error: function (err) {
                $('#spinner').hide()
                $('#msg-info').html('<span >Data tidak dapat dimuat, harap refresh ulang halaman</span>')
            }
        })
    })
})









//datatable
$(function(){
    var token = $('meta[name="csrf-token"]').attr('content')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('#spinner').fadeIn()
    $("#table").css("cursor", "pointer")
    var table
    $.ajax({
		url: "/admin/statistik/proyek-instalasi",
		type: 'post',
		data: {
            "_token" : token,              
		},
		dataType: 'json',
		success: function (data) {
            console.log(data)
            $('#spinner').fadeOut(290)
            table = $('#table').DataTable({
                "language": {
                    "lengthMenu": "_MENU_"
                },
                serverSide: false,
                data: data,
                columns: [
                    { data: null },
                    { data: 'provinsi' },
                    { data: 'kabupaten_kota' },
                    { data: 'projects_amount' }
                ],                 
                "columnDefs": [ {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "",
                    "width" : 200,
                },
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "targets" : 0

                }
            ],  
            })
            $('#table').fadeIn(300)
		}
    });
    $('#table').on( 'click', 'tbody tr', function () {
        console.log( table.row( this ).data().kabupaten_kota);
        let kabupaten_kota = table.row( this ).data().kabupaten_kota;
        json = table.row( this ).data();
        window.location.href = '/admin/statistik/proyek/detailProyek?kabupaten_kota=' + kabupaten_kota;
    } );
})