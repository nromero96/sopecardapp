<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RepeccaController;
use App\Http\Controllers\RenavalController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


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

 //Ejecutar migración
 Route::get('/ejecutar-migraciones', function () {
    Artisan::call('migrate');
    return 'Migraciones ejecutadas con éxito.';
});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
});

//routes for user login
Route::group(['middleware' => ['auth', 'ensureStatusActive']], function () {
    
    Route::get('/crear-enlace', function () {
        Artisan::call('storage:link');
        return "Enlace simbólico creado con éxito.";
    });
    
    
    Route::get('/clear-cache', function () {
        try {
            // Limpiar la caché
            Artisan::call('cache:clear');
    
            // Limpiar la caché de configuración
            Artisan::call('config:cache');
    
            // Mensaje de éxito
            return 'Cache cleared successfully.';
        } catch (\Exception $e) {
            // Manejo de errores
            return 'Error clearing cache: ' . $e->getMessage();
        }
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/users', UserController::class)->names('users');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/sedes', SedeController::class)->names('sedes');

    Route::resource('/repecca', RepeccaController::class)->names('repecca');
    Route::resource('/renaval', RenavalController::class)->names('renaval');
});

Auth::routes();