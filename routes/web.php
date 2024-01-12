<?php

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

// Route::get('/test', function() {
//     return response('<h1>test</h1>', 200)
//     ->header('Content-Type', 'text/html');
// });
// Route::get('/id/{id}', function($id) {
//     //dd($id); Dump and die stops the execution of the script and gives you a 500 error
//     //ddd($id); Dump, die and debug stops the execution of the script and gives you a  debug screen. also gives you a 500 error
//     return response('id'. $id);
// })->where('id', '[0-9]+');
// Route::get('/search', function(Request $request) {
//     return $request->name.' '.$request->age;
// });

// All news items
Route::get('/', [newsController::class, 'index']);

// Show Create news item
Route::get('/news/create', [newsController::class, 'create']);

// BMI calculator page
Route::get('/bmi-calculator', function() {
    return view('bmi-calculator', [
        'pagetitle' => 'BMI calculator',
        'heading' => 'Body Mass Index (BMI) calculator'
    ]);
});
// Test page
Route::get('/lab', function() {
    return view('lab', [
        'pagetitle' => 'Experimentation lab',
        'heading' => 'Experimentation lab'
    ]);
});
// Emo bunny page
Route::get('/bunny', function() {
    return view('bunny', [
        'pagetitle' => 'Emo Bunny',
        'heading' => 'Emo Bunny'
    ]);
});
// Upload page
Route::get('/upload', function() {
    return view('upload', [
        'pagetitle' => 'Upload',
        'heading' => 'Upload'
    ]);
});

// Store News item dta
Route::post('/news', [newsController::class, 'store']);

// Delete News item
Route::delete('/news/{newsitems}', [newsController::class, 'destroy']);

// Show Edit news item
Route::get('/news/{newsitems}/edit', [newsController::class, 'edit']);

// Update News item data
Route::put('/news/{newsitems}', [newsController::class, 'update']);

// Single news item
Route::get('/news/{newsitems}', [newsController::class, 'show']);

// Show sign up create page
Route::get('/signup', [UserController::class, 'create']);

// Create new users'
Route::post('/users', [UserController::class, 'store']);