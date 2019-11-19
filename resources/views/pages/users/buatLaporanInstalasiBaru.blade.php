@extends('layout.index')
@section('css')
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<!-- DateRangePicker -->
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet"> <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-select2/select2-skins.css')}}" rel="stylesheet"> <!-- Select2 skin -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/_all.css')}}" rel="stylesheet"> <!-- iCheck -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/flat/_all.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a>Laporan Instalasi</a></li>
            <li class="active"><a href='/laporan-keluhan'>Buat Laporan Instalasi Baru</a></li>

        </ol>
        <div class="page-heading">
            <h1>Buat Laporan Instalasi Baru</h1>
        </div>
        <div class="container-fluid">
            @if($errors->has('failed'))
            <div class="alert alert-dismissable alert-danger">
                <i class="fa fa-fw fa-times"></i>&nbsp; <strong>{{ $errors->first('failed') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
            @endif
            @if($status === 'Allowed')
            <div data-widget-group="group1">
                <div class="panel panel-midnightblue">
                    <div class="panel-heading">
                        <h2>Form Laporan Instalasi Baru</h2>
                    </div>
                    <div class="panel-body" style="margin-top: 10px !important">
                        <form class="form-horizontal row-border" action="{{route('buatLaporanInstalasiBaru')}}"
                            method="POST" id="validate-form" data-parsley-validate
                            data-parsley-errors-messages-disabled>{{ csrf_field() }}
                            <div class="form-group ">
                                <label class="col-sm-3 control-label">Nama Instansi
                                    <i id="loadingIcon0" style="" class="fa fa-circle-notch fa-spin"></i>
                                </label>
                                <div class="col-sm-7">
                                    <select class="@error('daftarInstansi') is-invalid @enderror"
                                        id="select2_k_daftar_instansi" name="daftarInstansi">
                                        <option></option>
                                    </select>
                                    @if(!is_null(old('daftarInstansi')))
                                    <script>
                                        var oldValInstansi = {!!json_encode(old('daftarInstansi'))!!};
                                    </script>
                                    @endif
                                    @error('daftarInstansi')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 16px !important;">PIC*</label>
                                <div class="col-sm-7">
                                    <div class="col-sm-6" style="padding: 6px">
                                        <div class="wrap-input100" data-validate="Harus Diisi">
                                            <input 
                                                class="first-pic-field input100 @error('namaPic') is-invalid @enderror"
                                                name="namaPic" placeholder="Nama PIC 1" type="text" autocomplete="off"
                                                value="{{ old('namaPic') }}">
                                            <span class="focus-input100"></span>
                                        </div>
                                        @error('namaPic')
                                        <span class="text-danger">
                                            <div class="parsley-required">{{$message}}</div>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6" style="padding: 6px">
                                        <div class="wrap-input100" data-validate="Inputan tidak valid">
                                            <input  name="nomorTelepon" placeholder="Nomor Telepon PIC 1"
                                                type="number" minlength="10" maxlength="15" autocomplete="off"
                                                class="first-pic-field input100 @error('nomorTelepon') is-invalid @enderror"
                                                value="{{ old('nomorTelepon') }}">
                                            <span class="focus-input100"></span>
                                        </div>
                                        @error('nomorTelepon')
                                        <span class="text-danger">
                                            <div class="parsley-required">{{$message}}</div>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Tanggal
                                    Mulai Instalasi</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100 input-group" data-validate="Harus Diisi">
                                        <span id="date-rangepicker" class="input-group-addon"
                                            style="border: none; background-color: inherit !important;"><i
                                                id="cal-click" class="fas fa-calendar-alt"></i></span>
                                        <input required
                                            class="input100 mask @error('waktuMulaiInstalasi') is-invalid @enderror"
                                            type="text" name="waktuMulaiInstalasi" autocomplete="off"
                                            value="{{ old('waktuMulaiInstalasi') }}" spellcheck="false">
                                        <span class="focus-input100" data-placeholder="Tanggal Instalasi"></span>
                                    </div>
                                    @error('waktuMulaiInstalasi')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-7">
                                            <label class="col-sm-12"><p class="text-info"><i class="fas fa-info-circle"></i> PIC merupakan penanggunjawab dari instansi </p></label>
                                            <label class="col-sm-12"><p class="text-info"><i class="fas fa-info-circle"></i> Kolom PIC bertanda * tidak wajib diisi apabila tidak PIC yang perlu ditambahkan</p></label>
                                    </div>
                                    
                                </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class=" col-sm-offset-3 col-sm-8">
                                        <button class="btn-primary btn" type="submit" value="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--data widget group1-->
            @else
            <script></script>
            <div class="alert alert-info">
                <i class="fa fa-fw fa-info-circle"></i>&nbsp; <strong>Info :</strong> Anda tidak dapat membuat laporan
                baru sebelum anda menyelesaikan laporan anda sebelumnya
            </div>
            @endif

        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
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


<script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script> <!-- iCheck -->

<script type="text/javascript" src="{{asset('demo/demo-buatLaporanBaru.js')}}"></script>
<!--Must Include -->


<!--End loading page level scripts formscomponents-->
@stop