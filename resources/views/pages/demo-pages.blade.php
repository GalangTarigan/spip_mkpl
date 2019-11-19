@extends('layout.index')
@section('css')
<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/blue.css')}}" rel="stylesheet">              <!-- iCheck -->
<link type="text/css" href="{{asset('plugins/form-daterangepicker/daterangepicker.css')}}" rel="stylesheet">	<!-- DateRangePicker -->
<link type="text/css" href="{{asset('plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">	<!-- FullCalendar -->
<link type="text/css" href="{{asset('plugins/charts-chartistjs/chartist.min.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('js/jqueryui.css')}}" rel="stylesheet">	<!-- jQuery UI CSS -->
<link type="text/css" href="{{asset('plugins/form-select2/select2.css')}}" rel="stylesheet">                        <!-- Select2 -->
<link type="text/css" href="{{asset('plugins/form-multiselect/css/multi-select.css')}}" rel="stylesheet">           <!-- Multiselect -->
<link type="text/css" href="{{asset('plugins/form-fseditor/fseditor.css')}}" rel="stylesheet">                      <!-- FullScreen Editor -->
<link type="text/css" href="{{asset('plugins/form-tokenfield/bootstrap-tokenfield.css')}}" rel="stylesheet">        <!-- Tokenfield -->
<link type="text/css" href="{{asset('plugins/switchery/switchery.css')}}" rel="stylesheet">        					<!-- Switchery -->
<link type="text/css" href="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet"> <!-- Touchspin -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/_all.css')}}" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
<link type="text/css" href="{{asset('plugins/iCheck/skins/flat/_all.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('plugins/iCheck/skins/square/_all.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('plugins/card/lib/css/card.css')}}" rel="stylesheet"> 									<!-- Card -->
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
            <h1>Buat Laporan Instalasi</h1>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="panel panel-midnightblue">
                    <div class="panel-heading">
                        <h2>Form Laporan Instalasi Baru</h2>
                    </div>
                    <div class="panel-body">
                            <form action="" method="POST" class="form-horizontal row-border">
                                    <div class="form-group" id="wrapper-fields">
                                            <div class="row">
                                                    <label class="col-sm-2 control-label">Nama PIC</label>
                                                    <div class="col-sm-3">
                                                        <input required  type="text" class="form-control">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Nomor Telepon</label>
                                                    <div class="col-sm-2">
                                                        <input required  type="text" class="form-control">
                                                    </div>
                                                    <button id="add_button" class="btn btn-success"><i class="fa fa-plus"></i></button>
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
    <!--Load page level scripts picker components-->
	<script type="text/javascript" src="{{asset('plugins/clockface/js/clockface.js')}}"></script>     								<!-- Clockface -->
	<script type="text/javascript" src="{{asset('plugins/form-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> 			<!-- Color Picker -->
	<script type="text/javascript" src="{{asset('plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>      			<!-- Datepicker -->
	<script type="text/javascript" src="{{asset('plugins/bootstrap-timepicker/bootstrap-timepicker.js')}}"></script>      			<!-- Timepicker -->
	<script type="text/javascript" src="{{asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script> 	<!-- DateTime Picker -->
	<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/moment.min.js')}}"></script>              			<!-- Moment.js for Date Range Picker -->
	<script type="text/javascript" src="{{asset('plugins/form-daterangepicker/daterangepicker.js')}}"></script>     				<!-- Date Range Picker -->
	<!--End loading page level scripts picker components-->
	
	<!-- Load page level scripts dropzone-->
	<script type="text/javascript" src="{{asset('plugins/dropzone/dropzone.min.js')}}"></script>   	<!-- Dropzone Plugin -->
	<!-- End loading page level scripts dropzone-->

    <script>
        $(document).ready(function() {
            var max_field = 2;
            var wrapper = $("#wrapper-fields");
            var add_button = $("#add_button");

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_field){
                    x++;
                    $(wrapper).append('<div class="row"><label class="col-sm-2 control-label">Nama PIC</label><div class="col-sm-3"><input required  type="text" class="form-control"></div><label class="col-sm-2 control-label">Nomor Telepon</label><div class="col-sm-2"><input required  type="text" class="form-control"></div><button id="remove_button" class="btn btn-danger"><i class="fa fa-times"></i></button>');
                    $("#add_button").hide();
                }
            });
            $(wrapper).on("click","#remove_button", function(e){ //user click on remove text
		        e.preventDefault(); 
                $(this).parent('div').remove(); x--;
                $("#add_button").show();
	        });
        });
        </script>
    <script type="text/javascript" src="{{asset('plugins/form-inputmask/jquery.inputmask.bundle.min.js')}}"></script>  	<!-- Input Masks Plugin -->
	<!-- End loading page level scripts form validation-->
    <!--Load page level scripts forms components-->
	<script type="text/javascript" src="{{asset('plugins/form-select2/select2.js')}}"></script>                    			<!-- Advanced Select Boxes -->
    <script src="{{asset('plugins/form-autosize/autosize.js')}}"></script>           			<!-- Autogrow Text Area -->
	<script type="text/javascript" src="{{asset('plugins/form-fseditor/jquery.fseditor-min.js')}}"></script>      			<!-- Fullscreen Editor -->
    <script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>  							<!-- iCheck // already included on site-level -->
    <script type="text/javascript" src="{{asset('plugins/wijets/wijets.js')}}"></script>     							<!-- Wijet -->
	<script type="text/javascript" src="{{asset('demo/demo-buatLaporanBaru.js')}}"></script>                            <!--Must Include -->
    
	<!--End loading page level scripts formscomponents-->
@stop
