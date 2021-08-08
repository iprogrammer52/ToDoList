<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl text-gray-800 font-semibold mb-3">
                    {{$task_name}}
                </h1>
                <p class="text-gray-600 leading-6 tracking-normal">{{$task_body}}</p>
                <p class="text-gray-600 leading-6 tracking-normal">{{$created_at}}</p>
                @if(isset($task_id))
                    <form method="POST" action="{{ route('task_manager.destroy', [$task_id])}}">
                    @method('DELETE')
                    @csrf
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{asset('task_manager/'. $task_id)}}" class="border-b-2 border-transparent hover:text-gray-800 hover:border-gray-800 mx-1.5 sm:mx-6">Редактировать</a>
                            <x-button class="ml-3">
                                {{ __('add_task.delete') }}
                            </x-button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
