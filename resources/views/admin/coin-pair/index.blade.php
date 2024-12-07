@extends('layouts.admin')

@section('content')
    <div class="flex flex-col gap-5">
        <nav class="flex justify-between items-center" aria-label="Breadcrumb">
            <span class="inline-flex items-center text-md font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                {{ __('Coin Pair List') }}
            </span>
            <div class="flex justify-end">
                <a href="{{ route('admin.coin-pairs.create') }}" class="btn btn-outline-primary">
                    <i class="bi bi-plus-lg"></i> {{ __('Add New') }}
                </a>
            </div>
        </nav>


        <div class="flex rounded-md shadow-sm">
            <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3 w-full">
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full md:w-[300px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="trade_category_id"
                >
                    <option value="" selected>- All Trade Category -</option>
                    @foreach ($tradeCategories as $id => $name)
                        <option value="{{ $id }}" {{ request('trade_category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <input placeholder="Search" name="search" value="{{ request('search') }}" type="text" class="w-full md:w-[300px] border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <button style="width: 120px" class="inline-flex gap-2 justify-center rounded-md border border-gray-300 shadow-sm px-3 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    <i class="bi bi-search"></i> SEARCH
                </button>
            </form>
        </div>


        <div class="shadow overflow-y-scroll border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('SN') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Category') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Pair Name') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('From Symbol') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('To Symbol') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Status') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-none">
                    @forelse ($coinPairs as $coinPair)
                        <tr class="bg-white dark:bg-gray-700 dark:text-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $coinPair->tradeCategory?->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $coinPair->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $coinPair->fromsym }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $coinPair->tosym }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                <form action="{{ route('admin.coin-pairs.update-status', $coinPair->id) }}" method="POST">
                                    @csrf
                                    <button style="font-size: 10px" class="px-2 py-1 uppercase rounded text-white {{ $coinPair->status ? 'bg-green-400' : 'bg-red-400' }}">
                                        {{ $coinPair->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                <a href="{{ route('admin.coin-pairs.edit', $coinPair->id) }}" class="btn btn-sm btn-outline-warning btn-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                
                                <form action="{{ route('admin.coin-pairs.destroy', $coinPair->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger btn-icon">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-red-600 font-bold text-center py-3">No items found!</td>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>

        {{ $coinPairs->withQueryString()->links() }}
    </div>
@endsection