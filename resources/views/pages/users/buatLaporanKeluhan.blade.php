@extends('layout.index')
@section('css')
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet">                        <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-select2/select2-skins.css')}}" rel="stylesheet"> <!-- Select2 skin -->
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">	<!-- DateRangePicker -->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a>Laporan Keluhan</a></li>
            <li class="active"><a href='/laporan-keluhan'>Buat Laporan Instalasi Keluhan</a></li>

        </ol>
        <div class="page-heading">
            <h1>Buat Laporan Keluhan</h1>
        </div>
        <div class="container-fluid">
            @if (session('success')) <!--user get notified if report was created successfully -->
                <div class="alert alert-dismissable alert-success">
                        <i class="fa fa-fw fa-check"></i>&nbsp; <strong>Well done! </strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
                
            @endif
            <div data-widget-group="group1">
                <div class="panel panel-midnightblue">
                    <div class="panel-heading">
                        <h2>Form Laporan Keluhan</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('buatLaporanKeluhan')}}" method="POST" class="form-horizontal row-border" id="validate-form" data-parsley-validate data-parsley-errors-messages-disabled>
                            {{ csrf_field() }}
                            <!-- form intansi -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Instansi
                                    <i id="loadingIcon1" style="" class="fa fa-circle-notch fa-spin"></i>
                                </label>
                                <div class="col-sm-7">
                                    <select required class="@error('namaInstansi') is-invalid @enderror" id="select2_k_instansi" name="namaInstansi">
                                        <option></option>
                                    </select>
                                    @if(!is_null(old('namaInstansi')))
                                    <script>
                                        var oldValI = {!!json_encode(old('namaInstansi'))!!};
                                    </script>
                                    @endif
                                    @error('namaInstansi')   
                                         <span class="text-danger"><div class="parsley-required">{{$message}}</div></span>
                                    @enderror
                                      
                                </div>
                                <div class="col-sm-2 link-wrapper">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Pelapor
                                    <i id="loadingIcon2" style="display:none;" class="fa fa-circle-notch fa-spin"></i>
                                </label>
                                <div class="col-sm-7">
                                        <select required class="@error('namaPelapor') is-invalid @enderror" id="select2_k_pelapor" name="namaPelapor">
                                            <option></option>
                                        </select>
                                        @if(!is_null(old('namaPelapor')))
                                        <script>
                                            var oldValP = {!!json_encode(old('namaPelapor'))!!};
                                        </script>
                                        @endif
                                        @error('namaPelapor')   
                                         <span class="text-danger"><div class="parsley-required">{{$message}}</div></span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Waktu
                                    Lapor Keluhan</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100 input-group" data-validate="Harus Diisi">
                                        <span id="date-rangepicker-keluhan1" class="input-group-addon"
                                            style="border: none; background-color: inherit !important;"><i
                                                id="cal-click" class="fas fa-calendar-alt"></i></span>
                                        <input class="input100 mask @error('waktuLapor') is-invalid @enderror"
                                            type="text" name="waktuLapor" autocomplete="off"
                                            value="{{ old('waktuLapor') }}" spellcheck="false" required>
                                        <span class="focus-input100" data-placeholder="Tanggal Instalasi"></span>
                                    </div>
                                    @error('waktuLapor')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Waktu
                                    Selesai Penanganan</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100 input-group" data-validate="Harus Diisi">
                                        <span id="date-rangepicker-keluhan2" class="input-group-addon"
                                            style="border: none; background-color: inherit !important;"><i
                                                id="cal-click" class="fas fa-calendar-alt"></i></span>
                                        <input class="input100 mask @error('waktuSelesaiPenanganan') is-invalid @enderror"
                                            type="text" name="waktuSelesaiPenanganan" autocomplete="off"
                                            value="{{ old('waktuSelesaiPenanganan') }}" spellcheck="false" required>
                                        <span class="focus-input100" data-placeholder="Tanggal Instalasi"></span>
                                    </div>
                                    @error('waktuSelesaiPenanganan')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Subjek Keluhan
                                    <i id="loadingIcon3" class="fa fa-circle-notch fa-spin"></i>
                                </label>
                                <div class="col-sm-7">
                                        <select required class="{{ $errors->has('subjekKeluhan') ? ' is-invalid' : '' }}" id="select2_k_subjek" name="subjekKeluhan[]" multiple="multiple">
                                            <option></option>
                                        </select>
                                        @if(!is_null(old('subjekKeluhan')))
                                        <script>
                                            var oldValS = {!!json_encode(old('subjekKeluhan'))!!};
                                        </script>
                                        @endif
                                        @if($errors->has('subjekKeluhan'))
                                        <span class="text-danger">
                                            <div class="parsley-required">{{ $errors->first('subjekKeluhan') }}</div>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Permasalahan / Keluhan</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                        <textarea  spellcheck="false"
                                            class="input100 @error('permasalahanKeluhan') is-invalid @enderror"
                                            type="text" name="permasalahanKeluhan"
                                            autocomplete="off" required>{{ old('permasalahanKeluhan') }}</textarea>
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
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Solusi</label>
                                <div class="col-sm-7">
                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                        <textarea  spellcheck="false"
                                            class="input100 @error('solusiPermasalahanKeluhan') is-invalid @enderror"
                                            type="text" name="solusiPermasalahanKeluhan"
                                            autocomplete="off" required>{{ old('solusiPermasalahanKeluhan') }}</textarea>
                                        <span class="focus-input100" data-placeholder=""></span>
                                    </div>
                                    @error('solusiPermasalahanKeluhan')
                                    <span class="text-danger">
                                        <div class="parsley-required">{{$message}}</div>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class=" col-sm-offset-3 col-sm-7">
                                        <button class="btn-primary btn" id="submit" type="submit">Submit</button>
                                        <button class="btn-default btn">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--data widget group1-->
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')
<!--Load page level scripts forms components-->
<script type="text/javascript" src="{{asset('plugins/form-select2/select2.js')}}"></script>                    			<!-- Advanced Select Boxes -->
<script src="{{asset('plugins/form-autosize/autosize.js')}}"></script>            			<!-- Autogrow Text Area -->
<script type="text/javascript" src="{{asset('plugins/form-parsley/parsley.js')}}"></script>  					<!-- Validate Plugin / Parsley -->
<!--End loading page level scripts formscomponents-->

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
    <!--Load page level scripts picker components-->
	<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>     				<!-- Date Range Picker -->
    <!--End loading page level scripts picker components-->
    
<script type="text/javascript" src="{{asset('demo/demo-buatLaporanKeluhan.js')}}"></script>                            <!--Must Include -->
@stop