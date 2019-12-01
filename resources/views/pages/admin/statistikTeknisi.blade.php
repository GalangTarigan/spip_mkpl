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
        .b{
            width: 230px;
        }
</style> <!-- for justify data table -->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboardAdmin')}}">Home</a></li>
            <li>Statistik</li>
            <li class="active"><a href="">Teknisi</a></li>
        </ol>
        <div class="page-heading">
            <h1>Statistik Teknisi</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Statistik Seluruh Teknisi</h2>
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
                                            <th>Nama Teknisi</th>
                                            <th class="b">Proyek Yang Selesai Dikerjakan</th>
                                            <th class="b">Rata-Rata Durasi Instalasi</th>
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
<script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootbox/bootbox.js')}}"></script> <!-- Bootbox -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>
<script type="text/javascript" src="{{asset('demo/demo-statistik-teknisi.js')}}"></script>
@stop