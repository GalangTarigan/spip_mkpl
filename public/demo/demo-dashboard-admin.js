$(function () {
    let token = $('meta[name="csrf-token"]').attr('content')
    $('#daterangepicker_dashboard').daterangepicker({
        ranges: {
            'Tahun Ini': [moment().subtract(0, 'year'), moment()],
            '1 tahun lalu': [moment().subtract(1, 'year'), moment()],
            '2 tahun lalu': [moment().subtract(2, 'year'), moment()],
            '3 tahun lalu': [moment().subtract(3, 'year'), moment()],
             },
        locale: {
            "customRangeLabel": "Tahun",
          },
    });

    $('#daterangepicker_dashboard').on('apply.daterangepicker', function (ev, picker) {
        $('#daterangepicker_dashboard span').html(picker.startDate.locale('id').format('YYYY') );
        $('input[name="date_start"]').val(picker.startDate.format('YYYY'))
        window.location = "/admin/dashboard?tahun="+$('input[name="date_start"]').val();
        
    })

})