@extends('layout.index')
@section('css')
<link type="text/css" href="{{asset('css/form-components.css')}}" rel="stylesheet"> <!-- form components-->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a>Laporan Instalasi</a></li>
            <li class="active"><a href='/laporan-keluhan'>Buat Laporan Berkala</a></li>

        </ol>
        <div class="page-heading">
            <h1>Buat Laporan Berkala</h1>
        </div>
        <div class="container-fluid">
            @if($status === 'Allowed')
                @if (session('success')) <!--user get notified if report was created successfully -->
                <script>
                        var messageSuccessCreateLaporanBerkala = {!! json_encode(session('success')) !!};
                    </script>
                    {{session()->forget('success')}}
                @endif
                @if (session('error'))
                <script>
                    var messageFailedCreateLaporanBerkala = {!! json_encode(session('error')) !!};
                </script>
                    {{session()->forget('error')}}
                @endif
            <div data-widget-group="group1">
                <div class="panel panel-midnightblue">
                    <div class="panel-heading">
                        <h2>Form Laporan Berkala Proyek Instansi : {{$namaProyek}}</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('buatLaporanBerkala')}}" method="POST" class="form-horizontal row-border"
                            id="validate-form" data-parsley-validate data-parsley-errors-messages-disabled>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label"
                                    style="padding-top: 11px !important;">Subjek</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                        <input required class="input100 @error('subjek') is-invalid @enderror"
                                            type="text" name="subjek" autocomplete="off" value="{{ old('subjek') }}" spellcheck="false">
                                        <span class="focus-input100" data-placeholder=""></span>
                                    </div>
                                    @error('subjek')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Permasalahan
                                    / Keluhan</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                        <textarea required spellcheck="false"
                                            class="input100 @error('permasalahanKeluhan') is-invalid @enderror"
                                            type="text" name="permasalahanKeluhan"
                                            autocomplete="off">{{ old('permasalahanKeluhan') }}</textarea>
                                        <span class="focus-input100" data-placeholder=""></span>
                                    </div>
                                    @error('permasalahanKeluhan')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"
                                    style="padding-top: 11px !important;">Solusi</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                        <textarea required spellcheck="false" class="input100 @error('solusi') is-invalid @enderror"
                                            type="text" name="solusi" autocomplete="off">{{ old('solusi') }}</textarea>
                                        <span class="focus-input100" data-placeholder=""></span>
                                    </div>
                                    @error('solusi')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class=" col-sm-offset-3 col-sm-8">
                                        <button class="btn-primary btn" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--data widget group1-->
            @else
            <div class="alert alert-info">
                <i class="fa fa-fw fa-info-circle"></i>&nbsp; <strong>Info :</strong> Anda tidak dapat membuat laporan
                berkala sebelum anda membuat laporan instalasi baru
            </div>
            @endif
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')
<!--Load page level scripts forms components-->
<script type="text/javascript" src="{{asset('plugins/form-autosize/autosize.js')}}"></script>
<!-- Autogrow Text Area -->
<!--End loading page level scripts formscomponents-->
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
<script type="text/javascript" src="{{asset('demo/demo-buatLaporanBerkala.js')}}"></script>
<!--Must Include -->
@stop