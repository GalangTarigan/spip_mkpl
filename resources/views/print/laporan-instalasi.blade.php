<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="https://www.nakulasadewa.com/wp-content/uploads/2017/08/KiosK-Mesin-Antrian.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link type="text/css" href="{{ asset('fonts/font-awesome/css/all.css') }}" rel="stylesheet" />-->
    <link type="text/css" href="{{asset('css/print.css')}}" rel="stylesheet">
    <!-- Load site level scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script type="text/javascript" src="{{asset('plugins/moment/moment-with-locales.js')}}"></script>
    <script type="text/javascript" src="{{asset('demo/demo-print-laporanInstalasi.js')}}"></script>
    <link type="text/css" href="{{ asset('fonts/font-awesome/css/all.css') }}" rel="stylesheet" />
</head>

<body>
  <script>
    var dataLaporan = {!! json_encode($laporan)!!};
    var dataInstansi = {!! json_encode($instansi)!!};
    var dataPic = {!! json_encode($daftar_pic)!!};
    var dataLaporanBerkala = {!! json_encode($laporan_berkala)!!};
    var dataLaporanTraining = {!! json_encode($laporan_training)!!};
  </script>
  
      <div class="page-header" style="text-align: center">
        </div>
      <div class="page-footer">
        </div>
    <div class="container">
      <div class="heading" style="text-align: center">
        <h4>Laporan Instalasi</h4>
      </div>
      <hr>
    <table class="table table-borderless">
      <tbody class="tb1">
      </tbody>
    </table>
    <table class="table page-break">
      @if(count($laporan_berkala) == 0)
      <thead><th>Laporan Berkala</th><td> - </td></thead>
      @else
      <thead><th colspan="5">Laporan Berkala</th></thead>
        <thead class="thead-light">
            <tr>
              <th class="width5" scope="col">#</th>
              <th class="width15" scope="col">Subjek</th>
              <th class="width15" scope="col">Tanggal</th>
              <th class="width30" scope="col">Permasalahan</th>
              <th class="width30" scope="col">Solusi</th>
            </tr>
          </thead>
        <tbody class="tb2">
        </tbody>
      @endif
    </table>
    <hr>
    <table class="table table-borderless">
        <tbody class="tb3">
            <tr>
                  <tr>
                    <th class="width15" rowspan="3">Laporan Training</th>
                    <th class="width20">Waktu Mulai Training</th>
                      <td class="width65" id="waktu_mulai_t"></td>
                  </tr>
                  <tr>
                      <th class="width20" >Waktu Selesai Training</th>
                      <td class="width65" id="waktu_selesai_t"></td>
                    </tr>
                    <tr>
                        <th class="width20">Informasi Tambahan</th>
                        <td class="width65" id="informasi_t"></td>
                    </tr>
            </tr>
        </tbody>
      </table>
    
  </div>
</body>
<script>
 window.print()
</script>

</html>