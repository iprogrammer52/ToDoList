<?php

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $task = new Task();
    $tasks = $task->where(['user_id' => Auth::user()->id])->orderBy('id','desc')->paginate(5);

    return view('dashboard', ['tasks' => $tasks]);

})->middleware(['auth'])->name('dashboard');

Route::resource('task_manager', TaskController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
