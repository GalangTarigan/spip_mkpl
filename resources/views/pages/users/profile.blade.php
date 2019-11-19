@extends('layout.index')
@section('css')
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a>Akun</a></li>
            <li class="active"><a href='/profile'>Profil</a></li>

        </ol>
        <div class="page-heading">
            <h1>Profil</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($data as $data)
                <div class="col-sm-offset-4 col-sm-5 col-md-offset-4 col-md-4">
                    <div class="panel panel-profile">
                        <div class="panel-body">
                            <div class="user-card">
                                <div class="text-center">
                                    @if($data->photo && Storage::disk('public')->has($data->photo))
                                    <div align="center">
                                    <div class="img-circular" style="background-image: url(http://pelaporan-kerja-lapangan.test/akun/profile/get-userImage/?filename={{$data->photo}})"></div>
                                    </div>
                                    @else
                                    <img src="http://placehold.it/300&text=Placeholder" class="avatar img-responsive">
                                    @endif
                                </div>
                                <br>
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
                                <div class="contact-name">{{$data->nama_lengkap}}</div>
                                <div class="contact-status">Teknisi</div>
                                <ul class="details">
                                    <li><i class="fas fa-fw fa-envelope"></i><a >{{$data->email}}</a></li>
                                    <li><i class="fas fa-fw fa-phone"></i>{{$data->no_telepon}}</li>
                                    <li><i class="fas fa-fw fa-map-marker"></i>{{$data->alamat}}</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')

<script src="{{asset('demo/demo-profile.js')}}"></script>
<script src="{{asset('plugins/jquery-form/jquery.form.js')}}"></script>
<!--Must Include -->
@stop