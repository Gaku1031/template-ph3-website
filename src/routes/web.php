<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');
Route::get('quiz/{id}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::put('/quizzes/{id}', [QuizController::class, 'update'])->name('quizzes.update');
Route::delete('/quizzes/{id}', [QuizController::class, 'delete'])->name('quizzes.delete');
Route::get('/quiz/create', [QuizController::class, 'createForm'])->name('quiz.create.form');
Route::post('/quizzes/create', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('/quizzes/{quiz}/restore', [QuizController::class, 'restore'])->name('quizzes.restore');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::get('quiz/{id}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::get('/quiz/create', [QuizController::class, 'createForm'])->name('quiz.create.form');
    Route::post('/quizzes/store', [QuizController::class, 'store'])->name('quizzes.store');
    Route::get('/quizzes/{quiz}/restore', [QuizController::class, 'restore'])->name('quizzes.restore');
});
require __DIR__.'/auth.php';
