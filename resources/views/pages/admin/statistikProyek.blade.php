@extends('layout.indexOfAdmin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/charts-chartistjs/chartist.min.css')}}"> <!-- Chartist -->
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
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
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboardAdmin')}}">Home</a></li>
            <li>Statistik</li>
            <li class="active"><a href="">Proyek</a></li>
        </ol>
        <div class="page-heading">
            <h1>Statistik Proyek</h1>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel">
                        <div class="panel-heading">
                            <h2>Statistik Instalasi Proyek</h2>
                        </div>
                        <div class="panel-body" style="padding: 10px 15px">
                                <div class="clearfix mb-md">
                                        <button class="btn btn-default pull-left" id="daterangepicker_daftarProyek">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="hidden-xs" style="text-transform: uppercase;"></span>&nbsp;<i class="fas fa-angle-down"></i></button>
                                                <input id="date_start" name="date_start" hidden type="text">
                                            </div>
                                <div class="text-center" id="msg-info"></div>
                                <div id="spinner" class="text-center" style="display: none">
                                        <div class="spinner-border text-info" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                            <canvas id="bar-chart"></canvas>
                            <input type="text" name="date-start" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Daftar Instalasi Proyek Per Provinsi</h2>
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div class="panel-body">                                
                                    <div id="spinner" class="text-center" style="display: none">
                                            <div class="spinner-border text-info" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                    </div>
                                <table id="table" class="table table-hover" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th class="a">No</th>
                                            <th>Provinsi</th>
                                            <th>Kota / Kabupaten</th>
                                            <th>Jumlah Proyek</th>
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
<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>
<!-- load page leve scripts chart -->
<script type="text/javascript" src="{{asset('plugins/charts-chartjs/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>
<!-- Date Range Picker -->
<script type="text/javascript" src="{{asset('demo/demo-statistik-proyek.js')}}"></script>
@stop