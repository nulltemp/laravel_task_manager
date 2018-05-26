<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index($panelId) {
    $tasks = Task::where('panel_id', $panelId)->get();
    return $tasks;
  }

  public function store(Request $request) {
    $task = new Task;
    $task->name = request('name');
    $task->panel_id = request('panelId');
    $task->save();
    return $task;
  }

  public function destroy($id) {
    $task = Task::find($id);
    $task->delete();
    return $task;
  }
}
