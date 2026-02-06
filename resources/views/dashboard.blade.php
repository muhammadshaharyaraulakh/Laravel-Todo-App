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
                                <th class="px-6 py-4 font-extrabold text-right">Actions</th>
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
                                        <div class="md:hidden text-xs text-gray-400 uppercase mb-2">Actions</div>

                                        <div class="flex flex-col sm:flex-row md:justify-end gap-3">

                                            <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    class="w-full sm:w-auto px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase rounded">
                                                    Complete
                                                </button>
                                            </form>

                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                               class="w-full sm:w-auto px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold uppercase rounded text-center">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="w-full sm:w-auto px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase rounded">
                                                    Delete
                                                </button>
                                            </form>

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
