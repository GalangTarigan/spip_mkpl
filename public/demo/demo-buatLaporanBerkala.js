$(function () {
    if (typeof messageFailedCreateLaporanBerkala !== 'undefined') {
		Swal.fire(
			'Error!',
			messageFailedCreateLaporanBerkala,
			'error'
		)
    }
    if (typeof messageSuccessCreateLaporanBerkala !== 'undefined') {
		Swal.fire(
			'Berhasil!',
			messageSuccessCreateLaporanBerkala,
			'success'
		)
	}
    autosize($('textarea'));
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
            if ($(this).parent().next()) {
                $(this).parent().next().remove()
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
    
});