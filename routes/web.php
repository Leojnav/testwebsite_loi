<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\newsitems;
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
Route::get('/', function() {
    return view('home', [
        'heading' => 'Latest news',
        'news' => newsitems::all()
    ]);
});

// Single news item
Route::get('/news/{id}', function($id) {
    return view('news', [
        'news' => newsitems::find($id)
    ]);
});
