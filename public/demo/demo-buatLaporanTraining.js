$(function () {

	//alert if report failed to create
	if (typeof error_failed !== 'undefined') {
		Swal.fire(
			'Error!',
			error_failed,
			'error'
		)
	}


	// Autogrow Textarea
	autosize($('textarea'));
	//Token_CSRF
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
			$(this).parent().next().not('br').not('#progressBar-video').remove()
		})
	})
	//daterangepicker
	$('#date-rangepicker-training').css('cursor', 'pointer')
	$('#date-rangepicker-training').daterangepicker({
		autoUpdateInput: true,
		timePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 1,
		maxDate: moment(),
		locale: {
			format: 'DD/MM/YYYY HH:mm'
		}

	});
	$('#date-rangepicker-training').on('apply.daterangepicker', function (ev, picker) {
		//Apply changes to input field waktu mulai training
		$('input[name="waktuMulaiTraining"]').val(picker.startDate.format(picker.locale.format))
		$('input[name="waktuMulaiTraining"]').addClass('has-val')
		$('input[name="waktuMulaiTraining"]').parsley().validate()

		//Apply changes to input field waktu selesai training
		$('input[name="waktuSelesaiTraining"]').val(picker.endDate.format(picker.locale.format))
		$('input[name="waktuSelesaiTraining"]').addClass('has-val')
		$('input[name="waktuSelesaiTraining"]').parsley().validate()
	});

	//field mask
	$('.mask').inputmask()
	$('input[name="waktuMulaiTraining"]').inputmask({ alias: 'datetime', inputFormat: "dd/mm/yyyy HH:MM" })
	$('input[name="waktuSelesaiTraining"]').inputmask({ alias: 'datetime', inputFormat: "dd/mm/yyyy HH:MM" })
	
	//Video and images upload prerequisites
	var error_msg = []
	const extensionLists = {}; //Create an object for all extension lists
	extensionLists.video = ['m4v', 'avi', 'mpg', 'mp4', 'webm', 'mov', 'wmv ', '3gp', 'ts', 'm3u8', 'flv'];
	extensionLists.image = ['jpg', 'gif', 'bmp', 'png', 'jpeg'];
	
	// One validation function for all file types    
	function isValidFileType(fName, fType) {
		return extensionLists[fType].indexOf(fName.split('.').pop().toLowerCase()) > -1;
	}

	//Image upload
	disableInputImage(counter)
	var uploader = $('input[name="images[]"]')
	var images = $('.images_prev')
	$(".images_prev .pic").on('click', function () {
		uploader.click()
	})
	//check whether users browser support upload file or not
	if (window.File && window.FileList && window.FileReader) {
		uploader.on('change', function (e) {
			var files = e.target.files
			if (files.length > 15) {
				Swal.fire(
					'Warning!',
					'Jumlah Foto Maksimal 15',
					'warning'
				)
				disableInputImage(counter)
			} else if(files.length <= 15){
				event.preventDefault()
				if (!validateImagesInput(uploader)) {
					var msg = ''
					$.each(error_msg, function (key, val) {
					msg += val
					})
					Swal.fire(
					'Error!',
					msg,
					'error'
					)
					return false
				}
				uploadImages(files)
				counter += files.length
				disableInputImage(counter)
			}

		})
	} else {
		Swal.fire(
			'Error!',
			'Browser anda tidak support File API',
			'error'
		)
	}
	//Image file validation
	function validateImagesInput(input) {
		error_msg = []
		var result 
		for (let i = 0; i < input[0].files.length; i++) {
			if (input[0].files[i].size >= (1024 * 1024 * 3)) {
				if (!isValidFileType(input[0].files[i].name, 'image')) error_msg.push('Format file tidak didukung')
				error_msg.push('Ukuran file terlalu besar, maksimal 3MB per-file. ')
				return false
			} else if (!isValidFileType(input[0].files[i].name, 'image')) {
				error_msg.push('Format file tidak didukung. ')
				return false
			} else {
				result =  true
			}
		}
		return result
	}
	//upload files
	function uploadImages(files) {
		let image_upload = new FormData()
		for (let i = 0; i < files.length; i++) {
			image_upload.append('images[]', files[i])
		}
		image_upload.append('_token', token)
		$.ajax({
			xhr: function () {
				var xhr = new window.XMLHttpRequest();

				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentComplete = evt.loaded / evt.total;
						percentComplete = parseInt(percentComplete * 100);
						//console.log(percentComplete);
						$(".images_prev .pic i").removeClass('fa-plus').addClass('fa-circle-notch fa-spin')
						if (percentComplete === 100) {
							$(".images_prev .pic i").removeClass('fa-circle-notch fa-spin').addClass('fa-plus')
						}

					}
				}, false);

				return xhr;
			},
			url: '/dokumentasi/foto/upload-foto',
			type: 'post',
			data: image_upload,
			processData: false,
			contentType: false,
			success: function (data) {
				if (data['success']) {
					Swal.fire(
						'Berhasil!',
						'Foto berhasil ditambahkan',
						'success'
					)
					uuid = data['data']
					data['data'].forEach(element => {
						render(element)
					});
				} else {
					Swal.fire(
						'Error!',
						data['data'],
						'error'
					)
					counter -= files.length
					disableInputImage(counter)
				}

			},
			error: function (data) {
				var msg = data['responseJSON']['errors']
				var error_msg = ''
				$.each(msg, function (index, element) {
					error_msg += element[0] + ' ~ '
				})
				Swal.fire(
					'Error!',
					error_msg,
					'error'
				)
			}
		})
	}


	//function upload video
	disableVideoInput(counter_v)
	var ajaxReq
	var uploader_video = $('input[name="video"]')

	$('.video-browse').click(function () {
		uploader_video.click()
	})
	uploader_video.change(function () {
		if ($(this)[0].files[0] != null) {
			if (!validateVideoInput(uploader_video)) {
				var msg = ''
				$.each(error_msg, function (key, val) {
					msg += val
				})
				Swal.fire(
					'Error!',
					msg,
					'error'
				)
				$(this).val('')
				$('input[name="filename-video').val('')
				return false
			}
			var filename = $(this)[0].files[0].name
			$('input[name="filename-video').val(filename)
			$('input[name="filename-video').addClass('has-val');
		} else {
			$('input[name="filename-video').val('')
			$('input[name="filename-video').removeClass('has-val');
		}
	})
	$('.video-action-btn').click(function () {
		if (counter_v >= 1) {
			Swal.fire({
				text: 'Apakah anda yakin akan menghapus video yang telah terupload ?',
				type: 'warning',
				confirmButtonText: 'Ya',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: '/dokumentasi/video/delete-video',
						type: 'post',
						data: {
							_token: token
						},
						success: function (data) {
							if (data['success']) {
								Swal.fire(
									'Berhasil!',
									data['data'],
									'success'
								)
								uploader_video.val('')
								counter_v--
								disableVideoInput(counter_v)
							} else {
								Swal.fire(
									'Error!',
									data['data'],
									'error'
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
				}
			})
		} else {

			if (uploader_video[0].files[0] != null) {
				let video_upload = new FormData()
				video_upload.append('video', uploader_video[0].files[0])
				video_upload.append('_token', token)
				var bar
				ajaxReq = $.ajax({
					beforeSend: function () {
						//progress bar
						bar = new ldBar("#progressBar-video", {
							"stroke": "data:ldbar/res,gradient(0,1, #21d4fd, #72031B)",
							"aspect-ratio": "none"
						})
						$('#progressBar-video').fadeIn(200)
						$('.video-upload-cancel').fadeIn(200)
						$('.video-action-btn').fadeOut(200)
					},
					xhr: function () {
						var xhr = new window.XMLHttpRequest();
						xhr.upload.addEventListener("progress", function (evt) {
							if (evt.lengthComputable) {
								var percentComplete = evt.loaded / evt.total;
								percentComplete = parseInt(percentComplete * 100);
								//console.log(percentComplete);
								bar.set(percentComplete)
								if (percentComplete == 100) $('.video-upload-cancel').fadeOut('slow')
							}
						}, false);

						return xhr;
					},
					url: '/dokumentasi/video/upload-video',
					type: 'post',
					data: video_upload,
					processData: false,
					contentType: false,
					success: function (data) {
						$('.video-action-btn').fadeIn(200)
						if (data['success']) {
							$('#progressBar-video').fadeOut('slow')
							Swal.fire(
								'Berhasil!',
								'Video berhasil ditambahkan',
								'success'
							)
							counter_v++
							disableVideoInput(counter_v)
						} else {
							$('#progressBar-video').fadeOut('slow')
							Swal.fire(
								'Error!',
								data['data'],
								'error'
							)
						}
					},
					error: function (data) {
						$('.video-action-btn').fadeIn(200)
						$('#progressBar-video').fadeOut('slow')
						if (data['responseJSON'] != null) {
							var msg = data['responseJSON']['errors']
							var error_msg = ''
							$.each(msg, function (index, element) {
								error_msg += element[0] + ' ~ '
							})
							Swal.fire(
								'Error!',
								error_msg,
								'error'
							)
						} else if (data['statusText'] == 'abort') {
							Swal.fire(
								'Warning!',
								'Upload dibatalkan',
								'warning'
							)
						} else {
							Swal.fire(
								'Error!',
								'error'
							)
						}

					}
				})
			} else {
				Swal.fire(
					'Error!',
					'Tidak ada file untuk diupload',
					'error'
				)
			}
		}
	})


	//validate video input, return boolean
	function validateVideoInput(selector) {
		error_msg = []
		if (selector[0].files[0].size >= (1024 * 1024 * 100)) {
			if (!isValidFileType(selector.val(), 'video')) error_msg.push('Format file tidak didukung')
			error_msg.push('Ukuran file terlalu besar, maksimal 100MB. ')
			return false
		} else if (!isValidFileType(selector.val(), 'video')) {
			error_msg.push('Format file tidak didukung. ')
			return false
		} else {
			return true
		}

	}
	//abort upload video process
	$('.video-upload-cancel').click(function () {
		if (ajaxReq) {
			ajaxReq.abort()
			$('#progressBar-video').fadeOut('slow')
			$('.video-upload-cancel').fadeOut('slow')
		}
	})

	//disable video input
	function disableVideoInput(count) {
		var first_btn = $('.vid .wrap-input100 span:first-child')
		var input_info = $('.vid .wrap-input100 input')
		var second_btn = $('.vid .wrap-input100 span:nth-child(4)')
		if (count >= 1) {
			first_btn.html('<i class="fas fa-check"></i>')
			input_info.val('Video sudah terupload')
			second_btn.html('<i class="fas fa-trash-alt"></i>')
			second_btn.removeClass('video-upload').addClass('video-upload-delete')
			$('input[name="video"]').attr('disabled', 'disabled')
			input_info.addClass('has-val');
		} else {
			first_btn.html('Browse')
			input_info.val('')
			second_btn.html('<i class="fas fa-upload"></i>')
			second_btn.removeClass('video-upload-delete').addClass('video-upload')
			$('input[name="video"]').removeAttr('disabled')
		}
	}

	
});
//render preview image
function render(data) {
	var hostname = window.location.origin;
	$('<a onclick="deleteImage(\'' + data + '\',' + 'this' + ')"><div class="img" id="img" style="background-image: url('+ hostname+'/dokumentasi/foto/get-foto/?foto=' + data + ');"><span></span></div></a>').insertBefore($(".images_prev .pic"))
}

//validate image
function validateImage() {

}

//disable input image
function disableInputImage(count) {
	if (count >= 15) {
		$(".images_prev .pic").hide()
		$('input[name="images[]"]').attr('disabled', 'disabled');
	} else {
		$(".images_prev .pic").show()
		$('input[name="images[]"]').removeAttr('disabled')
	}
}

//delete particular image using ajax request
function deleteImage(data, element) {
	var token = $('meta[name="csrf-token"]').attr('content')
	Swal.fire({
		text: 'Apakah anda yakin akan menghapus gambar yang ada pilih ?',
		type: 'warning',
		confirmButtonText: 'Ya',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			console.log(data)
			$.ajax({
				url: '/dokumentasi/foto/delete-foto',
				type: 'post',
				data: {
					_token: token,
					uuid: data
				},
				success: function (data) {
					if (data['success']) {
						Swal.fire(
							'Berhasil!',
							data['data'],
							'success'
						)
						counter--
						element.remove()
						disableInputImage(counter)
					} else {
						Swal.fire(
							'Error!',
							data['data'],
							'error'
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

		}
	})

}



