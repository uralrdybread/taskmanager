@props(['tasks'])

<a href="{{ route('tasks.create') }}" class="inline-block mb-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create Task</a>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($tasks as $task)
    <a href="{{ route('tasks.edit', $task) }}" class="block">
        <div class="bg-white rounded-md shadow-md p-4">
            <h2 class="text-lg font-semibold mb-2">{{ $task->title }}</h2>
            <p class="text-sm text-gray-600">{{ $task->description }}</p>
        </div>
    </a>
    @endforeach
</div>