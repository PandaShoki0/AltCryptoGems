@extends('layouts.admin')
@section('page-style')
<link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet">
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
    .input-group > input{
        border-right-width: unset
    }
    .select.form-control:not([size]):not([multiple]){
        height: unset !important;
    }
</style>
@endsection


@section('content')
@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    $user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();
@endphp
    <div class="row">
        <div class="col-md-8">
           

            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-list"></i> Update Trade License Prompt for {{ $user->name }}
                </h4>
                <div class="tile-body">
                    <form id="form" method="POST" action="{{ route('admin.users.update-license-prompt', $user->id) }}"
                        enctype="multipart/form-data" name="editForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label><strong>Choose Trade License Prompt Settings </strong></label>
                                <div class="input-group">
                                    <select id="license_prompt" name="license_prompt" class="form-control">
                                        <option value="no_prompt" {{ @$license->license_settings['prompt'] == 'no_prompt' ? 'selected' : '' }}>No Prompt</option>
                                        <option value="skippable_prompt" {{ @$license->license_settings['prompt'] == 'skippable_prompt' ? 'selected' : '' }}>Skippable Prompt</option>
                                        <option value="active_prompt" {{ @$license->license_settings['prompt'] == 'active_prompt' ? 'selected' : '' }}>Active Prompt</option>                                        
                                    </select>
                                </div>
                                
                                @if ($errors->has('license_prompt'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('license_prompt') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="box d-none form-group col-md-6">
                                <label><strong>Select Access Pages</strong></label>
                                <div class="input-group">
                                    <select id="prompt_access" name="prompt_access" class="form-control">
                                        <option value="none" {{ @$license->license_settings['prompt_access'] == 'none' ? 'selected' : '' }}>None</option>
                                        <option value="auth" {{ @$license->license_settings['prompt_access'] == 'auth' ? 'selected' : '' }}>Auth Page only</option>
                                        <option value="user" {{ @$license->license_settings['prompt_access'] == 'user' ? 'selected' : '' }}>User Page only</option>
                                        <option value="auth_user" {{ @$license->license_settings['prompt_access'] == 'auth_user' ? 'selected' : '' }}>Auth & User Pages</option>                                        
                                    </select>
                                </div>
                                
                                @if ($errors->has('license_prompt'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('license_prompt') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label><strong>Enter Message</strong></label>
                                <textarea rows="3" class="form-control" name="message">{{ old('message',@$license->message )}}</textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Save</button>
                    </form>
                </div>
                <br />
            </div>
            
            
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-list"></i> Generate License for {{ $user->name }}
                </h4>
                <div class="tile-body">
                    <form id="form" method="POST" action="{{ route('admin.users.generate-license', $user->id) }}"
                        enctype="multipart/form-data" name="editForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label><strong>License Prefix</strong></label>
                                <div class="input-group">
                                    <input type="text" name="license_prefix" maxlength="4" minlength="2" class="form-control" value="{{old('license_prefix')}}" />
                                </div>
                                @if ($errors->has('license_prefix'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('license_prefix') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="form-group col-md-6">
                                <label><strong>Number of Licenses</strong></label>
                                <div class="input-group">
                                    <input type="number" name="license_number" class="form-control" value="{{old('license_number')}}" />
                                </div>
                                @if ($errors->has('license_number'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('license_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">Generate</button>
                    </form>
                </div>
                <br />
            </div>
            
            
            @if($license != null)
            
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-list"></i> Trading Licenses for {{ $user->name }}
                </h4>
                <div class="alert alert-info">
                    The status of the prompt updates when you change the settings. The info below shows the current status of the License to the user.
                </div>
                <div class="tile-body">
                    <div class="table-reponsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Keys</th>
                                <th>Prompt Type</th>
                                <th>Prompt Access</th>                                
                                <th>Status</th>                                
                            </tr>
                            <tr>
                                <td>@foreach($license->license_keys as $keys) {{ $keys }}<br /> @endforeach</td>
                                <td>{{ucwords(str_replace('_', ' ', $license->license_settings['prompt']))}}</td>
                                <td>{{ucwords(str_replace('_', ' & ', $license->license_settings['prompt_access']))}} Page</td>                                
                                <td>{!! $license->status ? '<label class="badge badge-success">Activated</label>' : '<label class="badge badge-danger">Inactive</label>' !!} </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br />
            </div>
            
            @endif

        </div>

        <div class="col-md-4">
          
            @include('admin.users.side-bar')

        </div>


    </div>


@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("select#license_prompt").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue != "no_prompt"){
                        $(".box").removeClass('d-none');
                    } else{
                        $(".box").addClass('d-none');
                    }
                });
            }).change();
        });
    </script>
@endsection
