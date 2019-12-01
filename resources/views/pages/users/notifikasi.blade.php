@extends('layout.index')
@section('css')
@stop
@section('content')
<script>
   var all_notifications = {!! json_encode($result->toArray(), JSON_HEX_TAG)!!};
   console.log(all_notifications)
</script>
<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}">Home</a></li>
            <li class="active"><a href="{{route('notifikasi')}}">Akun</a></li>
            <li class="active"><a href="{{route('notifikasi')}}">Notifikasi</a></li>
        </ol>
        <div class="page-heading">
                <h1>Notifikasi</h1>
            </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3" style="padding-block-start: 12px;">
                        <div class="inbox-menu mt-lg" style="margin-top: 0px !important;">
                                <div class="collapsible-menu">
                                    <span class="inbox-leftbar-category clearfix">
                                        <a href="javascript:;" data-toggle="collapse" data-target="#folders"
                                            class="category-heading">Notifikasi</a>
                                    </span>
                                    <a id="all-notif" class="inbox-menu-item active">Semua<span id="all-msg-count" class="badge badge-success">3</span>
                                    <a id="unread" class="inbox-menu-item">Belum Terbaca<span id="unread-count" class="badge badge-info">2</span></a>
                                </div>
                        </div>
                </div>  
                <div class="col-sm-6" style="padding-block-start: 12px;">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <span id="notif-heading"></span>
                                    </div>
                            <div class="panel-body scroll-pane" style="height: 400px;padding: 15px !important">
                                <ul id="notif-wrapper" class="scroll-content">
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>

@stop
@section('script')

<script src="{{asset('demo/demo-notifications-page.js')}}"></script>
<script src="{{asset('plugins/jquery-form/jquery.form.js')}}"></script>
<!--Must Include -->
@stop