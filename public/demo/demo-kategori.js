
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
		url: "/admin/manajemen/kategori-instansi/data",
		type: 'post',
		data: {
            "_token" : token,              
		},
		dataType: 'json',
		success: function (data) {
            console.log(data)
            $('#spinner').fadeOut(290)
            
            table = $('#table').DataTable({
                ///<span type='button' id='deletecate' class='btn btn-danger-alt'>Hapus</span>,
                "language": {
                    "lengthMenu": "_MENU_"
                },
                serverSide: false,
                data: data['data'],
                columns: [
                    { data: null},
                    { data: 'nama_kategori' },
                    { data: null }
                ], 
                "lengthChange": false,
                "columnDefs": [ 
                {
                    "render": function(data, type, row){
                        return "<span type='button' id='edit' class='btn btn-primary-alt'>&nbsp&nbsp Edit &nbsp&nbsp</span> <span type='button' id='deletecate' class='btn btn-danger-alt'>Hapus</span>";
                    },
                  "targets": -1
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


    $('#table').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tbody tr') ).data();
        console.log( table.row( $(this).parents('tbody tr') ).data().id);
        var id = table.row( $(this).parents('tbody tr') ).data().id;
        $('input[name="id_kategori"]').val(id)
        json = table.row( $(this).parents('tbody tr') ).data();
        $("#editModal").modal();
        $('#submit-update').on('click', function () {
            
            $('#validate-form').parsley().validate();
            $('.modal-body form').submit();
            
     })
    });



    $('#table').on( 'click', '#deletecate', function () {
        var data = table.row( $(this).parents('tbody tr') ).data();
        console.log( table.row( $(this).parents('tbody tr') ).data().id);
        let id = table.row( $(this).parents('tbody tr') ).data().id;
        json = table.row( $(this).parents('tbody tr') ).data();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            width: '400px'
          }).then((result) => {
            if (result.value) {
                window.location.href = '/admin/manajemen/kategori/delete/?category=' + id;
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          }
          )
    } );

    	//Focus input if its has value
	$('.input100').each(function () {
        if ($(this).val().trim() != "") {
            $(this).addClass('has-val');
        }
        else {
            $(this).removeClass('has-val');
        }
})
/*Form==================================================================
[ Focus input ]*/
$('.input100').each(function () {
    $(this).on('blur', function () {
        if ($(this).val().trim() != "") {
            $(this).addClass('has-val');
        }
        else {
            $(this).removeClass('has-val');
        }
    })

})
//Remove error message after server validation if input has changed
$('.input100').each(function () {
    //If focused on particular input, then remove its parent next element
    $(this).on('focus', function () {
        if($(this).parent().next()){
            $(this).parent().next().remove()
        }
    })
})



}
)

// //validate
// $('#validate-form #submit').on('click', function () {
//     $('#validate-form').parsley().validate();
// });