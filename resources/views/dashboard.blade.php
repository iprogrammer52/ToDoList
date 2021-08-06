<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.taskbar') }}
        </h2>
    </x-slot>


    @foreach($tasks as $task)
        <x-task-card>
            {{$task->task_name}}
        </x-task-card>
    @endforeach
</x-app-layout>
