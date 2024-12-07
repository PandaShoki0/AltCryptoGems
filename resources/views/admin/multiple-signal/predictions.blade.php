@extends('layouts.admin')

@section('content')
    <div class="flex flex-col gap-5">
        <div class="shadow overflow-y-scroll border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('SN') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Session ID') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Users in Session') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Date Created') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-none">
                    @forelse ($predictionSessions as $predictionSession)
                        <tr class="bg-white dark:bg-gray-700 dark:text-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $predictionSession->session_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm flex flex-wrap font-medium dark:text-white">
                                @foreach($predictionSession->tradePredictions ?? [] as $tradePrediction)
                                    <label class="badge bg-success" style="width: fit-content">
                                        {{ $tradePrediction->user?->name }}
                                    </label>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                {{ $predictionSession->created_at->format('Y-m-d h:m A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                                <a href="{{ route('admin.multiple-signals.predictions.trades', ['session_id' => $predictionSession->session_id]) }}" class="btn btn-sm btn-primary" type="button">
                                    <i class="fa fa-eye" alt="Show Trading Text"></i> Show Session Trades
                               </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-red-600 font-bold text-center py-3">No items found!</td>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>

        {{ $predictionSessions->withQueryString()->links() }}
    </div>
@endsection