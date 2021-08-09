<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.taskbar') }}
        </h2>
    </x-slot>

    @if(!$tasks->isEmpty())
    @foreach($tasks as $task)
        <x-task-card>
            <x-slot name="task_name">{{$task->task_name}}</x-slot>
            <x-slot name="task_body">{{$task->task_body}}</x-slot>
            <x-slot name="created_at">{{$task->created_at}}</x-slot>
            <x-slot name="task_id">{{$task->id}}</x-slot>
        </x-task-card>
    @endforeach
    @else
        <x-task-card>
            <x-slot name="task_name">{{__('add_task.there_are_no_tasks')}}</x-slot>
        </x-task-card>
    @endif

    {{ $tasks->onEachSide(5)->links() }}

</x-app-layout>
