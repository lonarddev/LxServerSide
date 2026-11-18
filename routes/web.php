<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;

Route::get('/', [UtilController::class, 'loadWelcome'])->name('welcome');

Route::get('/hello/{message}', function ($message) {
    return '<h1>Hello '.$message.'</h1>';
});

//rota de homepage
Route::get('/home', [UtilController::class, 'loadHomepage'])->name('home');

//rotas de users
Route::get('/users', [UserController::class, 'allUsers'])->name('users.all');

Route::get('/addusers',[UserController::class, 'addUsers'] )->name('users.add');

//rota de tasks
Route::get('/all-tasks',[TaskController::class, 'alltasks'] )->name('tasks.all');

//rota de apagar users
Route::get('/delete-users/{id}',[UserController::class, 'deleteUsers'])->name('users.delete');

//rota para ver /editar users
Route::get('/edit-users/{id}',[UserController::class, 'editUsers'] )->name('users.edit')->middleware('auth');

// rota para apagar tasks
Route::get('/delete-task/{id}',[TaskController::class, 'deleteTasks'] )->name('tasks.delete');

// rota para editar tasks
Route::get('/edit-task/{id}',[TaskController::class, 'editTasks'] )->name('tasks.edit');

// rota de registar users
Route::post('/store-users', [UserController::class, 'storeUser'])->name('users.store');


//rota de adicionar tasks
Route::get('/add-task',[TaskController::class, 'addTasks'] )->name('tasks.addtask');

// rota de guardar tasks
Route::post('/store-add-task', [TaskController::class, 'storeTasks'])->name('tasks.store');

//rota de actualizar users
Route::put('/update-user', [UserController::class, 'updateUser'])->name('users.update');



// Rotas de gestão de prendas

Route::get('/gifts', [GiftController::class, 'allGifts'])->name('gifts.all');

Route::get('/add-gift', [GiftController::class, 'addGift'])->name('gifts.add');

Route::post('/store-gift', [GiftController::class, 'storeGift'])->name('gifts.store');


// Rota para editar uma prenda
Route::get('/gifts/{id}/edit', [GiftController::class, 'editGift'])->name('gifts.edit');

// Rota para actualizar uma prenda
Route::put('/gifts/{id}', [GiftController::class, 'updateGift'])->name('gifts.update');

// Rota para eliminar uma prenda
Route::delete('/gifts/{id}', [GiftController::class, 'deleteGift'])->name('gifts.destroy');





// Route::get('/users', function () {
//     return view('users.allusers');
// })->name('users.all');

// Route::get('/addusers', function () {
//     return view('users.addusers');
// })->name('users.add');

//=========================================================

// Versão da formadora
// Route::get('/add-users', function () {
//     return view('users.addusers');
// })->name('users.add');

//=========================================================


//rota fallback
Route::fallback(function(){
    return view('utils.fallback');
});











