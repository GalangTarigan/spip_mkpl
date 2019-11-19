@extends('layout.index')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}" />
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active"><a href="/daftar-proyek-instalasi">Daftar Proyek Instalasi</a></li>
        </ol>
        <div class="page-heading">
            <h1>Daftar Proyek Instalasi</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Daftar Proyek Instalasi</h2>
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="spinner" class="text-center" style="display: none">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="text-center">
                            </div>
                            <div class="table-responsive">
                                <table id="table" class="table table-hover"
                                    cellspacing="0" width="100%" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Alamat Instalasi</th>
                                            <th>Status</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@if (session('training_report_s'))
   <script>
       var training_report_s = {!! json_encode(session('training_report_s')) !!};
   </script>
   {{session()->forget('training_report_s')}}
@endif
@if(session('installation_report_s'))
    <script>
    var installation_report_s = {!! json_encode(session('installation_report_s')) !!};
    </script>
    {{session()->forget('installation_report_s')}}
@endif
@stop
@section('script')
<!-- Load page level scripts data tables-->
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>


<script type="text/javascript" src="{{asset('demo/demo-daftarProyekInstalasi.js')}}"></script>
@stop