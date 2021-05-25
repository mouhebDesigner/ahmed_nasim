<?php

use App\Models\Td;
use App\Models\Tp;
use App\Models\Car;
use App\Models\User;
use App\Models\Module;
use App\Models\Activite;
use App\Models\Chapitre;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\TravailDemande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizzeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TravailController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Enseignant\TdController;
use App\Http\Controllers\Enseignant\TpController;
use App\Http\Controllers\Enseignant\QuizController;
use App\Http\Controllers\Enseignant\ChapitreController;
use App\Http\Controllers\Enseignant\QuestionController;
use App\Http\Controllers\Admin\MatiereController as matiere_admin;
use App\Http\Controllers\Admin\EtudiantController as etudiant_admin;
use App\Http\Controllers\ForumController as ForumController_etudiant;
use App\Http\Controllers\ModuleController as ModuleController_etudiant;
use App\Http\Controllers\Admin\EnseignantController as enseignant_admin;
use App\Http\Controllers\MatiereController as MatiereController_etudiant;
use App\Http\Controllers\Enseignant\MatiereController as matiere_enseignant;
use App\Http\Controllers\FormationController as FormationController_etudiant;
use App\Http\Controllers\Admin\FormationController as formation_controller_admin;
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
    Route::resource('formations', formation_controller_admin::class);
    Route::resource('enseignants', enseignant_admin::class); 
    Route::resource('etudiants', etudiant_admin::class);
    Route::resource('admins', AdminController::class);
    Route::prefix('formation/{formation_id}')->group(function ($matiere_id){
        Route::resource('videos', VideoController::class)->only(['index', 'create', 'store']);
    });
    Route::resource('videos', VideoController::class)->only(['update', 'destroy', 'edit']);

});
Route::middleware(['approved'])->group(function () {
    // etudiant routes 
    Route::get('matiere/{matiere_id}/quizze', [QuizzeController::class, 'index']);
    Route::post('quizze/{quizze_id}', [QuizzeController::class, 'store']);
    Route::get('repasser/{quizze_id}', [QuizzeController::class, 'repasser']);
    Route::resource('matieres', MatiereController_etudiant::class);
    Route::resource('formations', FormationController_etudiant::class)->except('index');
    Route::get('forums/{id}/show', [ForumController::class, 'show'])->middleware('auth');

    Route::get('forums/create', [ForumController::class, 'create'])->middleware('auth');
    Route::post('forums', [ForumController::class, 'store'])->middleware('auth');
    Route::put('forums/{id}', [ForumController::class, 'edit'])->middleware('auth');
    Route::delete('forums/{id}', [ForumController::class, 'destroy'])->middleware('auth');
    // Déposer activite 
    Route::post('activite/{activite_id}/deposer',  [TravailController::class, 'deposer']);
    // esneigantn reoutes
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
        Route::get('matieres', [matiere_enseignant::class, 'matiere'])->middleware('auth');
        Route::prefix('quizze/{quizze_id}')->group(function ($matiere_id){
            Route::resource('questions', QuestionController::class)->only(['index', 'create', 'store']);
        });
        
    
        Route::resource('questions', QuestionController::class)->only(['destroy', 'edit', 'update']);
    
        Route::resource('quizzes', QuizController::class)->except(['create', 'store']);
        
        
    
    });

   
});

Route::get('formations', [FormationController_etudiant::class, 'index']);

Route::get('/approval', [App\Http\Controllers\HomeController::class, 'approval'])->name('approval')->middleware('auth');


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
Route::get('/enseignants', function(){

    $teachers= User::where('grade', 'enseignant')->with('enseignant')->get();
    return response()->json($teachers);

});
Route::get('/sections', function(){

    $sections = Section::all();

    return response()->json($sections);

});

Route::post('enseignant', [EnseignantController::class, 'store']);
Route::post('etudiant', [EtudiantController::class, 'store']);
Route::get('modules', [ModuleController_etudiant::class, 'index']);
Route::get('module/{module_id}/matieres', [ModuleController_etudiant::class, 'matieres']);
// Route::get('forum', [ForumController_etudian::class, 'index']);


// Download file
Route::get('/download_chapitre/{id}', function($id){

    $document = Chapitre::find($id);

    $file = storage_path().'/app/public/'.$document->content;

    $extension = explode('.', $file);
    $header = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, "$document->titre.pdf", $header);
});
// Download file
Route::get('/download_activite/{id}', function($id){

    $document = Activite::find($id);

    $file = storage_path().'/app/public/'.$document->document;

    $extension = explode('.', $file);
    $header = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, "$document->titre.pdf", $header);
});
Route::get('forums', [ForumController::class, 'index']);



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('travail', function(){
    $travails = TravailDemande::all(); 
    return view('travail', compact('travails'));
});

Route::get('downloadTravail/{id}', function($id){
    // traiteent de download
    $document = TravailDemande::find($id);

    $file = storage_path().'/app/public/'.$document->fichier;
    // storage/app/public/files/ajkzdghjgdateydafzuydazd.pdf

    // $extension = explode('.', $file);
    $header = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, "$document->user->nom.pdf", $header);

});

// Contact admin
Route::resource('contact', ContactController::class);

// add coment 
Route::resource('commentaires', CommentaireController::class);

Route::get('image_upload', function(){
    return view('image_upload');
});
Route::post('image', function(Request $request){
    return $request->photo->store('images');
});