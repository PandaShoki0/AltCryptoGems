@extends('layouts.admin')

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h4 class="card-title">
                        {{ __('Edit Coin Pair') }}
                    </h4>
                    <a href="{{ route('admin.coin-pairs.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i></a>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('admin.coin-pairs.update', $coinPair->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-5">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Trade Category') }} <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="trade_category_id"
                                    required
                                >
                                    <option value="" selected disabled>- Select -</option>
                                    @foreach ($tradeCategories as $id => $name)
                                        <option value="{{ $id }}" {{ old('trade_category_id', $coinPair->trade_category_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('trade_category_id')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Pair Name') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" 
                                    name="name"
                                    value="{{ old('name', $coinPair->name) }}"
                                    required
                                >
                                @error('name')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('From Pair') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" 
                                    name="fromsym"
                                    value="{{ old('fromsym', $coinPair->fromsym) }}"
                                    required
                                >
                                @error('fromsym')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('To Pair') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" 
                                    name="tosym"
                                    value="{{ old('tosym', $coinPair->tosym) }}"
                                    required
                                >
                                @error('tosym')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Increase By') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" 
                                    name="step"
                                    value="{{ old('step', $coinPair->step) }}"
                                    required
                                >
                                @error('step')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Minimum Trade Amount') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" 
                                    name="minimum"
                                    value="{{ old('minimum', $coinPair->minimum) }}"
                                    required
                                >
                                @error('minimum')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Status') }} <span class="text-red-500">*</span>
                                </label>
                                @php
                                    $status = $coinPair->status ? 'active' : 'inactive';
                                @endphp
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="status"
                                    required
                                >
                                    <option value="active" {{ old('status', $status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mt-10 mb-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection