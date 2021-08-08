<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'task_body' => 'required'
        ]);

        $task = new Task();

        $status = $task
            ->create([
                'user_id' => Auth::user()->id,
                'task_name' => $validated['task_name'],
                'task_body' => $validated['task_body'],
            ])
            ->save();

        if ($status)
        {
            return redirect('dashboard');
        } else {
            return abort('403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = new Task();
        $task_data = $task->where('id', '=', $id)->first();

        return view('add_task', ['task_data' => $task_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'task_body' => 'required'
        ]);

        $tasks = new Task();

        $status = $tasks->where('id', $request->task_id)->update([
            'task_name' => $validated->task_name,
            'task_body' => $validated->task_body,
        ]);
        //TODO: Добавить сюда обработчик статуса.

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = new Task();
        $status = $tasks->where('id', '=', $id)->delete();
        // TODO: Сюда обработчик статуса

        return redirect('dashboard');
    }
}
