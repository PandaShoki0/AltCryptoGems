@extends('layouts.admin')
@section('page-style')
<link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


<!-- Main CSS-->
{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}"> --}}
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}">
<link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet">
{{-- <link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/> --}}

{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}"> --}}


<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title ">
                    <a href="{{route('admin.users.plan.create')}}" class="btn btn-success btn-md pull-right ">
                        <i class="fa fa-plus"></i> Add Plan
                    </a>
                    <br>
                </div>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($plans as $k=>$data)
                                <tr>
                                    <td data-label="SN">{{++$k}}</td>
                                    <td data-label="ICON">{!! $data->icon !!}</td>
                                    <td data-label="Title">{{$data->title }}</td>
                                    <td data-label="Rate">{{number_format($data->rate, $basic->decimal)}} USD</td>
                                    <td data-label="Status">
                                        <b class="btn btn-sm btn-{{ $data->status ==0 ? 'warning' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</b>
                                    </td>
                                    <td data-label="Action">
                                        <a href="{{route('admin.users.plan.edit',$data->id)}}" class="btn btn-outline-primary btn-sm ">
                                            <i class="fa fa-edit"></i> EDIT
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            @if(count($plans) == 0)
                                 <tr>
                                    <td colspan="6">
                                       <p class="text-danger text-center">No Plans Set Yet</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        {!! $plans->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-scripts')

@endsection