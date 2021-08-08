<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('add_task.add') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(empty($task_data))
                        <form method="POST" action="{{ route('task_manager.store') }}">
                    @else
                        <form method="POST" action="{{ asset('task_manager/'. $task_data->id) }}">
                            @method('PUT')
                            <input name= "task_id" type="hidden" value="{{$task_data->id}}">
                    @endif
                    @csrf
                    <!-- Task name-->
                        <div>
                            <x-label for="task_name" :value="__('add_task.name')" />
                            <x-input id="task_name" class="block mt-1 w-full" type="text" name="task_name" value="{{$task_data->task_name ?? ''}}" required autofocus />
                        </div>
                        <div>
                            <x-label for="task_body" :value="__('add_task.body')" />
                            <textarea id="task_body" name="task_body" rows="4" maxlength="210" class="block w-full mt-1 py-2 px-3 rounded-md shadow-sm focus:outline-none">{{$task_data->task_body ?? ''}}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                @if(empty($task_data))
                                    {{ __('add_task.add') }}
                                @else
                                    {{__('add_task.update')}}
                                @endif
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
