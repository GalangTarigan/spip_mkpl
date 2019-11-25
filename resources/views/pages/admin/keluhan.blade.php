@extends('layout.indexOfAdmin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}"> <!-- DateRangePicker -->
<style> 
    th {
        text-align: center;
    }  
    td {
        text-align: center;
    }
</style> <!-- for justify data table -->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active"><a href="">Keluhan</a></li>
        </ol>
        <div class="page-heading">
            <h1>Daftar Keluhan</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Daftar Keluhan proyek</h2>
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
                                        <div id="errorLoading" class="text-center" style="display: none">
                                        </div>
                                        <div id="errorLoading" class="text-center" style="display: none">
                                        </div>
                                        <div class="table-responsive">
                                    <table id="table" class="table table-hover"
                                            cellspacing="0" width="100%" style="display: none;">
                                    <thead>
                                            <div class="clearfix mb-md">
                                            <button class="btn btn-default pull-left" id="daterangepicker_daftarProyek">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <span class="hidden-xs" style="text-transform: uppercase;"></span>&nbsp;<i class="fas fa-angle-down"></i></button>
                                                    <input id="date_start" name="date_start" hidden type="text">
                                            </div>
                                         <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Subject Keluhan</th>                                            
                                            <th>Waktu lapor keluhan</th>
                                            <th>Waktu Selesai Penanganan</th>
                                        </tr>
                                    </thead>
                                    </table>
                                </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Daftar Keluhan Proyek Instansi Per Tahun</h2>
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div class="panel-body">
                                    <div id="myspinner" class="text-center" style="display: none">
                                            <div class="spinner-border text-info" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div id="errorLoading" class="text-center" style="display: none"></div>
                                <table id="mytable" class="table table-hover" cellspacing="0"
                                    width="100%" style="display:none">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>                                     
                                            <th>Tahun Lapor Keluhan</th>
                                            <th>Jumlah Keluhan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')
<!-- Load page level scripts data tables-->
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>     				<!-- Date Range Picker -->

<script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('demo/demo-daftarKeluhan.js')}}"></script>
@stop