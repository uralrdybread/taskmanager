<x-layout>

<div class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="max-w-md w-full">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-lg font-semibold mb-4">Create Task</div>

            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="py-2 px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block md:w-80 shadow-sm sm:text-sm border-gray-300 rounded-md @error('title') border-red-500 @enderror" value="{{ old('title') }}" required autofocus>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="py-2 px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Task
                </button>
            </form>
        </div>
    </div>
</div>

</x-layout>