<x-layout>

    <div class="container mx-auto px-4 py-8">
            <h1 class="text-3x1 font-semibold mb-4">Tasks</h1>

            <x-flash/>

            <x-task-list :tasks="$tasks" />


                    <!-- Empty State -->
            @if ($tasks->isEmpty())
                <p class="text-gray-600">No tasks found.</p>
            @endif

    </div>


</x-layout>