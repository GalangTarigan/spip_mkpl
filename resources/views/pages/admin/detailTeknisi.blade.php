@extends('layout.indexOfAdmin')
@section('css')
<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/blue.css')}}" rel="stylesheet"> <!-- iCheck -->
<link type="text/css" href="{{asset('plugins/charts-chartistjs/chartist.min.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet"> <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-select2/select2-skins.css')}}" rel="stylesheet"> <!-- Select2 skin -->
<link type="text/css" href="{{asset('css/form-components.css')}}" rel="stylesheet"> <!-- form components-->
@stop
@section('content')
<script>
        var user = {!! json_encode($user)!!};
        console.log(user)
</script>
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboardAdmin')}}">Home</a></li>
            <li>Statistik</li>
            <li class="active"><a href="/detail-teknisi">Detail Teknisi</a></li>
        </ol>
        <div class="page-heading">
            <h1>Detail Teknisi</h1>
        </div>
        <div class="container-fluid">                                                
            @if (\Session::has('success'))
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>{{\Session::get('success')}}</p>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>{{$errors->first()}}</p>
            </div>
            @endif  
            <div class="row">
                    
                <div class="col-md-4">
                    <script>
                        </script>
                    <div class="panel panel-profile">
                        <div class="panel-body">
                            <div class="user-card">
                                    <div class="text-center">
                                            @if($userProfile->photo && Storage::disk('public')->has($userProfile->photo))
                                            <div align="center">
                                            <div class="img-circular" style="background-image: url(http://pelaporan-kerja-lapangan.test/admin/akun/profile/get-userImage/?filename={{$userProfile->photo}})"></div>
                                            </div>
                                            @else
                                            <img src="https://www.pngkey.com/png/full/202-2024792_user-profile-icon-png-download-fa-user-circle.png" class="avatar img-responsive">
                                            @endif
                                        </div>
                                        <br>
                                <div class="text-center">
                                    <a href="#" class=""
                                        onclick="$('input[name=image]').click();"><i class="fa fa-camera"></i> Edit Foto</a>
                                        
                                </div>
                                <form id="image-form" method="post" action="{{ route('edit-image') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input style="display: none" type="file" name="image" accept="image/*" />
                                    <input style="display: none" type="text" name="id" value="{{$userProfile->uuid}}" />
                                    
                                </form>
                                
                                <div class="contextual-progress" style="display: none;">
                                    <div class="clearfix">
                                        <div class="progress-title">Status</div>
                                        <div class="progress-percentage"></div>
                                    </div>
                                    <div id="progress" class="progress">
                                        <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow=""
                                            aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>
                                </div>
                                <br> 
                                <div class="contact-name ">{{$userProfile->nama_lengkap}}  &nbsp;&nbsp<a id="icon"><i class="fas fa-edit"></i></a></div> 
                                <div class="contact-status">Teknisi</div>
                                <ul class="details">
                                    <li><i class="far fa-envelope"></i>{{$userProfile->email}}</li>
                                    <li><i class="fa fa-phone-alt"></i>{{$userProfile->no_telepon}}</li>
                                    <li><i class="fa fa-map-marker-alt"></i>{{$userProfile->alamat}}</li>
                                </ul>
                            </div>
                            <hr class="outsider">
                        </div>
                    </div>
                </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>


<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" width="50px">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="modal-title" id="exampleModalLabel">Edit Form</p>
                </div>
                <div class="modal-body" style="margin-top: -20px !important">
                    <form action="{{route('edit-teknisi')}}" method="POST" class="form-horizontal row-border"
                        data-parsley-validate data-parsley-errors-messages-disabled id="validate-form">
                        {{ csrf_field() }}                        
                        <input type="text" value={{$userProfile->uuid}} name="user" hidden>
                        {{-- <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Email Baru</label>
                                <div class="col-sm-9">
                                    <div class="wrap-input100" data-validate="Format Salah">
                                    <input placeholder="Ketik disini kaka..." class="input100" id="email" name="email"
                                        type="email" autocomplete="off">
                                        <span class="focus-input100" data-placeholder="Ketik disini kaka..."></span>    
                                    </div>
                            </div>
                        </div> --}}

                            <div class="form-group">
                                    <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Nomor Telepon Baru</label>
                                    <div class="col-sm-9">
                                        <div class="wrap-input100" data-validate="Inputan tidak valid">
                                            <input minlength="10" maxlength="15" type="number" class="input100 mask" id="no_telepon" name="no_telepon"
                                                   autocomplete="off" >
                                            <span class="focus-input100"></span>
                                        </div>
                                </div>
                            </div>
                       <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 11px !important;">Alamat Baru</label>
                                <div class="col-sm-9">
                                    <div class="wrap-input100" data-validate="Kolom tidak boleh kosong">
                                    <input placeholder="Ketik disini kaka..." class="input100" id="alamat" name="alamat"
                                        type="text" autocomplete="off">
                                        <span class="focus-input100" data-placeholder="Ketik disini kaka..."></span>                                            
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" id="submit-update" class="btn btn-primary" type="submit">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
@stop
@section('script')

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
<!-- Load page level scripts data tables-->
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/DataTables-1.10.18/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/Responsive-2.2.2/js/dataTables.responsive.js')}}"></script>

<script type="text/javascript" src="{{asset('plugins/form-inputmask/dist/jquery.inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/form-select2/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script><!-- iCheck -->

<script src="{{asset('plugins/jquery-form/jquery.form.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/charts-chartjs/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/jquery-form/jquery.form.js')}}"></script>
<script type="text/javascript" src="{{asset('demo/demo-detail-teknisi.js')}}"></script>
@stop


