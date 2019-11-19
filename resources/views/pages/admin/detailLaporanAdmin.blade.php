@extends('layout.indexOfAdmin')
@section('css')
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li class="active"><a href="{{route('daftar-proyek-instalasi-admin')}}">Daftar Proyek Instalasi</a></li>
            <li><a href='/'>Proyek Instansi</a></li>

        </ol>
        <div class="page-heading">
            <h1>Detail Proyek Instansi</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4" style="padding-block-end: 24px;">
                    <script type="text/javascript">
                        var dataLaporan = {!! json_encode($laporan)!!};
                        console.log(dataLaporan)
                        var dataInstansi = {!! json_encode($instansi)!!};
                        var dataPic = {!! json_encode($daftar_pic)!!};
                        var dataLaporanBerkala = {!! json_encode($laporan_berkala)!!};
                        var dataLaporanTraining = {!! json_encode($laporan_training)!!};
                        var dokumentasi_instalasi = {!! json_encode($dokumentasi_instalasi)!!};
                    </script>
                    <div class="inbox-menu mt-lg" style="margin-top: 0px !important;">
                            <div class="collapsible-menu">
                                    <span class="inbox-leftbar-category clearfix">
                                        <a href="javascript:;" data-toggle="collapse" data-target="#folders"
                                            class="category-heading"><i class="fas fa-user-alt"></i> Teknisi</a>
                                    </span>
                                    <a href="#" class="inbox-menu-item">Nama Teknisi<span id="nama-teknisi"></span></a>
                            </div>
                        <div class="collapsible-menu">
                            <span class="inbox-leftbar-category clearfix">
                                <a href="javascript:;" data-toggle="collapse" data-target="#folders"
                                    class="category-heading"><i class="fas fa-building"></i> Instansi</a>
                            </span>
                            <a href="#" class="inbox-menu-item">Nama Instansi<span id="nama-instansi"></span>
                                <a href="#" class="inbox-menu-item">Kategori<span id="kategori-instansi"></span></a>
                        </div>
                        <div class="collapsible-menu">
                                <span class="inbox-leftbar-category clearfix">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#folders"
                                        class="category-heading"><i class="fas fa-business-time"></i> Tanggal Instalasi</a>
                                </span>
                                <a href="#" class="inbox-menu-item">Tanggal Mulai<span id="tanggal-mulai"></span></a>
                                <a href="#" class="inbox-menu-item">Waktu<span id="waktu-mulai"></span></a>
                                <a href="#" class="inbox-menu-item">Tanggal Selesai<span id="tanggal-selesai"></span></a>
                                <a href="#" class="inbox-menu-item">Waktu<span id="waktu-selesai"><i class="fas fa-clock"></i></span></a>
                        </div>

                        <div class="collapsible-menu">
                            <span class="inbox-leftbar-category clearfix">
                                <a href="javascript:;" class="category-heading"><i class="fas fa-address-book"></i>
                                    Kontak</a>
                            </span>
                            <a href="#" class="inbox-menu-item">Email<span id="email"></span></a>
                            <a href="#" class="inbox-menu-item">No Telepon<span id="no-telepon"></span></a>
                        </div>
                        <div class="collapsible-menu" id="daftarPic">
                            <span class="inbox-leftbar-category clearfix">
                                <a href="javascript:;" class="category-heading"><i class="fas fa-list"></i> Daftar
                                    PIC</a>
                            </span>
                        </div>

                        <div class="collapsible-menu">
                            <span class="inbox-leftbar-category clearfix">
                                <a href="javascript:;" class="category-heading"><i class="fa fa-fw fa-map-marker"></i>
                                    Alamat</a>
                            </span>
                            <address style="padding: 10px 16px">
                                <span id="alamat"></span><br>
                                <span id="kota"></span><br>
                                <span id="provinsi"></span>
                            </address>
                        </div>
                        <div class="collapsible-menu">
                                <span class="inbox-leftbar-category clearfix">
                                    <a href="javascript:;" id="status-" class="category-heading">
                                        Status</a>
                                </span>
                                    <a href="#" class="inbox-menu-item">Status<span id="status" class="badge"></span></a>
                            </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="inbox-menu mt-lg" style="margin-top: 0px !important;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Timeline Instalasi Proyek</h2>
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="panel-body scroll-pane" style="height: 850px;">
                            <div class="scroll-content">
                                <ul class="timeline">   
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

<script src="{{asset('demo/demo-detailLaporanAdmin.js')}}"></script>
<script src="{{asset('plugins/jquery-form/jquery.form.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/moment/moment-with-locales.min.js')}}"></script>
<!--Must Include -->
@stop