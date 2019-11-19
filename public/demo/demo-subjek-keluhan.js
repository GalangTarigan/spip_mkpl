
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
		url: "/admin/manajemen/subjek-keluhan/data",
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
                data: data['data'],
                columns: [
                    { data: null},
                    { data: 'nama_subjek' },
                    { data: null }
                ], 
                "lengthChange": false,
                "columnDefs": [ 
                {
                    "render": function(data, type, row){
                        return "<span type='button' id='edit' class='btn btn-primary-alt'>&nbsp&nbsp Edit &nbsp&nbsp</span>"; //<span type='button' id='deletecate' class='btn btn-danger-alt'>Hapus</span>"; for delete subjek
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
        console.log( table.row( $(this).parents('tbody tr') ).data().id_subjek);
        var id_subjek = table.row( $(this).parents('tbody tr') ).data().id_subjek;
        $('input[name="id_subjek"]').val(id_subjek)
        json = table.row( $(this).parents('tbody tr') ).data();
        $("#editModal").modal();
        $('#submit-update').on('click', function () {
            
            $('#validate-form').parsley().validate();
            $('.modal-body form').submit();
            
     })
    });


    //for delete subjek method
    // $('#table').on( 'click', '#deletecate', function () {
    //     var data = table.row( $(this).parents('tbody tr') ).data();
    //     console.log( table.row( $(this).parents('tbody tr') ).data().id_subjek);
    //     let id_subjek = table.row( $(this).parents('tbody tr') ).data().id_subjek;
    //     json = table.row( $(this).parents('tbody tr') ).data();
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!',
    //         width: '400px'
    //       }).then((result) => {
    //         if (result.value) {
    //             window.location.href = '/admin/manajemen/subjek-keluhan/delete-subjek/?subjek=' + id_subjek;
    //             Swal.fire(
    //             'Deleted!',
    //             'Your file has been deleted.',
    //             'success'
    //           )
    //         }
    //       }
    //       )
    // } );

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
