@extends('layout.indexOfAdmin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/charts-chartistjs/chartist.min.css')}}"> <!-- Chartist -->
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<style> 
        th {
            text-align: center;
        }  
        td {
            text-align: center;
        }
</style> <!-- for justify data table -->
@stop
@section('content')
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboardAdmin')}}">Home</a></li>
            <li>Statistik</li>
            <li class="active"><a href="">Keluhan-Proyek</a></li>
        </ol>
        <div class="page-heading">
            <h1>Statistik Keluhan Proyek</h1>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel">
                        <div class="panel-heading">
                            <h2>Statistik Keluhan Proyek</h2>
                        </div>
                        <div class="panel-body" style="padding: 10px 15px">
                                <div class="clearfix mb-md">
                                        <button class="btn btn-default pull-left" id="daterangepicker_dashboard">
                                            <i class="far fa-calendar-alt"></i>
                                        <span class="hidden-xs" style="text-transform: uppercase;"></span>&nbsp;<i class="fas fa-angle-down"></i></button>
                                        <input id="date_start" name="date_start" hidden type="text">
                                        <input id="date_end" name="date_end" hidden type="text">
                                </div>
                                <div class="text-center" id="msg-info"></div>
                                <div id="spinner" class="text-center" style="display: none">
                                        <div class="spinner-border text-info" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                            <canvas id="bar-chart" height="200" width="500"></canvas>
                            <input type="text" name="date-start" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@stop
@section('script')

<!-- load page leve scripts chart -->
<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/charts-chartjs/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>
<script type="text/javascript" src="{{asset('demo/demo-statistik-keluhan-proyek.js')}}"></script>
@stop