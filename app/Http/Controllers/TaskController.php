<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function alltasks(){
    $tasks = $this->getAllTasks();
    // dd($tasks);

    // //Tarefas do id 4
    // Task::TaskByUser(4);

    // // CHAMAR PELA VARIÁVEL DO MODELO
    // Task::STATUS_COMPLETED;

    return view('tasks.all_tasks', compact('tasks'));
    }


    protected function getAllTasks() {

        // $tasks= DB::table('tasks')
        // ->join('users', 'tasks.user_id', 'users.id')
        // ->select('tasks.id', 'tasks.due_at', 'tasks.status', 'tasks.name','users.name as user_name')
        // ->get();

                $tasks= Task::join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.id', 'tasks.due_at', 'tasks.status', 'tasks.name','users.name as user_name')
        ->get();

    return $tasks;
    }

    // Apagar tasks
    public function deleteTasks($id) {

    Task::where('id', $id)->delete();

    return back();
}


// Editar tasks
public function editTasks(int $id) {

$taskInfo = Task::join('users', 'tasks.user_id','=' ,'users.id')->where('tasks.id', $id)->select('tasks.id', 'tasks.description','tasks.due_at', 'tasks.status', 'tasks.name','users.name as user_name')->first();

return view('tasks.edittasks', compact('taskInfo'));
}


// adicionar uma task
    public function addTasks(){
        $users = $this->getAllUsers();

        return view('tasks.addtask', compact('users'));
    }

    private function getAllUsers(){
        $users = User::select('id','name')->get();

        return $users;
    }

// Receber tasks
    public function storeTasks(Request $request){
        $request->validate([
            'name' => 'max:50|required',
            'user_id' =>'required|exists:users,id'
        ]);

        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('tasks.all')->with('Tarefa adicionada com sucesso!');
    }

}


