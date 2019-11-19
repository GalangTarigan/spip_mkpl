@extends('layout.indexOfAdmin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}" />
<style> 
        th {
            text-align: center;
        }  
        td {
            text-align: center;
        }
        .a{
            width: 30px;
        }
</style> <!-- for justify data table -->
@stop
@section('content')
<script>
var kota = {!! json_encode($kota)!!};
</script>
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboardAdmin')}}">Home</a></li>
            <li>Statistik</li>
            <li><a href="{{route('proyek')}}">Proyek</a></li>
            <li class="active"><a href="">Detail Proyek</a></li>
        </ol>
        <div class="page-heading">
            <h1>Detail Proyek</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel">
                        <div class="panel-heading">
                            <h2>Statistik Instalasi Proyek Selesai : {{$kota}}</h2>
                        </div>
                        <div class="panel-body">
                            <canvas id="bar-chart" height="200" width="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>    
        </div> <!-- .container-fluid -->        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Daftar Proyek : {{$kota}}</h2>
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div class="panel-body">
                                <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th class="a">No</th>
                                            <th>Nama Instansi</th>
                                            <th>Nama Teknisi</th>
                                            <th>Alamat</th>
                                            <th>Waktu Selesai Proyek</th>
                                            <th>Nama PIC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')

<!-- Load page level scripts data tables-->
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>
<!-- load page leve scripts chart -->
<script type="text/javascript" src="{{asset('plugins/charts-chartjs/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootbox/bootbox.js')}}"></script> <!-- Bootbox -->
<!-- Button -->
<script type="text/javascript" src="{{asset('demo/demo-detail-proyek.js')}}"></script>
@stop