<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.taskbar') }}
        </h2>
    </x-slot>


    @if(isset($tasks))
    @foreach($tasks as $task)
        <x-task-card>
            <x-slot name="task_name">{{$task->task_name}}</x-slot>
            <x-slot name="task_body">{{$task->task_body}}</x-slot>
            <x-slot name="created_at">{{$task->created_at}}</x-slot>
        </x-task-card>
    @endforeach
    @else
        <x-task-card>
            {{__('dashboard.tasks_are_missing')}}
        </x-task-card>
    @endif
</x-app-layout>
