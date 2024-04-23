<?php

use App\Http\Controllers\estudianteController;
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

Route::get('/estudiantes',[estudianteController::class,'index']);
Route::post('/estudiantes',[estudianteController::class,'store']);
Route::get('/estudiantes/create',[estudianteController::class,'create']);
Route::delete('/estudiantes/{id}',[estudianteController::class,'destroy']);

Route::get('/estudiantes/{id}/edit', [estudianteController::class, 'edit']); 
Route::put('/estudiantes/{id}', [estudianteController::class, 'update']);

?>