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
		url: "/admin/statistik/statsTeknisi",
		type: 'get',
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
                    { data: 'nama_lengkap' },
                    { data: 'projects_amount'},
                    { data: 'average_duration'},                     
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
            console.log(data)
		}
    });
    $('#table').on( 'click', 'tbody tr', function () {
        let uuid = table.row( this ).data().uuid;
        let name = table.row( this ).data().nama_lengkap;
        // console.log(name)
        // console.log(uuid)        
        window.location.href = '/admin/statistik/teknisi/detailTeknisi?user=' + uuid+ '&name=' + name;
    } );
})
