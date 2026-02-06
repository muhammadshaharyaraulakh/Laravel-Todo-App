<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Edit Task Form -->
                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT') <!-- Use PUT for updating -->

                    <!-- Task Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('task')" />
                        <x-text-input 
                            id="title" 
                            class="block mt-1 w-full" 
                            type="text" 
                            name="title" 
                            value="{{ old('title', $task->task) }}" 
                            required
                        />
                        <x-input-error :messages="$errors->get('task')" class="mt-2" />
                    </div>

                    <!-- Task Description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea 
                            id="description" 
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-indigo-500 dark:focus:ring-indigo-500" 
                            name="description" 
                            rows="4"
                            required
                        >{{ old('description', $task->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Update Task') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
