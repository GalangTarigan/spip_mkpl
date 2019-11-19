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
		url: "/admin/manajemen/teknisi/showUser",
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
                    { data: 'nama_lengkap' },
                    { data: 'email' },
                    { data: 'no_telepon' },
                    { data: null }
                ], 
                // "lengthChange": false,
                "columnDefs": [ {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "",
                    "width" : 160,
                },
                {
                    "render": function(data, type, row){
                        let button = "<span type='button' id='detail' class='btn btn-success-alt'>Detail</span> <span class='btn btn-danger-alt delete' id='delete'>Hapus</span>"; 
                        return button;                        
                    },
                  "targets": -1
                },
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "targets" : 0
                }
            ]                
            })
            $('#table').fadeIn(300)
		}
    });

    $('#table').on( 'click', '#detail', function () {
        let uuid = table.row( $(this).parents('tbody tr') ).data().uuid;
        let name = table.row( $(this).parents('tbody tr') ).data().nama_lengkap;
        // console.log(name)
        // console.log(uuid)        
        window.location.href = '/admin/statistik/teknisi/detailTeknisi?user=' + uuid+ '&name=' + name;
    });

    $('#table').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tbody tr') ).data();
        console.log( table.row( $(this).parents('tbody tr') ).data().id);
        let id = table.row( $(this).parents('tbody tr') ).data().id;
        json = table.row( $(this).parents('tbody tr') ).data();
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda tidak akan bisa merubah jika setuju!!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            width: '400px'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/manajemen/teknisi/deleteUser/?user=' + id,
                    type: 'post',
                    data: {
                        _token: token,
                        user: id,
                    },
                    success: function (data) {
                        if (data['status']) {
                            Swal.fire({
                                    type: 'success',
                                    title: 'Berhasil',
                                    text: data['data'],
                                    width: '400px',
                                    showConfirmButton: false,
                                }
                            )                            
                            window.location.href ='/admin/manajemen/teknisi/daftar-teknisi';
                        } else {
                            Swal.fire(
                                {
                                    type: 'error',
                                    title: 'Gagal!!!',
                                    text: data['data'],
                                    width: '400px'
                                }
                            )
                        }
                    },
                    error: function (data) {
                        Swal.fire(
                            'Error!',
                            data['responseJSON']['errors'],
                            'error'
                        )
                    }
                })
            //     window.location.href = '/admin/manajemen/teknisi/deleteUser/?user=' + id;
            //     Swal.fire(
            //     'Deleted!',
            //     'Teknisi has been deleted.',
            //     'success',                     
            //   )
            }
          })
    } );
}) 



