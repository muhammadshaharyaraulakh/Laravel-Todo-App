<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(count($tasks) > 0)

                @foreach($tasks as $date => $dailyTasks)
                
                    {{-- Date Header --}}
                    <div class="mt-8 mb-4 flex items-center px-2">
                        <div class="h-8 w-1 bg-indigo-500 rounded-full mr-3"></div>
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                        </h3>
                        <span class="ml-3 bg-white text-gray-500 text-xs font-semibold px-2 py-1 rounded shadow-sm border border-gray-100">
                            {{ $dailyTasks->count() }} Tasks
                        </span>
                    </div>

                    <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden border border-gray-100 mb-8">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="hidden md:table-header-group bg-gray-50 text-gray-700 uppercase text-xs border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 font-extrabold w-1/3">Task</th>
                                    <th class="px-6 py-4 font-extrabold w-1/3">Description</th>
                                    <th class="px-6 py-4 font-extrabold text-right">Status</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                {{-- 3. Loop through Tasks for this specific Date --}}
                                @foreach($dailyTasks as $task)
                                    <tr class="hover:bg-indigo-50/30 transition duration-150">

                                        <td class="px-6 py-4 align-top">
                                            <div class="md:hidden text-xs text-gray-400 uppercase mb-1">Task</div>
                                            <div class="font-bold text-gray-900 text-base">
                                                {{ $task->task }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 align-top">
                                            <div class="md:hidden text-xs text-gray-400 uppercase mb-1">Description</div>
                                            <div class="text-gray-600 leading-relaxed">
                                                {{ $task->description }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 align-top">
                                            <div class="md:hidden text-xs text-gray-400 uppercase mb-1">Status</div>
                                            <div class="flex md:justify-end">
                                                
                                                {{-- STATUS LOGIC --}}
                                                @if($task->status == 'completed')
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-bold text-emerald-700 bg-emerald-100 rounded-full border border-emerald-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                        Completed
                                                    </span>
                                                @elseif($task->status == 'incomplete')
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-bold text-red-700 bg-red-100 rounded-full border border-red-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        Incomplete
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-bold text-gray-600 bg-gray-100 rounded-full border border-gray-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        Pending
                                                    </span>
                                                @endif

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

            @else
                {{-- Empty State --}}
                <div class="py-16 text-center bg-white shadow-xl sm:rounded-lg">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    <h3 class="mt-2 text-lg font-semibold text-gray-800">No History Found</h3>
                    <p class="text-gray-500 mt-1">Your task history will appear here grouped by date.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>