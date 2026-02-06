<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden">

                @if($allTask->count())
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="hidden md:table-header-group bg-gray-100 text-gray-700 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-4 font-extrabold">Task</th>
                                <th class="px-6 py-4 font-extrabold">Description</th>
                                <th class="px-6 py-4 font-extrabold text-right">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach($allTask as $task)
                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4">
                                        <div class="md:hidden text-xs text-gray-400 uppercase mb-1">Task</div>
                                        <div class="font-bold text-gray-900">
                                            {{ $task->task }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="md:hidden text-xs text-gray-400 uppercase mb-1">Description</div>
                                        <div class="text-gray-600">
                                            {{ $task->description }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="md:hidden text-xs text-gray-400 uppercase mb-1">Status</div>
                                        <div class="text-right">
                                            @if($task->is_done)
                                                <span class="inline-block px-3 py-1 text-xs font-bold text-white bg-emerald-600 rounded-full">
                                                    Completed
                                                </span>
                                            @else
                                                <span class="inline-block px-3 py-1 text-xs font-bold text-white bg-gray-500 rounded-full">
                                                    Pending
                                                </span>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="py-16 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">No tasks found</h3>
                        <p class="text-gray-500 mt-1">Create your first task to get started</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
