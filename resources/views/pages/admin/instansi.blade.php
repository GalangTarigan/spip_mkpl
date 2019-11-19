@extends('layout.indexOfAdmin')
@section('css')
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<!-- DateRangePicker -->
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet"> <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-select2/select2-skins.css')}}" rel="stylesheet"> <!-- Select2 skin -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/_all.css')}}" rel="stylesheet"> <!-- iCheck -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/flat/_all.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/DataTables-1.10.18/css/dataTables.bootstrap4.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/Responsive-2.2.2/css/responsive.bootstrap4.css')}}" />
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active"><a href="{{route('tambah-instansi')}}">Tambah Instansi</a></li>

        </ol>
        <div class="page-heading">
            <h1>Instansi</h1>
        </div>
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-dismissable alert-success">
                <i class="fa fa-fw fa-check"></i>&nbsp; <strong>Well done! </strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>

            @endif
            <div data-widget-group="group1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Instansi</h2>
                        <div class="options">
                            <ul class="nav nav-tabs">
                                <li><a @if(!$errors->any()) class="active show" @endif href="#daftar-instansi"
                                        data-toggle="tab">Daftar Instansi</a></li>
                                <li><a @if($errors->any()) class="active show" @endif
                                        href="#tambah-instansi" data-toggle="tab">Tambah Instansi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-top: 10px !important">
                        <div class="tab-content">
                            <div @if(!$errors->any()) class="tab-pane active" @else class="tab-pane" @endif
                                id="daftar-instansi">
                                <div id="spinner" class="text-center" style="display: none">
                                    <div class="spinner-border text-info" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div id="errorLoading" class="text-center" style="display: none">
                                </div>
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover" cellspacing="0" width="100%"
                                        style="display: none;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Instansi</th>
                                                <th>Alamat Instalasi</th>
                                                <th>Provinsi</th>
                                                <th>Kota / Kabupaten</th>
                                                <th>Email</th>
                                                <th>No. Telepon</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div @if($errors->any()) class="tab-pane active" @else class="tab-pane" @endif
                                id="tambah-instansi">
                                <form class="form-horizontal row-border" action="{{route('tambah-instansi')}}"
                                    method="POST" id="validate-form" data-parsley-validate
                                    data-parsley-errors-messages-disabled>{{ csrf_field() }}
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Nama
                                            Instansi</label>
                                        <div class="col-sm-7">
                                            <div class="wrap-input100" data-validate="Harus Diisi">
                                                <input required
                                                    class="input100 @error('namaInstansi') is-invalid @enderror"
                                                    type="text" name="namaInstansi" autocomplete="off"
                                                    value="{{ old('namaInstansi') }}">
                                                <span class="focus-input100" data-placeholder="Nama Instansi"></span>
                                            </div>
                                            @error('namaInstansi')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label">Jenis Instansi
                                            <i id="loadingIcon1" style="" class="fa fa-circle-notch fa-spin"></i>
                                        </label>
                                        <div class="col-sm-7">
                                            <select required class="@error('jenisInstansi') is-invalid @enderror"
                                                id="select2_jenis_instansi" name="jenisInstansi">
                                                <option></option>
                                            </select>
                                            @if(!is_null(old('jenisInstansi')))
                                            <script>
                                                var oldValJenisIns = {!!json_encode(old('jenisInstansi'))!!};
                                            </script>
                                            @endif
                                            @error('jenisInstansi')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label"
                                            style="padding-top: 11px !important;">Alamat Instansi</label>
                                        <div class="col-sm-7">
                                            <div class="wrap-input100" data-validate="Harus Diisi">
                                                <input required
                                                    class="input100 @error('alamatInstansi') is-invalid @enderror"
                                                    type="text" name="alamatInstansi" autocomplete="off"
                                                    value="{{ old('alamatInstansi') }}">
                                                <span class="focus-input100" data-placeholder="Alamat Instansi"></span>
                                            </div>
                                            @error('alamatInstansi')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label">Provinsi
                                            <i id="loadingIcon2" style="" class="fa fa-circle-notch fa-spin"></i>
                                        </label>
                                        <div class="col-sm-7">
                                            <select required class="@error('provinsi') is-invalid @enderror"
                                                id="select2_provinsi" name="provinsi">
                                                <option></option>
                                            </select>
                                            @if(!is_null(old('provinsi')))
                                            <script>
                                                var oldValProv = {!!json_encode(old('provinsi'))!!};
                                            </script>
                                            @endif
                                            @error('provinsi')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label">Kota
                                            <i id="loadingIcon3" style="display:none;"
                                                class="fa fa-circle-notch fa-spin"></i>
                                        </label>
                                        <div class="col-sm-7">
                                            <select required class="@error('kota') is-invalid @enderror"
                                                id="select2_kota" name="kota">
                                                <option></option>
                                            </select>
                                            @if(!is_null(old('kota')))
                                            <script>
                                                var oldValKota = {!!json_encode(old('kota'))!!};
                                            </script>
                                            @endif
                                            @error('kota')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label"
                                            style="padding-top: 11px !important;">Email*</label>
                                        <div class="col-sm-7">
                                            <div class="wrap-input100" data-validate="Email tidak valid">
                                                <input class="input100 @error('emailInstansi') is-invalid @enderror"
                                                    type="email" name="emailInstansi" autocomplete="off"
                                                    value="{{ old('emailInstansi') }}">
                                                <span class="focus-input100" data-placeholder="Email Instansi"></span>
                                            </div>
                                            @error('emailInstansi')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-3 control-label"
                                            style="padding-top: 11px !important;">Nomor Telepon*</label>
                                        <div class="col-sm-7">
                                            <div class="wrap-input100" data-validate="Harus Diisi">
                                                <input class="input100 @error('noTeleponInstansi') is-invalid @enderror"
                                                    type="number" name="noTeleponInstansi" autocomplete="off"
                                                    minlength="10" maxlength="15"
                                                    value="{{ old('noTeleponInstansi') }}">
                                                <span class="focus-input100"
                                                    data-placeholder="Nomor Telepon Instansi"></span>
                                            </div>
                                            @error('noTeleponInstansi')
                                            <span class="text-danger">
                                                <div class="parsley-required">{{$message}}</div>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group " id="wrapper-field">
                                        <label class="col-sm-3 control-label"
                                            style="padding-top: 16px !important;">PIC</label>
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col-sm-6" style="padding: 6px">
                                                    <div class="wrap-input100" data-validate="Harus Diisi">
                                                        <input required
                                                            class="first-pic-field input100 @error('namaPic.0') is-invalid @enderror"
                                                            name="namaPic[]" placeholder="Nama PIC 1" type="text"
                                                            autocomplete="off" value="{{ old('namaPic.0') }}">
                                                        <span class="focus-input100"></span>
                                                    </div>
                                                    @error('namaPic.0')
                                                    <span class="text-danger">
                                                        <div class="parsley-required">{{$message}}</div>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-5" style="padding: 6px">
                                                    <div class="wrap-input100" data-validate="Inputan tidak valid">
                                                        <input required name="nomorTelepon[]"
                                                            placeholder="Nomor Telepon PIC 1" type="number"
                                                            minlength="10" maxlength="15" autocomplete="off"
                                                            class="first-pic-field input100 @error('nomorTelepon.0') is-invalid @enderror"
                                                            value="{{ old('nomorTelepon.0') }}">
                                                        <span class="focus-input100"></span>
                                                    </div>
                                                    @error('nomorTelepon.0')
                                                    <span class="text-danger">
                                                        <div class="parsley-required">{{$message}}</div>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-1" style="padding: 6px">
                                                    <button type="button" id="add_button" class="btn btn-success"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>

                                                <div id="after-fields" style="display:none">
                                                    <div class="col-sm-6" style="padding: 6px">
                                                        <div class="wrap-input100" data-validate="Harus Diisi">
                                                            <input id="after-fields-namaPic1" disabled
                                                                class="input100 @error('namaPic.1') is-invalid @enderror"
                                                                placeholder="Nama PIC 2" type="text" autocomplete="off"
                                                                value="{{ old('namaPic.1') }}">
                                                            <span class="focus-input100"></span>
                                                        </div>
                                                        @error('namaPic.1')
                                                        <span class="text-danger">
                                                            <div class="parsley-required">{{$message}}</div>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-5" style="padding: 6px">
                                                        <div class="wrap-input100" data-validate="Inputan tidak valid">
                                                            <input id="after-fields-nomorTelepon1" disabled
                                                                placeholder="Nomor Telepon PIC 2" type="number"
                                                                minlength="10" maxlength="15" autocomplete="off"
                                                                class="input100 @error('nomorTelepon.1') is-invalid @enderror"
                                                                value="{{ old('nomorTelepon.1') }}">
                                                            <span class="focus-input100"></span>
                                                        </div>
                                                        @error('nomorTelepon.1')
                                                        <span class="text-danger">
                                                            <div class="parsley-required">{{$message}}</div>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    @if(!is_null(old('namaPic.1')) or !is_null(old('nomorTelepon.1')))
                                                    <script>
                                                        var activateFields = true;
                                                    </script>
                                                    @endif
                                                </div>
                                                <div class="col-sm-1" style="padding: 6px">
                                                    <button disabled style="display:none" type='button'
                                                        id='remove_button' class='btn btn-danger'><i
                                                            class='fas fa-times'></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-7">
                                            <label class="col-sm-12">
                                                <p class="text-info"><i class="fas fa-info-circle"></i> PIC merupakan
                                                    penanggunjawab dari instansi </p>
                                            </label>
                                            <label class="col-sm-12">
                                                <p class="text-info"><i class="fas fa-info-circle"></i> Kolom bertanda *
                                                    tidak wajib diisi </p>
                                            </label>
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
                    </div>
                </div>
            </div>
            <!--data widget group1-->
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')
<!-- Load page level scripts data tables-->
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>

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

<script type="text/javascript" src="{{asset('demo/demo-instansi.js')}}"></script>
<!--Must Include -->


<!--End loading page level scripts formscomponents-->
@stop