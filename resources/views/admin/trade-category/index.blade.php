@extends('layouts.admin')

@section('content')
    <div class="flex flex-col gap-5">
        <nav class="flex justify-between items-center" aria-label="Breadcrumb">
            <span class="inline-flex items-center text-md font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                {{ __('Trade Category List') }}
            </span>
            <div class="flex justify-end">
                <a href="{{ route('admin.trade-categories.create') }}" class="btn btn-outline-primary">
                    <i class="bi bi-plus-lg"></i> {{ __('Add New') }}
                </a>
            </div>
        </nav>


        <div class="flex rounded-md shadow-sm">
            <form action="" method="GET" class="flex items-center gap-3">
                <input placeholder="Search" name="name" value="{{ request('name') }}" type="text" class="block w-[300px] border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <button class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm p-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    <i class="bi bi-search"></i>
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
                            {{ __('Name') }}
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
                    @forelse ($tradeCategories as $tradeCategory)
                        <tr class="bg-white dark:bg-gray-700 dark:text-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $tradeCategory->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                <form action="{{ route('admin.trade-categories.update-status', $tradeCategory->id) }}" method="POST">
                                    @csrf
                                    <button style="font-size: 10px" class="px-2 py-1 uppercase rounded text-white {{ $tradeCategory->status ? 'bg-green-400' : 'bg-red-400' }}">
                                        {{ $tradeCategory->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                <a href="{{ route('admin.trade-categories.edit', $tradeCategory->id) }}" class="btn btn-sm btn-outline-warning btn-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                
                                <form action="{{ route('admin.trade-categories.destroy', $tradeCategory->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="4" class="text-red-600 font-bold text-center py-3">No items found!</td>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>

        {{ $tradeCategories->withQueryString()->links() }}
    </div>
@endsection