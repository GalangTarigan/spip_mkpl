@extends('layout.index')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}"/>
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('plugins/full-calendar/core/main.css')}}" rel="stylesheet" />
<link type="text/css" href="{{asset('plugins/full-calendar/daygrid/main.css')}}" rel="stylesheet" />
<link type="text/css" href="{{asset('plugins/full-calendar/timegrid/main.css')}}" rel="stylesheet" />
<!-- DateRangePicker -->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
        </ol>
        <div class="page-heading">
                <h1>Dashboard</h1>
            </div>
        <div class="container-fluid">
            @if($errors->has('failed'))
                <div class="alert alert-dismissable alert-danger">
                        <i class="fa fa-fw fa-times"></i>&nbsp; <strong>{{$errors->first('failed')}} </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                        <a class="info-tile tile-inverse has-footer" href="#">
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
                                        <div class="pull-left">Lihat Semua Proyek</div>
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
                                        <div class="pull-left">Lihat Proyek Dalam Pengerjaan</div>
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
                                    <div class="pull-left">Lihat Proyek Selesai</div>
                                </div>
                        </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                        <div class="panel panel">
                                <div class="panel-heading">
                                        <h2>Durasi Instalasi Setiap Proyek</h2>
                                </div>
                                <div class="panel-body" style="padding: 10px 15px">
                                        <div class="clearfix mb-md">
                                                <button class="btn btn-default pull-left" id="daterangepicker_dashboard">
                                                        <i class="far fa-calendar-alt"></i>
                                                    <span class="hidden-xs" style="text-transform: uppercase;"></span>&nbsp;<i class="fas fa-angle-down"></i></button>
                                                    <input id="date_start" name="date_start" hidden type="text">
                                                    <input id="date_end" name="date_end" hidden type="text">
                                            </div>
                                            <div class="text-center" id="msg-info"></div>
                                            <div id="spinner" class="text-center" style="display: none">
                                                    <div class="spinner-border text-info" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div>
                                            <div class="chart-container" style="position: relative">
                                                    <canvas id="bar-chart"></canvas>
                                            </div>
                                            <input type="text" name="date-start" hidden>
                                </div>
                        </div>
                        
                </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                    <div class="panel panel-default">
                            <div class="panel-heading"></div>
                            <div class="panel-body">                                
                <div id="full-calendar"></div>
                            </div>
                        </div>
            </div>
        </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop   
@section('script')
    <script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/full-calendar/core/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/full-calendar/daygrid/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/full-calendar/timegrid/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/charts-chartjs/Chart.js')}}"></script>
	<script type="text/javascript" src="{{asset('demo/demo-dashboard.js')}}"></script>
@stop