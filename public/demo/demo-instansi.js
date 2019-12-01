$(function () {
	//Token_CSRF
	var token = $('meta[name="csrf-token"]').attr('content')

	$("#table").css("cursor", "pointer")
	$('#spinner').fadeIn()
	$.ajax({
		url: "/instansi/daftar-instansi-semua",
		type: 'post',
		data: {
			"_token": token,
			q: 'instansi'
		},
		dataType: 'json',
		success: function (data) {
			console.log(data);
			$('#spinner').fadeOut(290)
			table = $('#table').DataTable({
				"language": {
					"lengthMenu": "_MENU_"
				},
				"oLanguage": {
					"sEmptyTable": "Tidak ada data untuk ditampilkan"
				},
				serverSide: false,
				data: data['instansi'],
				columns: [
					{ data: null },
					{ data: 'nama_instansi' },
					{ data: 'alamat_instansi' },
					{ data: 'provinsi' },
					{ data: 'kabupaten_kota' },
					{ data: 'email' },
					{ data: 'no_telepon' },
				],
				"lengthChange": false,
				"columnDefs": [
					{
						"render": function (data, type, row) {
							return capital_letter(data)
						},
						"targets": [1, 2, 3, 4]
					},
					{
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
						"targets": 0

					},
					{
						"render": function(data, type, row){
							if(data == null) {
								return '-'
							}else{
								return data
							}
						},
						"className": 'dt-body-center',
						"targets": [5, 6]
					}
				]
			})
			$('#table').fadeIn(300)
		},
		error: function () {
			$('#spinner').fadeOut(209)
			$('#errorLoading').append('<span>Data gagal dimuat, harap refresh ulang halaman</span>')
			$('#errorLoading').fadeIn(209)
		}
	})

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
	$('select').each(function () {
		$(this).on('change', function () {
			if ($(this).hasClass('is-invalid') && $(this).val() != "") {
				if ($(this).next().is('span')) $(this).next().remove()
			} else {
				$(this).parsley().validate()
			}
		})
	})

	//SELECT2
	//initialize select2 office
	$("#select2_k_daftar_instansi").select2({
		width: '100%',
		containerCssClass: 'tpx-select2-container select2-container',
		placeholder: "Pilih Instansi",
		allowClear: true,
	})

	//Initialize select2 categories
	$("#select2_jenis_instansi").select2({
		width: '100%',
		containerCssClass: 'tpx-select2-container select2-container',
		placeholder: "Pilih Jenis Instansi",
		allowClear: true,
	})

	//Initialize select2 provinces
	$("#select2_provinsi").select2({
		width: '100%',
		containerCssClass: 'tpx-select2-container select2-container',
		placeholder: "Pilih Provinsi",
		allowClear: true
	})
	//Initialize select2 regencies
	$("#select2_kota").select2({
		width: '100%',
		containerCssClass: 'tpx-select2-container select2-container',
		placeholder: "Pilih Kota",
		allowClear: true
	});
	//Initializing select2 values categories
	$.ajax({
		url: '/instansi/list-kategori',
		type: 'post',
		data: {
			_token: token
		},
		dataType: 'json',
		success: function (data) {
			$.each(data['data'], function (key, val) {
				$('#select2_jenis_instansi').append('<option value="' + val.id + '">' + val.nama_kategori + '</option>')
			})
			//set value to select2 option if its has old value
			if ((typeof oldValJenisIns !== 'undefined')) {
				$("#select2_jenis_instansi").val(oldValJenisIns).trigger('change')
			}
			$("#loadingIcon1").hide()
		},
		error: function (request, status, error) {
			$("#loadingIcon1").hide()
			$('<span class="text-danger"><div class="parsley-required">Data tidak dapat dimuat, harap refresh halaman</div></span>').insertAfter('#select2_jenis_instansi');

		}
	});

	//Initializing options value select2 provinces
	$.ajax({
		url: '/wilayah-indonesia/provinsi',
		type: 'post',
		data: {
			_token: token,
		},
		dataType: 'json',
		success: function (data) {
			$.each(data['provinces'], function (key, val) {
				$("#select2_provinsi").append('<option value="' + val.id + '">' + val.name + '</option>')
			})
			if ((typeof oldValProv !== 'undefined')) {
				$("#select2_provinsi").val(oldValProv).trigger('change')
			}
			$("#loadingIcon2").hide()
		},
		error: function (request, status, error) {
			$("#loadingIcon1").hide()
			$('<span class="text-danger"><div class="parsley-required">Data tidak dapat dimuat, harap refresh halaman</div></span>').insertAfter('#select2_provinsi');

		}
	});


	//Initializing options value select2 regencies when select2 on change events occur
	$("#select2_provinsi").on('change', function () {
		if ($(this).val() == '') $("#select2_kota").val()
		$("#loadingIcon3").show()
		var id_provinces = $(this).val()
		$.ajax({
			url: '/wilayah-indonesia/kabupaten-kota',
			type: 'post',
			data: {
				_token: token,
				id_provinsi: id_provinces
			},
			dataType: 'json',
			success: function (data) {
				$("#select2_kota").html('<option></option>')
				$.each(data['regencies'], function (key, val) {
					$("#select2_kota").append('<option value="' + val.id + '">' + val.name + '</option>')
				})

				if ((typeof oldValKota !== 'undefined')) {
					$("#select2_kota").val(oldValKota).trigger('change')
				}
				$("#select2_kota").trigger('change')
				$("#loadingIcon3").hide()
			},
			error: function (request, status, error) {
				$("#loadingIcon1").hide()
				$('<span class="text-danger"><div class="parsley-required">Data tidak dapat dimuat, harap refresh halaman</div></span>').insertAfter('#select2_kota');

			}
		});
	})

	//validate
	$('#validate-form #submit').on('click', function () {
		$('#validate-form').parsley().validate()
	})
	$('select').parsley({
		successClass: "select2-success",
		errorClass: "select2-error",
		classHandler: function (el) {
			return el.$element.parent().find('.select2-container')
		}
	})
	$('input[type="number"]').each(function () {
		$(this).on('keyup', function () {
			if ($(this).val().length < 10) $(this).parent().attr('data-validate', 'Min. 10 karakter')
			else if ($(this).val().length > 15) $(this).parent().attr('data-validate', 'Maks. 15 karakter')

			$(this).parsley().validate()
		})

	})



	//daterangepicker
	$('#date-rangepicker').css('cursor', 'pointer')
	$('#date-rangepicker').daterangepicker({
		autoUpdateInput: true,
		timePicker: true,
		singleDatePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 1,
		drops: "up",
		maxDate: moment(),
		locale: {
			format: 'DD/MM/YYYY HH:mm'
		}

	});
	$('#date-rangepicker').on('apply.daterangepicker', function (ev, picker) {
		$('input[name="waktuMulaiInstalasi"]').val(picker.startDate.format(picker.locale.format))
		$('input[name="waktuMulaiInstalasi"]').addClass('has-val')
		$('input[name="waktuMulaiInstalasi"]').parsley().validate()
	});
	$('#date-rangepicker').on('cancel.daterangepicker', function (ev, picker) {
		$('input[name="waktuMulaiInstalasi"]').val('')
		$('input[name="waktuMulaiInstalasi"]').removeClass('has-val')
		$('input[name="waktuMulaiInstalasi"]').parsley().validate()
	});

	//field mask
	$('.mask').inputmask()
	$('input[name="waktuMulaiInstalasi"]').inputmask({ alias: 'datetime', inputFormat: "dd/mm/yyyy HH:MM" }, { showMaskOnHover: false })




	//dynamic fields
	const add_button = $("#add_button")
	const remove_button = $('#remove_button')
	if ((typeof activateFields !== 'undefined')) {
		if (activateFields) activateAdditionalField()
	}
	add_button.click((e) => {
		activateAdditionalField()
	})
	remove_button.click((e) => {
		removeAdditionalField()
	})
	function activateAdditionalField() {
		add_button.attr('disabled', 'disabled').hide()
		$('#after-fields input:nth-child(1)').removeAttr('disabled')
		$('#after-fields-nomorTelepon1').attr('required', true).attr('name', 'nomorTelepon[]')
		$('#after-fields-namaPic1').attr('required', true).attr('name', 'namaPic[]')
		$('#after-fields').fadeIn(300)
		remove_button.removeAttr('disabled').fadeIn(300)
	}
	function removeAdditionalField() {
		remove_button.attr('disabled', 'disabled').hide()
		$('#after-fields input:nth-child(1)').attr('disabled', 'disabled')
		$('#after-fields-nomorTelepon1').attr('required', false).val('').removeAttr('name')
		$('#after-fields-namaPic1').attr('required', false).val('').removeAttr('name')
		$('#after-fields-namaPic1').parent().attr('class', 'wrap-input100')
		$('#after-fields-nomorTelepon1').parent().attr('class', 'wrap-input100')
		$('#after-fields').fadeOut(300)
		add_button.removeAttr('disabled').fadeIn(300)
	}

	// Autogrow Textarea
	autosize(document.querySelectorAll('textarea'))
})

function capital_letter(str) {
	str = str.toLowerCase()
	str = str.split(" ");

	for (let i = 0, x = str.length; i < x; i++) {
		str[i] = str[i][0].toUpperCase() + str[i].substr(1);
	}

	return str.join(" ");
}
