@extends('layout.indexOfAdmin')
@section('css')
<link type="text/css" href="{{asset('css/form-components.css')}}" rel="stylesheet"> <!-- form components-->
<link type="text/css" href="{{asset('css/detail-keluhan.css')}}" rel="stylesheet"> <!-- keluhan components-->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
        <li><a href="{{route('dashboardAdmin')}}">Home</a></li>
            <li><a href="{{route('listKeluhan')}}">Keluhan</a></li>
            <li class="active"><a href="">Detail Keluhan Instansi Per Tahun</a></li>
        </ol>
        <div class="page-heading">
            <h1>Detail Keluhan Instansi Per Tahun </h1>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="panel panel-midnightblue">
                    @foreach ($keluhan as $key => $data)
                    @if($loop->last)
                    <div class="panel-heading ">
                        <h2 class="labalaba">Detail Proyek Instansi : {{$data->instansi->nama_instansi}}</h2>
                    </div>        
                    @endif      
                    @endforeach          
                    <div class="panel-body" style="margin-top: 10px !important">                                                                                               
                        <form class="form-horizontal row-border">
                            <div class="form-group">                                
                                <span class="login100-form-title p-b-48">
                                    <img src="https://nakulasadewa.com/wp-content/uploads/2016/04/ns-3.png" style="width:150px;height:100px;"></img>
                                </span>
                            </div>
                            @foreach ($keluhan as $key => $data)
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label labalaba" style="padding-top: 2px !important;">Nama Subjek &nbsp;&nbsp:</label>
                                <div class="col-sm-8 labalaba" style="padding-top: 2px !important;">
                                @foreach ($data->daftar_subjek as $subjeks)
                                    <p>{{$subjeks->subjek_keluhan['nama_subjek']}}</p>
                                @endforeach 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label labalaba" style="padding-top: 2px !important;">Waktu Pelaporan Keluhan &nbsp;&nbsp: </label>
                                <div class="col-sm-8 labalaba" style="padding-top: 2px !important;">
                                  <p>{{\Carbon\Carbon::parse($data->waktu_lapor_keluhan)->format('l, d F Y - H:i')}} WIB</p>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label labalaba" style="padding-top: 2px !important;">Permasalahan &nbsp;&nbsp:</label>
                                <div class="col-sm-8 labalaba" style="padding-top: 2px !important;">
                                  <p>{{$data->permasalahan}}</p>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label labalaba" style="padding-top: 2px !important;">Solusi&nbsp;&nbsp:</label>
                                <div class="col-sm-8 labalaba" style="padding-top: 2px !important;">
                                  <p>{{$data->solusi}}</p>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label labalaba" style="padding-top: 2px !important;">Waktu Selesai Penanganan &nbsp;&nbsp:</label>
                                <div class="col-sm-8 labalaba" style="padding-top: 2px !important;">
                                <p>{{\Carbon\Carbon::parse($data->waktu_selesai_penanganan)->format('l, d F Y - H:i', 'Asia/Jakarta')}} WIB</p>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label labalaba" style="padding-top: 2px !important;">Nama Teknisi&nbsp;&nbsp:</label>
                                <div class="col-sm-8 labalaba" style="padding-top: 2px !important;">
                                  <p>{{$data->nama_teknisi}}</p>
                                </div>                                
                            </div>
                            <hr>
                            @endforeach
                        </form>                        
                    </div>
                    
                </div>
            </div><!--data widget group1-->
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')
<!--Must Include -->
<!--End loading page level scripts formscomponents-->
@stop