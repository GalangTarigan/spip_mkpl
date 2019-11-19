$(function () {
    var hostname = window.location.origin;
    var Date_start, Date_finished, status
    $.each(dataLaporan, function (key, val) {
        switch (key) {
            case 'user_nama':
                $('#nama-teknisi').text(val)
                break;
            case 'waktu_mulai':
                let date_start = moment(val, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY")
                let time_start = moment(val, 'YYYY-MM-DD HH:mm:ss', 'id').format("HH:mm") + " WIB"
                Date_start = moment(val).utc("+07:00")
                $('#tanggal-mulai').text(date_start)
                $('#waktu-mulai').text(time_start)
                $('#waktu-mulai').prepend('<i class="far fa-clock"></i> ')
                break
            case 'waktu_selesai':
                if (val == null) {
                    $('#tanggal-selesai').parent().hide()
                    $('#waktu-selesai').parent().hide()
                } else {
                    let date_finished = moment(val, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY")
                    let time_finished = moment(val, 'YYYY-MM-DD HH:mm:ss', 'id').format("HH:mm") + " WIB"
                    Date_finished = moment(val).utc("+07:00")
                    $('<hr class="hr-divider">').insertBefore($('#tanggal-selesai').parent())
                    $('#tanggal-selesai').text(date_finished)
                    $('#waktu-selesai').text(time_finished)
                    $('#waktu-selesai').prepend('<i class="far fa-clock"></i> ')
                }
                break
            case 'status': status = val
                break
        }
    })
    if (status == "Selesai") {
        $('#status-').prepend('<i class="fa fa-fw fa-check"></i>')
        $('#status').addClass('badge-success')
        $('#status').text(status)
    } else {
        $('#status-').prepend('<i class="fas fa-spinner fa-spin"></i>')
        $('#status').addClass('badge-primary')
        $('#status').text(status)
    }

    $.each(dataInstansi, function (key, val) {
        switch (key) {
            case 'nama_instansi': $('#nama-instansi').text(val)
                break
            case 'kategori': $('#kategori-instansi').text(val)
                break
            case 'alamat_instansi': $('#alamat').text(val)
                break
            case 'provinsi': $('#provinsi').text(val)
                break
            case 'kabupaten_kota': $('#kota').text(val)
                break
            case 'email':
                if (val == null) {
                    $('#email').text('-')
                } else {
                    $('#email').text(val)
                }
                break
            case 'no_telepon':
                if (val == null) {
                    $('#no-telepon').text('-')
                } else {
                    $('#no-telepon').text(val)
                }
                break
        }
    })
    $.each(dataPic, function (key, val) {
        if (key != dataPic.length - 1) {
            $('#daftarPic').append('<a href="#" class="inbox-menu-item">Nama<span>' + val.nama_pic + '</span></a><a href="#" class="inbox-menu-item">No Telepon<span>' + val.kontak_pic + '</span></a><hr class="hr-divider">')
        } else {
            $('#daftarPic').append('<a href="#" class="inbox-menu-item">Nama<span>' + val.nama_pic + '</span></a><a href="#" class="inbox-menu-item">No Telepon<span>' + val.kontak_pic + '</span></a>')
        }

    })
    createTimeline(dataLaporan, dataLaporanBerkala, dataLaporanTraining, dokumentasi_instalasi)
    function createTimeline(laporanInstalasi, laporanBerkala, laporanTraining, dokumentasi) {
        let date = moment(laporanInstalasi.waktu_mulai, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
        $('.scroll-content .timeline').prepend('<li class="timeline-primary"><div class="timeline-icon"><i class="far fa-flag"></i></div><div class="timeline-body"><div class="timeline-header"><span class="date">' + date + '</span></div><div class="timeline-content"><h4>Proyek Dimulai</h4></div></div></li> ')
        renderLaporanBerkala(laporanBerkala)
        renderLaporanTraining(laporanTraining)
        renderLaporanDokumentasi(dokumentasi)
        if (laporanInstalasi.status == "Selesai") {
            let date = moment(laporanInstalasi.waktu_selesai, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
            $('.scroll-content .timeline').prepend('<li class="timeline-success"><div class="timeline-icon"><i class="fas fa-check"></i></div><div class="timeline-body"><div class="timeline-header"><span class="date">' + date + '</span></div><div class="timeline-content"><h4>Proyek Selesai</h4></div></div></li> ')

        }
    }
    function renderLaporanDokumentasi(data) {
        if (data.length == 0) return
        let date = moment(dataLaporan.waktu_selesai, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
        $('.scroll-content .timeline').prepend('<li class="timeline-orange"><div class="timeline-icon"><i class="fas fa-camera"></i></div><div class="timeline-body"><div class="timeline-header"><span class="date">' + date + '</span></div><div class="timeline-content"><h4>Dokumentasi</h4><p><strong class="text-info">Foto</strong></p><div class="images_prev"></div><p style="margin-top: 24px"><strong class="text-info video-insertAfter">Video</strong></p></div></div></li> ')
        $.each(data, function(key, val){
            if(val.keterangan == "foto") $('.images_prev').append('<a onclick="imageNewTab(\'' + val.uuid + '\')"><div class="img" style="background-image:url('+hostname+'/dokumentasi/foto/get-foto/?foto=' + val.uuid + ')"><span></span></div></a>')
            if(val.keterangan == "video") $('<br><button data-uri="'+val.uuid+'" class="btn btn-primary-alt btn-label" id="download-video-btn" style="width:120px; margin-top: 10px"><i class="fa fa-arrow-circle-down"></i> Download</button>').insertAfter($('.video-insertAfter'))
        })
    }
    function renderLaporanBerkala(data) {
        if (data.length == 0) return
        $.each(data, function (key, val) {
            let date = moment(val.created_at, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
            let content = val.isi_laporan.split(';+;')
            $('.scroll-content .timeline').prepend('<li class="timeline-midnightblue"><div class="timeline-icon"><i class="fa fa-file-contract"></i> </div><div class="timeline-body"><div class="timeline-header"><span class="date">' + date +'</span></div><div class="timeline-content"><h4>Subjek : ' + val.subjek + '</h4><p><div class="collapse" id="collapse_b' + val.id_instalasi_berkala + '"><strong class="text-danger">Masalah</strong></p><p style="margin-top: 5px">' + content[0] + '</p><hr><p><strong class="text-info">Solusi</strong></p><p style="margin-top: 5px">' + content[1] + '</p></div></div><div class="timeline-footer"><a data-target="#collapse_b' + val.id_instalasi_berkala + '" data-toggle="collapse" class="btn-link pull-right">Lihat Detail</a></div></div></li>')
        })
    }
    function renderLaporanTraining(val) {
        if (val == null) return

        let date_created = moment(val.created_at, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
        let date_start = moment(val.waktu_mulai_t, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
        let date_fin = moment(val.waktu_selesai_t, 'YYYY-MM-DD HH:mm:ss', 'id').format("dddd, DD MMMM YYYY - HH:mm")+ " WIB"
        $('.scroll-content .timeline').prepend('<li class="timeline-indigo"><div class="timeline-icon"><i class="fa fa-chalkboard-teacher"></i></div><div class="timeline-body"><div class="timeline-header"><span class="date">' + date_created +  '</span></div><div class="timeline-content"><h4>Laporan Training</h4><div class="collapse" id="collapse_t' + val.id_laporan_training + '"><p><strong class="text-info">Waktu Pelaksanaan Training</strong></p><div class="row"><div class="col-sm-6"><span><strong>Mulai</strong></span></div><div class="col-sm-6"><span>' + date_start + '</span></div><div class="col-sm-6"><span><strong>Selesai</strong></span></div><div class="col-sm-6"><span>' + date_fin + '</span></div></div><hr><p><strong class="text-info">Informasi Tambahan</strong></p><p>' + val.informasi_tambahan + '</p></div></div><div class="timeline-footer"><a data-target="#collapse_t' + val.id_laporan_training + '" data-toggle="collapse" class="btn-link pull-right">Lihat Detail</a></div></div></li>')
    }
    $('#download-video-btn').click(function(){
        var data = $(this).attr('data-uri')
        window.open('/dokumentasi/video/download/?video='+data)
    })
    
})
function imageNewTab(data){
    window.open('/dokumentasi/foto/download/?foto='+data)
}