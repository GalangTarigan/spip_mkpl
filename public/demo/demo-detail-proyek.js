//bar chart
function renderChart(data, labels) {
    var ctx = document.getElementById('bar-chart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                    {
                data : data,
                backgroundColor: 
                    "#cc0000",                
            }
        ]
    },
        options: {
            responsive: 'true',
            scales: {
                yAxes: [{
                    barThickness: 100,
                    ticks: {
                        beginAtZero: true,
                        fontSize: 13,
                    },
                    scaleLabel: {
                        fontStyle: 'bold',
                        fontSize: 15,
                        display: true,
                        labelString: 'Durasi Instalasi per Jam'
                    }
                }],
                xAxes: [{
                    barThickness: 100,
                    ticks:{
                        fontSize: 13,
                    },
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
    $.ajax({
            url: "/admin/statistik/proyek/barDetailProyek?kota="+kota,
            success: function (result) {
                renderChart(result.duration, result.title);
            }   
    });


//table
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
		url: "/admin/statistik/proyek/tabelDetailProyek?kabupaten_kota="+kota,
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
                    { data: null},
                    { data: 'nama_instansi' },
                    { data: 'user_nama' },
                    { data: 'alamat_instansi' },
                    { data: 'waktu_selesai' },
                    { data: 'instansi.daftar_pic'}
                ],       
                "columnDefs": [                
                {
                    "render": function(data, type, row){
                        var date = ''
                        if(data == null) var date= 'Proyek Belum Selesai';
                        else {
                        date = moment(data, 'YYYY-MM-DD HH:mm', 'id').format("dddd, D MMMM YYYY ~ HH:mm")+' WIB';
                        }
                        return date
                    },
                    "targets": 4
                }, { 
                    "render" : function(data, type, row){
                        var result = ''
                        $.each(data, function(key, val){
                            if(data.length == 1) result = val.nama_pic
                            else if(key == data.length-1){
                                result += val.nama_pic
                            }else{
                                result += val.nama_pic + ' , '
                            }
                        })
                        return result
                    },
                    "targets" : 5
                },
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "targets" : 0

                } ] 
            })
            $('#table').fadeIn(300)
		}
    });
}) 
