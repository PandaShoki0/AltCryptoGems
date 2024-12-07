@extends('layouts.admin')
@section('page-style')
{{-- <link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}">
<link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}">


<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
<style>
    .selection{
        width: 100%;
        height: 42px;
    }
    :is(.dark .input-group > span ){
        background-color: unset;
    }
    .input-group > span{
        border-width: 0px;
        background-color: unset;
        padding-left: 0px;
        padding-right: 0px;
        
    }
    /* .select2-container--default .select2-selection--multiple .select2-selection__choice{
        margin-top: 0;
        padding: 0;
    } */
    .input-group{
        flex-wrap: unset
    }
    .form-control{
        border-radius: unset
    }
    .input-group > .form-control:not(:last-child), .input-group > .custom-select:not(:last-child) {
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">{{$page_title}}
                    <a href="{{route('admin.users.plan.all')}}" class="btn btn-success btn-md pull-right ">
                        <i class="fa fa-eye"></i> View Plan
                    </a>
                </h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Plan Title</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg"
                                           name="title">
                                    <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-font"></i>
                                            </span>
                                    </div>
                                </div>
                                @if ($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                @endif

                            </div>

                            <div class="col-md-4">
                                    <h6>Rate </h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg"
                                               name="rate">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            USD
                                            </span>
                                        </div>
                                    </div>
                                    @if ($errors->has('rate'))
                                        <div class="error">{{ $errors->first('rate') }}</div>
                                    @endif
                            </div>

                            <div class="col-md-4">
                                    <h6>Status</h6>
                                    <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                           data-width="100%" type="checkbox"
                                           name="status">
                            </div>
                        </div>
                        <br>

                        
                        <br />

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Details</h6>

                                <div class="description"
                                     style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px">
                                    <div class="row">
                                        <div class="col-md-12" id="planDescriptionContainer">
                                            <div class="input-group">
                                                <input name="details[]" value="" class="form-control margin-top-10"
                                                       type="text" required placeholder="Plan Description">
                                                <span class="input-group-btn">
                                                 <button class="btn btn-danger margin-top-10 delete_desc" type="button"><i
                                                             class='fa fa-times'></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-12 text-right margin-top-10">
                                            <button id="btnAddDescription" type="button"
                                                    class="btn btn-sm btn-primary">Add Description
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @if ($errors->has('details'))
                                    <div class="error">{{ $errors->first('details') }}</div>
                                @endif

                            </div>
                            <div class="col-md-3">
                                    <h6>Trade Limit</h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg"
                                                name="trade_limit">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        Per Day
                                                    </span>
                                                </div>    
                                    </div>
                                    @if ($errors->has('trade_limit'))
                                        <div class="error">{{ $errors->first('trade_limit') }}</div>
                                    @endif
                            </div>
 
                            <div class="col-md-3">                                    
                                <h6>ICON</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg"
                                            name="icon">
                                    <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-desktop"></i>
                                            </span>
                                    </div>
                                </div>
                                @if ($errors->has('icon'))
                                    <div class="error">{{ $errors->first('icon') }}</div>
                                @endif
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <hr/>
                            <div class="col-md-12 ">
                                <button class="btn btn-primary btn-block btn-lg">Create Plan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-scripts')
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/fontawesome-iconpicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('assets/admin/js/pace.min.js')}}"></script>    
<script src="{{asset('assets/vendor_components/flagstrap/dist/js/jquery.flagstrap.js')}}"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                $(document).on('change', '#cat_id', function () {
                    var code = $('option:selected', this).data('code');
                    $('.show_coin_code').text(code);
                });
            });
        })(jQuery);

    </script>


    <script>
        var max = 1;
        $(document).ready(function () {
            $("#btnAddDescription").on('click', function () {
                appendPlanDescField($("#planDescriptionContainer"));
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
            });
        });

        function appendPlanDescField(container) {
            max++;
            container.append(
                '<br><div class="input-group">' +
                '<input name="details[]" value="" class="form-control margin-top-10" type="text" required placeholder="Plan Description">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>



@stop