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

Route::any(uri: '/test',action: function (){
//    return 'Bienvenidos a Laravel 9.x';
//    return [
//        'saludo'=>'Bienvenidos a Laravel 9.x',
//        'materia'=>'PHP con Laravel (9.x)',
//        'profesor'=>'Carlos Castañeda'
//    ];
    return view('test', data: [
//        'title'=>'Clase básica de PHP'
    'subject'=>'Framework Laravel',
        'topics'=>[
            'blade'=>'Template engine',
                'routes'=>'routes/web.php'
        ]
    ]);
});

Route::get(
    '/test-controller',
    [\App\Http\Controllers\TestController::class, 'saludar']

);

Route::get(
    '/test-database',
    [\App\Http\Controllers\TestController::class, 'testdb']

);


Route::resource(
    '/students',
    \App\Http\Controllers\StudentsController::class
);

Route::resource(
    '/grades',
    \App\Http\Controllers\GradeController::class
)->except('show');

//Asociar una nota a un estudiante
Route::post(
    '/students/{student}/grades',
    [\App\Http\Controllers\StudentsController::class,'associateGradeStudent']
);

//Actualizar nota a un estudiante
Route::put(
    '/students/{student}/grades/{grade_student}',
    [\App\Http\Controllers\StudentsController::class,'updateGradeStudent']
);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('/students', \App\Http\Controllers\StudentsController::class)
    ->middleware('auth');
