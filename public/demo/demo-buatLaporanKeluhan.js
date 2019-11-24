$(function () {
        
    // Autogrow Textarea
    autosize(document.querySelectorAll('textarea'));
    var token = $('meta[name="csrf-token"]').attr('content')
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
            if ($(this).parent().next()) {
                $(this).parent().next().remove()
            }
        })
    })
    $('select').each(function(){
		$(this).on('change', function () {
			if ($(this).hasClass('is-invalid') && $(this).val() != "") {
				if($(this).next().is('span')) $(this).next().remove()
			}else{
				$(this).parsley().validate()
			}
		})
    })
    
    //select2
    //Initialize select2 instansi
    $("#select2_k_instansi").select2({
        width: '100%',
        placeholder: "Pilih Instansi",
        containerCssClass: 'tpx-select2-container select2-container',
        dropdownCssClass: 'tpx-select2-drop',
        allowClear: true
    });
    //Initialize select2 pelapor
    $("#select2_k_pelapor").select2({
        width: '100%',
        placeholder: "Pilih Nama Pelapor",
        containerCssClass: 'tpx-select2-container select2-container',
        dropdownCssClass: 'tpx-select2-drop',
        allowClear: true
    });
    //Initialize select2 subjek
    $("#select2_k_subjek").select2({
        width: '100%',
        placeholder: "Pilih Subjek Keluhan",
        containerCssClass: 'tpx-select2-container select2-container',
        dropdownCssClass: 'tpx-select2-drop',
        allowClear: true
    });
    //Initializing options value select2 instansi 
    $.ajax({
        url: '/instansi/daftar-instansi',
        type: 'post',
        data: {
            _token: token
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data['instansi'], function (key, val) {
                var temp = val.laporan_instalasi.slice(-1)[0];
                let uuid = []
                $.each(val.laporan_instalasi, function(key, val2){
                    uuid.push(val2.uuid)
                })
                $("#select2_k_instansi").append('<option date="' + temp.waktu_selesai + '" report="' + uuid + '" value="' + val.id_instansi + '">' + val.nama_instansi + '</option>')
            })
            $("#loadingIcon1").hide()
            //set value to select2 option if its has old value
            if((typeof oldValI !== 'undefined')){
                $("#select2_k_instansi").val(oldValI).trigger('change')
            }
        },
        error: function (request, status, error) {
            $('<span class="text-danger"><div class="parsley-required">Data tidak dapat dimuat, harap refresh halaman</div></span>').insertAfter('#select2_k_instansi');
        }
    });

    //Initializing options value select2 pic when select2 on change events occur
    $("#select2_k_instansi").on('change', function () {
        $("#loadingIcon2").show()
        var id_instansi = $(this).val()
        if ($(this).val() != "") {
            var report = $('#select2_k_instansi option:selected').attr('report').split(',')
            var date = $('#select2_k_instansi option:selected').attr('date')
            $('.link-wrapper').html('')
            $.each(report, function(key, val){
                $('<a style="display:inline-block; padding:0px 3px" href=/daftar-proyek-instalasi/detail-proyek?laporan=' + val + ' target="_blank" class="btn-link"><div class="parsley-required">Lihat Laporan</div></a> ').appendTo($('.link-wrapper'))
            })
            $('#date-rangepicker-keluhan1').data('daterangepicker').setMinDate(moment(date, "YYYY-MM-DD HH:mm").add(1, 'minutes'))
            if($("#select2_k_instansi").next().is('span')) $("#select2_k_instansi").next().remove()

        } else {
            $('#date-rangepicker-keluhan1').data('daterangepicker').setMinDate('none')
            $('#date-rangepicker-keluhan2').data('daterangepicker').setMinDate('none')
            $('input[name="waktuLapor"]').val('');
            $('input[name="waktuLapor"]').removeClass('has-val')
            $('input[name="waktuSelesaiPenanganan"]').val('');
            $('input[name="waktuSelesaiPenanganan"]').removeClass('has-val')
            $("#select2_k_pelapor").val(null).trigger('change')
            $('.link-wrapper').html('')
        }
        if (id_instansi == "") {
            $("#select2_k_pelapor").html('<option></option>')
            $("#loadingIcon2").hide()
        } else {
            $.ajax({
                url: '/instansi/daftar-pic',
                type: 'post',
                data: {
                    _token: token,
                    id_instansi: id_instansi
                },
                dataType: 'json',
                success: function (data) {
                    $("#select2_k_pelapor").html('<option></option>')
                    $.each(data['pic'], function (key, val) {
                        $("#select2_k_pelapor").append('<option value="' + val.id_pic + '">' + val.nama_pic + '</option>')
                    })
                    $("#loadingIcon2").hide()
                    //set value to select2 option if its has old value
                    if((typeof oldValP !== 'undefined')){
                        $("#select2_k_pelapor").val(oldValP).trigger('change')
                    }
                },
                error: function (request, status, error) {
                    $('<span class="text-danger"><div class="parsley-required">Data tidak dapat dimuat, harap refresh halaman</div></span>').insertAfter('#select2_k_pelapor');
                }
            });
        }
    })
    $("#select2_k_pelapor").on('change', function () {
        if ($(this).hasClass('is-invalid') && $(this).val() != "") {
            if($("#select2_k_pelapor").next().is('span')) $("#select2_k_pelapor").next().remove()
        }
    })
    $("#select2_k_subjek").on('change', function () {
        if ($(this).hasClass('is-invalid') && $(this).val() != "") {
            if($("#select2_k_subjek").next().is('span')) $("#select2_k_subjek").next().remove()
        }
    })
    
    //Initializing options value select2 subjek keluhan 
    $.ajax({
        url: '/laporan-keluhan/subjek-keluhan/data',
        type: 'post',
        data: {
            _token: token
        },
        dataType: 'json',
        success: function (data) {
            $.each(data['data'], function (key, val) {
                $("#select2_k_subjek").append('<option value="' + val.id_subjek + '">' + val.nama_subjek + '</option>')
            })
            $("#loadingIcon3").hide()
            if((typeof oldValS !== 'undefined')){
                $("#select2_k_subjek").val(oldValS).trigger('change')
            }
        },
        error: function (request, status, error) {
            $('<span class="text-danger"><div class="parsley-required">Data tidak dapat dimuat, harap refresh halaman</div></span>').insertAfter('#select2_k_subjek');
        }
    });



    //Initialize datetime mask
    $('input[name="waktuLapor"]').inputmask({ alias: 'datetime', inputFormat: "dd/mm/yyyy HH:MM" }, { showMaskOnHover: false })
    $('input[name="waktuSelesaiPenanganan"]').inputmask({ alias: 'datetime', inputFormat: "dd/mm/yyyy HH:MM" }, { showMaskOnHover: false })

    //daterangepicker
    $('#date-rangepicker-keluhan1').daterangepicker({
        autoUpdateInput: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 1,
        singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY HH:mm',
            cancelLabel: 'Clear'
        }

    });
    $('#date-rangepicker-keluhan1').on('apply.daterangepicker', function (ev, picker) {
        if ($('#select2_k_instansi').val() != "") {
            $('input[name="waktuLapor"]').val(picker.startDate.format(picker.locale.format));
            $('#date-rangepicker-keluhan2').data('daterangepicker').setMinDate(moment($('input[name="waktuLapor"]').val(), "DD/MM/YYYY HH:mm").add(1, 'minutes'))
            $('input[name="waktuLapor"]').addClass('has-val');
            if ($('input[name="waktuLapor"]').parent().next()) {
                $(this).parent().next().remove()
            }
        } else {
            Swal.fire(
                'Info!',
                'Harap pilih instansi terlebih dahulu',
                'info'
            )
        }

        //$('input[name="waktuLapor"]').parsley().validate();
    });
    $('#date-rangepicker-keluhan1').on('cancel.daterangepicker', function (ev, picker) {
        $('#date-rangepicker-keluhan2').data('daterangepicker').setMinDate('none')
        $('input[name="waktuLapor"]').val('');
        $('input[name="waktuLapor"]').removeClass('has-val');
        $('input[name="waktuSelesaiPenanganan"]').val('');
    });
    $('#date-rangepicker-keluhan2').daterangepicker({
        autoUpdateInput: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 1,
        singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY HH:mm',
            cancelLabel: 'Clear'
        }

    });
    $('#date-rangepicker-keluhan2').on('apply.daterangepicker', function (ev, picker) {
        if ($('input[name="waktuLapor"]').val() == "") {
            Swal.fire(
                'Info!',
                'Harap masukkan waktu lapor terlebih dahulu',
                'info'
            )
        } else {
            $('input[name="waktuSelesaiPenanganan"]').val(picker.startDate.format(picker.locale.format));
            $('input[name="waktuSelesaiPenanganan"]').addClass('has-val');
            if ($('input[name="waktuSelesaiPenanganan"]').parent().next()) {
                $(this).parent().next().remove()
            }
        }
        //$('input[name="waktuLapor"]').parsley().validate();
    });
    $('#date-rangepicker-keluhan2').on('cancel.daterangepicker', function (ev, picker) {
        $('input[name="waktuSelesaiPenanganan"]').val('');
        $('input[name="waktuSelesaiPenanganan"]').removeClass('has-val');
    });

    //field mask
    $('.mask').inputmask();

    //validate
    $('#validate-form #submit').on('click', function () {
        $('#validate-form').parsley().validate();
    });
    $('select').parsley({
		successClass: "select2-success",
		errorClass: "select2-error",
		classHandler: function (el) {
			return el.$element.parent().find('.select2-container')
		}
	})
});
