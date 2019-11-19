var dataProyek;
var table;
$(function(){
    var token = $('meta[name="csrf-token"]').attr('content')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('#spinner').fadeIn()
    $("#table").css("cursor", "pointer")
    

    $.ajax({
		url: "/admin/daftar-proyek-instalasi/data",
		type: 'post',
		data: {
            "_token" : token,              
		},
		dataType: 'json',
		success: function (data) {
            dataProyek=data['data'];
            console.log(data)
            $('#spinner').fadeOut(290)
            table = $('#table').DataTable({
                "language": {
                    "lengthMenu": "_MENU_"
                },
                "oLanguage": {
                    "sEmptyTable": "Tidak ada data untuk ditampilkan"
                },
                serverSide: false,
                data: data['data'],
                columns: [
                    { data: null},
                    { data: 'nama_instansi' },
                    { data: 'alamat_instansi'},
                    { data: 'status' },
                    { data: 'waktu_mulai'},
                    { data: 'waktu_selesai'}
                ], 
                "lengthChange": false,
                "columnDefs": [
                {
                    "render": function(data, type, row){
                        if(data=="Selesai"){
                            return "<span class='label label-success'>"+data+"</span>"
                        }else if(data=="Dalam Training"){
                            return "<span class='label label-default'>"+data+"</span>"
                        }
                        else{
                            return "<span class='label label-primary'>"+data+"</span>"
                        }
                    },
                  "targets": 3
                },
                {
                    "render": function(data, type, row){
                        if(data !== null) {
                            var date = moment(data, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, D MMMM YYYY - HH:mm")+' WIB'; 
                            return date
                        }else{
                            return '-'
                        }
                    },
                    "targets": [4, 5]
                },
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "targets" : 0

                } ]
            })
            $('#table').fadeIn(300)
        }, 
        error : function () {
            $('#spinner').fadeOut(209)
            $('#errorLoading').append('<span>Data gagal dimuat, harap refresh ulang halaman</span>')
            $('#errorLoading').fadeIn(209)
        }
    })
    $('#table').on( 'click', 'tbody tr', function () {
        var id_laporan = table.row( this ).data().uuid
        console.log(id_laporan)
        window.location.href = '/admin/daftar-proyek-instalasi/detail-proyek?laporan='+id_laporan
    })
})



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
            url: '/admin/daftar-proyek-instalasi/data',
            type: 'post',
            data: {
                _token: token,
                date_start: $('input[name="date_start"]').val(),
                q_status: "fin"
            },
            dataType: 'json',
            success: function (data) {
                table.clear().draw();
                dataProyek=data;
                // console.log(data.data)
                // console.log($('input[name="date_start"]').val())
                $('#spinner').hide()
                if (data.data.length == 0) {
                    if (table != null) table.clear().draw()
                    $('#msg-info').html('<span>Tidak ada data</span>')
                } else {
                    table.clear().draw();
                    table.rows.add(data['data']); // Add new data
                    table.columns.adjust().draw();
                }
            },
            error: function (err) {
                $('#spinner').hide()
                $('#msg-info').html('<span >Data tidak dapat dimuat, harap refresh ulang halaman</span>')
            }
        })
    })
})
