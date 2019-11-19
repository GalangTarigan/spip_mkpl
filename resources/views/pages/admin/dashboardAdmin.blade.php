@extends('layout.indexOfAdmin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}"> <!-- DateRangePicker -->
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active"><a href="{{route('dashboardAdmin')}}">Dashboard</a></li>
        </ol>
        <div class="page-heading">
                <h1>Dashboard</h1>
            </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                        <a class="info-tile tile-midnightblue has-footer" href="{{route('daftar-proyek-instalasi-admin')}}">
                                <div class="tile-heading">
                                    <div class="pull-left">Semua Proyek</div>
                                    <div class="pull-right">
                                        <div id="tileorders" class="sparkline-block"></div>
                                    </div>
                                </div>
                                <div class="tile-body">
                                    <div class="pull-left"><i class="fa fa-tasks"></i></div>
                                    <div class="pull-right">{{$total}}</div>
                                </div>
                                <div class="tile-footer">
                                        <div class="pull-left">Total Semua Proyek</div>
                                </div>
                            </a>
                </div>
                <div class="col-md-4">
                        <a class="info-tile tile-sky has-footer" href="#">
                                <div class="tile-heading">
                                    <div class="pull-left">Dalam Pengerjaan</div>
                                    <div class="pull-right">
                                        <div id="tiletickets" class="sparkline-block"></div>
                                     </div>
                                </div>
                                <div class="tile-body">
                                    <div class="pull-left"><i class="fa fa-spinner fa-spin"></i></div>
                                    <div class="pull-right">{{$onProgress}}</div>
                                </div>
                                <div class="tile-footer">
                                        <div class="pull-left">Total Proyek Dalam Pengerjaan</div>
                                </div>
                        </a>
                </div>
                <div class="col-md-4">
                        <a class="info-tile tile-success has-footer" href="#">
                                <div class="tile-heading">
                                    <div class="pull-left">Selesai</div>
                                    <div class="pull-right">
                                        <div id="tilerevenues" class="sparkline-block"></div>
                                    </div>
                                </div>
                                <div class="tile-body">
                                    <div class="pull-left"><i class="fa fa-check-square"></i></div>
                                    <div class="pull-right">{{$finished}}</div>
                                </div>
                                <div class="tile-footer">
                                    <div class="pull-left">Total proyek yang sudah selesai</div>
                                </div>
                        </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel">
                                <div class="panel-heading">
                                        <h2>Statistik Instalasi Proyek yang sudah Selesai tahun {{$year}}</h2>
                                </div>
                            
                                <div class="panel-body">
                                        <div class="clearfix mb-md">
                                                <button class="btn btn-default pull-left" id="daterangepicker_dashboard">
                                                        <i class="far fa-calendar-alt"></i>
                                                        <span class="hidden-xs" style="text-transform: uppercase;"></span>&nbsp;<i class="fas fa-angle-down"></i>
                                                </button>
                                                    <input id="date_start" name="date_start" hidden type="text">
                                            </div>
                                    <canvas id="bar-chart" height="200" width="600"></canvas>
                                </div>
                            </div>                        
                        </div>
                    </div>
        <!--timeline-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Timeline Proyek Instalasi Yang Sedang Berjalan</h2>
                </div>
                <div  class="panel-body scroll-pane" style="height: 700px;">
                    <div class="scroll-content">
                    <ul class="timeline">
                            @foreach ($datas as $dataTimeline)
                            <li class="timeline-primary">
                                    <div class="timeline-icon"><i class="fa fa-spin fa-spinner"></i>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="timeline-header">
                                            <span class="date">{{$dataTimeline->waktu_mulai}}</span>
                                        </div>
                                        <div class="timeline-content">
                                            <p>Nama Instansi</p>
                                            <h3>{{$dataTimeline->nama_instansi}}</h3>
                                            <p>Nama Teknisi</p>
                                            <h4>{{$dataTimeline->user_nama}}</h4>
                                        </div>
                                        <div class="timeline-footer">
                                        <a href="{{url('/admin/daftar-proyek-instalasi/detail-proyek?laporan='.$dataTimeline->uuid)}}" class="btn-link pull-left">Lihat Detail Proyek</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop   
@section('script')
    <!-- load page leve scripts chart -->
    <script type="text/javascript" src="{{asset('plugins/charts-chartjs/Chart.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('plugins/bootstrap-switch/bootstrap-switch.js')}}"></script> 		<!-- Swith/Toggle Button --> --}}
    {{-- <script type="text/javascript" src="{{asset('demo/demo-switcher.js')}}"></script>                <!--switch button--> --}}
    <script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>     				<!-- Date Range Picker -->
    {{-- <script type="text/javascript" src="{{asset('plugins/form-select2/select2.js')}}"></script>                    			<!-- Advanced Select Boxes --> --}}
    {{-- <script type="text/javascript" src="{{asset('plugins/form-parsley/parsley.js')}}"></script>   --}}
    <script type="text/javascript" src="{{asset('demo/demo-dashboard-admin.js')}}"></script>

<script>
 var ctx = document.getElementById('bar-chart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei',
                     'Juni','Juli','Agustus','September','Oktober','November','Desember'],
            datasets: [{
                data: [
                   <?php 
                        if(isset($data)){
                        echo $data['January'];
                        echo ',';
                        echo $data['February'];
                        echo ',';
                        echo $data['March'];
                        echo ',';
                        echo $data['April'];
                        echo ',';
                        echo $data['May'];
                        echo ',';
                        echo $data['June'];
                        echo ',';
                        echo $data['July'];
                        echo ',';
                        echo $data['August'];
                        echo ',';
                        echo $data['September'];
                        echo ',';
                        echo $data['October'];
                        echo ',';
                        echo $data['November'];
                        echo ',';
                        echo $data['December'];
                        echo ',';
                }
                    ?>
                ],
                backgroundColor: 
                'rgba(54, 162, 235, 1)',
            }]
        },
        options: {
            responsive: 'true',
            scales: {
                yAxes: [{
                    // barThickness:75,
                    ticks: {
                        beginAtZero: true,
                        fontSize: 13,
                        stepSize: 1,
                    }
                    ,
                    scaleLabel: {
                        fontStyle: 'bold',
                        fontSize: 15,
                        display: true,
                        labelString: 'Jumlah'
                    }
                }],
                xAxes: [{
                    // barThickness: 75,
                    ticks:{
                        fontSize: 13,
                    },
                    
                    scaleLabel: {
                        fontStyle: 'bold',
                        fontSize: 15,
                        display: true,
                        labelString: 'Bulan'
                    }
                }]
            },
            legend: {
                display: false,
        }
    }
})
    

</script>
@stop