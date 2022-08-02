<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/main',[\App\Http\Controllers\CandidatesController::class,'index'])->name('main');
Route::get('/adding/form',[\App\Http\Controllers\CandidatesController::class,'createForm'])->name('createCandidateForm');
Route::post('/adding/process',[\App\Http\Controllers\CandidatesController::class,'createProcess'])->name('createCandidateProcess');

Route::get('/login/admin',function (){
    return view('admin.admin');
})->name('loginAdmin');
Route::post('/login',[\App\Http\Controllers\AdminSimpleController::class,'check'])->name('checkAdmin');

Route::middleware('auth')->group(function (){
    Route::get('/cat/edit/form/{id}',[\App\Http\Controllers\Auth\CandidateEditController::class,'editForm'])->name('editForm');
    Route::get('/all/candidates',[\App\Http\Controllers\Auth\CandidateEditController::class,'allCandidate'])->name('allCandidate');
    Route::post('/edit/process',[\App\Http\Controllers\Auth\CandidateEditController::class,'edit'])->name('edit');
    Route::post('/edit/delete',[\App\Http\Controllers\Auth\CandidateEditController::class,'delete'])->name('delete');
    Route::post('/logout',[\App\Http\Controllers\Auth\CandidateEditController::class,'logout'])->name('leaveAccount');
});
