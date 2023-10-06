<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CentrosController;
use App\Http\Controllers\Admin\ConveniosController;
use App\Http\Controllers\Admin\PlanesController;
use App\Http\Controllers\Admin\MedicosController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('planes', PlanesController::class)->names('admin.planes');

Route::resource('convenios', ConveniosController::class)->names('admin.convenios');

Route::resource('centros', CentrosController::class)->names('admin.centros'); 

Route::get('/users/{user}/asignar', [UserController::class, 'asignar'])->name('user.asignar');
Route::put('/users/{id}/gcentro', [UserController::class, 'gcentro'])->name('user.gcentro');

Route::resource('users', UserController::class)->names('admin.users'); 

Route::get('/medicos/{medico}/asignar', [MedicosController::class, 'asignar'])->name('medico.asignar');
Route::put('/medicos/{id}/gcentro', [MedicosController::class, 'gcentro'])->name('medico.gcentro');

Route::resource('medicos', MedicosController::class)->names('admin.medicos');

