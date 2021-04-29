<?php

use App\Models\Car;
use App\Models\Module;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\MatiereController;
use App\Http\Controllers\Admin\SectionController;

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
Route::prefix('admin')->group(function () {
    Route::resource('modules', ModuleController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('matieres', MatiereController::class);
    Route::resource('cours', CourController::class);
    Route::get('user/{id}/approuver', [UserController::class, 'approuver']);
    Route::get('users', [UserController::class, 'index']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});
Route::get('register/enseignant', function(){
    return view('auth.register_enseignant');
});
Route::get('register/etudiant', function(){
    return view('auth.register_etudiant');
});

Route::get('/module_list/{section_id}', function($section_id){

    $modules = Module::where('section_id', $section_id)->get();
    return response()->json($modules);

});

Route::post('enseignant', [EnseignantController::class, 'store']);
Route::post('etudiant', [EtudiantController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
