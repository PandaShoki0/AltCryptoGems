@extends('layouts.admin')

@section('page-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
@endsection

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <form action="{{ route('admin.multiple-signals.generate.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header flex items-center justify-between">
                        <h4 class="card-title">
                            {{ __('Generate Multiple Prediction') }}
                        </h4>
                        <div>
                            <a href="{{ route('admin.multiple-signals.predictions', ['session_type' => 'live']) }}" class="btn bg-red-100 text-black">
                                <i class="bi bi-lightning"></i> View Live Prediction
                            </a>
                            <a href="{{ route('admin.multiple-signals.predictions', ['session_type' => 'demo']) }}" class="btn bg-indigo-100 text-black">
                                <i class="bi bi-bar-chart"></i> View Demo Prediction
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-col gap-5">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Trade Type') }} <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="form-control"
                                    id="trade_type" name="trade_type"
                                >
                                    <option value="live" {{ old('trade_type') == 'live' ? 'selected' : '' }}>Live Trade</option>
                                    <option value="demo" {{ old('trade_type') == 'demo' ? 'selected' : '' }}>Demo Trade</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Amount Range From') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="form-control"
                                    type="number" 
                                    name="amount_from"
                                    value="{{ old('amount_from') }}"
                                    required
                                    step="any"
                                >
                                @error('amount_from')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Amount Range To') }} <span class="text-red-500">*</span> 
                                </label>
                                <input
                                    class="form-control"
                                    type="number" 
                                    name="amount_to"
                                    value="{{ old('amount_to') }}"
                                    required
                                    step="any"
                                >
                                @error('amount_to')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Number of Trades to Generate') }} <span class="text-red-500">*</span> 
                                </label>
                                <input
                                    class="form-control"
                                    type="number" 
                                    name="number_of_trades"
                                    value="{{ old('number_of_trades') }}"
                                    required
                                >
                                @error('number_of_trades')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Symbols') }} <span class="text-red-500">*</span> 
                                </label>
                                <select
                                    class="form-control select2"
                                    name="symbols[]"
                                    multiple
                                    required
                                    style="width: 100%"
                                >
                                    @foreach ($symbols as $symbol)
                                        <option value="{{ $symbol->id }}">
                                            {{ $symbol->fromsym }}-{{ $symbol->tosym }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Intervals') }} <span class="text-red-500">*</span> 
                                </label>
                                <select
                                    class="form-control select2"
                                    name="trade_intervals[]"
                                    multiple
                                    required
                                    style="width: 100%"
                                >
                                    <option value="60">1 min</option>
                                    <option value="180">3 min</option>
                                    <option value="300">5 min</option>
                                    <option value="900">15 mins</option>
                                    <option value="1800">30 mins</option>
                                    <option value="3600">1 hr</option>
                                    <option value="7200">2 hr</option>
                                    <option value="86400">1 day</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Select Users') }} <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="form-control select2"
                                    name="user_id[]"
                                    multiple
                                    required
                                    style="width: 100%"
                                >
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }} - {{ $user->username }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection





@section('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection