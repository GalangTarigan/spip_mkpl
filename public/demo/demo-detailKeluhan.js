$(function(){
    if (typeof waktu_lapor !== 'undefined') {
		$('#waktu-lapor').html(moment(waktu_lapor, 'YYYY-MM-DD HH:mm', 'id').format("dddd, D MMMM YYYY - HH:mm") + ' WIB')
    }
    if(typeof waktu_selesai_p !== 'undefined'){
        $('#waktu-selesai-p').html(moment(waktu_selesai_p, 'YYYY-MM-DD HH:mm', 'id').format("dddd, D MMMM YYYY - HH:mm") + ' WIB')
    }
})