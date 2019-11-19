@extends('layout.index')
@section('css')
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<!-- DateRangePicker -->
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet"> <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-select2/select2-skins.css')}}" rel="stylesheet"> <!-- Select2 skin -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/blue.css')}}" rel="stylesheet"> <!-- iCheck -->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a>Laporan Instalasi</a></li>
            <li class="active"><a href='/laporan-keluhan'>Buat Laporan Training</a></li>

        </ol>
        <div class="page-heading">
            <h1>Buat Laporan Training</h1>
        </div>
        <div class="container-fluid">
            @if($status === 'Allowed')
            <div data-widget-group="group1">
                <div class="panel panel-midnightblue">
                    <div class="panel-heading">
                        <h2>Form Laporan Training Proyek Instansi : {{$namaProyek}}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            <i class="fa fa-fw fa-info-circle"></i>&nbsp; <strong>Info :</strong> Harap upload
                            dokumentasi foto atau video sebelum anda men-submit form laporan training
                        </div>
                        <form action="{{route('buatLaporanTraining')}}" method="POST" class="form-horizontal row-border"
                            data-parsley-validate data-parsley-errors-messages-disabled enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Waktu
                                    Pelaksanaan Training</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100 input-group" data-validate="Harus Diisi">
                                        <span id="date-rangepicker-training" class="input-group-addon"
                                            style="border: none; background-color: inherit !important;"><i
                                                id="cal-click" class="fas fa-calendar-alt"></i></span>
                                        <input required class="input100 mask @error('waktuMulaiTraining') is-invalid @enderror"
                                            type="text" name="waktuMulaiTraining" autocomplete="off"
                                            value="{{ old('waktuMulaiTraining') }}" spellcheck="false">
                                        <span class="focus-input100" data-placeholder="Tanggal Instalasi"></span>
                                    </div>
                                    @error('waktuMulaiTraining')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror
                                    <br>
                                    <div class="wrap-input100 input-group" data-validate="Harus Diisi">
                                        <span class="input-group-addon"
                                            style="border: none; background-color: inherit !important;">s.d</span>
                                        <input required class="input100 mask @error('waktuSelesaiTraining') is-invalid @enderror"
                                            type="text" name="waktuSelesaiTraining" autocomplete="off"
                                            value="{{ old('waktuSelesaiTraining') }}" spellcheck="false">
                                        <span class="focus-input100" data-placeholder="Tanggal Instalasi"></span>
                                    </div>
                                    @error('waktuSelesaiTraining')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Informasi
                                    Tambahan</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                        <textarea required spellcheck="false"
                                            class="input100 @error('informasiTambahan') is-invalid @enderror"
                                            type="text" name="informasiTambahan"
                                            autocomplete="off">{{ old('informasiTambahan') }}</textarea>
                                        <span class="focus-input100" data-placeholder=""></span>
                                    </div>
                                    @error('informasiTambahan')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Upload
                                    Dokumentasi Foto</label>
                                <div class="col-sm-7">
                                    <div class="images_prev">
                                        @if(!$dokumentasiFoto->isEmpty())
                                        <script>var counter = {!! json_encode($dokumentasiFoto)!!}; counter = counter.length
                                        </script>
                                        @foreach($dokumentasiFoto as $foto)
                                        <a onclick="deleteImage('{{$foto->uuid}}', this);return false;">
                                            <div class="img"
                                                style="background-image:url({{asset('storage/'.$foto->dokumentasi)}})">
                                                <span></span>
                                            </div>
                                        </a>
                                        @endforeach
                                        @else
                                        <script>var counter = 0;
                                        </script>
                                        @endif
                                        <div class="pic">
                                            <i class="fas fa-plus fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Upload
                                    Dokumentasi Video</label>
                                @if(isset($dokumentasiVideo))
                                <script>var counter_v = 1;
                                </script>
                                @else
                                <script>var counter_v = 0;
                                </script>
                                @endif
                                <div class="col-sm-4 vid" style="cursor : pointer !important">
                                        <div class="wrap-input100 input-group" data-validate="Harus Diisi">
                                            <span class="input-group-addon video-browse"></span>
                                            <input class="input100 video-browse" type="text" placeholder="Upload your file"
                                                style="cursor : pointer !important; border-top: 1px solid #e0e0e0 !important;border-right: 1px solid #e0e0e0 !important;"
                                                name="filename-video" autocomplete="off" readonly spellcheck="false">
                                            <span class="focus-input100" data-placeholder=""></span>
                                            <span class="input-group-addon video-action-btn"></span>
                                            <span class="input-group-addon video-upload-cancel" style="display: none"><i class="fas fa-times"></i></span>
                                        </div>
                                        <div id="progressBar-video" style="width:100%;height:30px">
                                        </div>
                                </div>
                            </div>
             
                            <div class="panel-footer">
                                <div class="row">
                                    <div class=" col-sm-offset-3     col-sm-8">
                                        <button class="btn-primary btn" type="submit" id="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <input type="file" name="video" accept="video/*" style="display:none !important" />
                        <input type="file" name="images[]" accept="image/*" multiple style="display:none !important" />
                    </div>
                </div>

            </div>
            <!--data widget group1-->
            @else
            <div class="alert alert-info">
                <i class="fa fa-fw fa-info-circle"></i>&nbsp; <strong>Info :</strong> Anda tidak dapat membuat laporan
                training sebelum anda membuat laporan instalasi baru
            </div>
            @endif
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@if($errors->has('failed'))
    <script>
    var error_failed = {!! json_encode($errors->first('failed')) !!};
    </script>
@endif
@stop
@section('script')
<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>
<!-- Date Range Picker -->
<!-- Load page level scripts form validation-->
<script>
    // See Docs
    window.ParsleyConfig = {
        successClass: 'info-success'
        , errorClass: 'alert-validate'
        , classHandler: function (el) {
            return el.$element.parent();
        }
    };
</script>
<script type="text/javascript" src="{{asset('plugins/form-parsley/parsley.js')}}"></script>
<!-- Validate Plugin / Parsley -->
<script type="text/javascript" src="{{asset('plugins/form-inputmask/dist/jquery.inputmask.js')}}"></script>
<!-- Input Masks Plugin -->
<!-- End loading page level scripts form validation-->

<!--Load page level scripts forms components-->
<script type="text/javascript" src="{{asset('plugins/form-select2/select2.js')}}"></script>
<!-- Advanced Select Boxes -->

<script src="{{asset('plugins/form-autosize/autosize.js')}}"></script> <!-- Autogrow Text Area -->

<script type="text/javascript" src="{{asset('demo/demo-buatLaporanTraining.js')}}"></script>
<!--Must Include -->

<!--End loading page level scripts formscomponents-->
@stop