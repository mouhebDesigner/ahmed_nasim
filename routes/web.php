<?php

use App\Models\Td;
use App\Models\Tp;
use App\Models\Car;
use App\Models\User;
use App\Models\Module;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Enseignant\TdController;
use App\Http\Controllers\Enseignant\TpController;
use App\Http\Controllers\Enseignant\QuizController;
use App\Http\Controllers\Enseignant\ChapitreController;
use App\Http\Controllers\Enseignant\QuestionController;
use App\Http\Controllers\Enseignant\FormationController;
use App\Http\Controllers\Admin\MatiereController as matiere_admin;
use App\Http\Controllers\Enseignant\MatiereController as matiere_enseignant;
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
    Route::resource('matieres', matiere_admin::class);
    Route::get('user/{id}/approuver', [UserController::class, 'approuver']);
    Route::get('users', [UserController::class, 'index']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});
Route::prefix('enseignant')->group(function () {
    Route::resource('cours', matiere_enseignant::class);
    Route::get('td', function(){
        $matieres = Td::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get();
      
        return view('enseignants.tds.index', compact('matieres'));
    });
    Route::get('tp', function(){
        $matieres = Tp::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get();
      
        return view('enseignants.tps.index', compact('matieres'));
    });
    // Route::resource('tp', TpController::class);
    // Route::resource('quizzes', QuizzesController::class);
    // Route::resource('formations', FormationController::class);

    Route::prefix('matiere/{matiere_id}')->group(function ($matiere_id){
        Route::resource('chapitres', ChapitreController::class);
        Route::resource('travaux_diriges', TdController::class);
        Route::resource('travaux_pratiques', TpController::class);
        Route::resource('quizzes', QuizController::class)->only(['create', 'store']);
    });
    Route::prefix('quizze/{quizze_id}')->group(function ($matiere_id){
        Route::resource('questions', QuestionController::class)->only(['index', 'create', 'store']);
    });
    Route::prefix('formation/{quizze_id}')->group(function ($matiere_id){
        Route::resource('videos', VideoController::class)->only(['index', 'create', 'store']);
    });

    Route::resource('questions', QuestionController::class)->only(['destroy', 'edit', 'update']);

    Route::resource('quizzes', QuizController::class)->except(['create', 'store']);
    
    
    Route::resource('formations', FormationController::class);

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
Route::get('/teachers', function(){

    $teachers= User::where('grade', 'enseignant')->with('enseignant')->get();
    return response()->json($teachers);

});

Route::post('enseignant', [EnseignantController::class, 'store']);
Route::post('etudiant', [EtudiantController::class, 'store']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
