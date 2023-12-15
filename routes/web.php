<?php

use App\Http\Controllers\Admin\Cateautori;
use App\Http\Controllers\Admin\CentrosController;
use App\Http\Controllers\Admin\Coseguros;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlcoholismoController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\AntecedentesController;
use App\Http\Controllers\AntefamiliareController;
use App\Http\Controllers\AnteginecologicoController;
use App\Http\Controllers\FactoreController;
use App\Http\Controllers\DrogaController;
use App\Http\Controllers\Admin\EspecialidadeController;
use App\Http\Controllers\Admin\PrestadoreController;
use App\Http\Controllers\AutorizacioneController;
use App\Http\Controllers\EvolucioneController;
use App\Http\Controllers\HcController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PadronesController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\TabaquismoController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\VademecumController;
use App\Http\Controllers\Admin\MedicosController;
use App\Http\Controllers\CrecimientoController;
use App\Http\Controllers\VacunaController;
use App\Models\vacuna;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/admin', [AdminController::class, 'index'])
//     ->middleware('auth.admin')
//     ->name('admin.home');

// Route::get('users/create',[Admin\UserController::class, 'create'])->name('users.create');
Route::get('padrones/importar',[PadronesController::class, 'importar'])->name('padrones.importar');
Route::get('padrones/exportar',[PadronesController::class, 'exportar'])->name('padrones.exportar');

Route::post('padrones/procesarexcel',[PadronesController::class, 'procesarexcel'])->name('padrones.procesarexcel');
Route::resource('padrones', PadronesController::class);

Route::get('/horario/dia',[HorarioController::class, 'dia'])->name('horario.dia');
Route::get('/horario/listar',[HorarioController::class, 'listar'])->name('horario.listar');
Route::post('/horario/agregar', [HorarioController::class, 'agregar'])->name('horario.agregar');
Route::post('/horario/agregardia', [HorarioController::class, 'agregardia'])->name('horario.agregardia');
Route::resource('horario', HorarioController::class);

Route::resource('droga', DrogaController::class);

Route::resource('antecedente',AntecedenteController::class);

Route::resource('practicas',PracticaController::class);

Route::get('/admin/nomenclador/index',[PracticaController::class, 'index'])->name('admin.nomenclador.index');
Route::get('/admin/nomenclador/show/{id}',[PracticaController::class, 'show'])->name('admin.nomenclador.show');
Route::patch('/admin/nomenclador/update/{id}',[PracticaController::class, 'update'])->name('admin.nomenclador.update');
Route::get('/admin/nomenclador/create',[PracticaController::class, 'create'])->name('admin.nomenclador.create');
Route::post('/admin/nomenclador/store',[PracticaController::class, 'store'])->name('admin.nomenclador.store');

Route::get('/admin/vademecum/index',[VademecumController::class, 'index'])->name('admin.vademecum.index');
Route::get('/admin/vademecum/show/{id}',[VademecumController::class, 'show'])->name('admin.vademecum.show');
Route::patch('/admin/vademecum/update/{id}',[VademecumController::class, 'update'])->name('admin.vademecum.update');
Route::get('/admin/vademecum/create',[VademecumController::class, 'create'])->name('admin.vademecum.create');
Route::post('/admin/vademecum/store',[VademecumController::class, 'store'])->name('admin.vademecum.store');

Route::get('/admin/prestadores/index',[PrestadoreController::class,'index'])->name('admin.prestadores.index');
Route::get('/admin/prestadores/create',[PrestadoreController::class,'create'])->name('admin.prestadores.create');
Route::get('/admin/prestadores/show/{id}',[PrestadoreController::class,'show'])->name('admin.prestadores.show');
Route::patch('/admin/prestadores/update/{id}',[PrestadoreController::class,'update'])->name('admin.prestadores.update');

Route::get('/admin/especialidades/index',[EspecialidadeController::class,'index'])->name('admin.especialidades.index');
Route::get('/admin/especialidades/create',[EspecialidadeController::class,'create'])->name('admin.especialidades.create');
Route::post('/admin/especialidades/store',[EspecialidadeController::class,'store'])->name('admin.especialidades.store');
Route::get('/admin/especialidades/edit/{id}',[EspecialidadeController::class, 'edit'])->name('admin.especialidades.edit');
Route::patch('/admin/especialidades/update/{id}',[EspecialidadeController::class, 'update'])->name('admin.especialidades.update');

Route::get('/admin/catauto/index',[Cateautori::class, 'index'])->name('admin.catauto.index');
Route::get('/admin/catauto/create',[Cateautori::class, 'create'])->name('admin.catauto.create');
Route::post('/admin/catauto/store',[Cateautori::class, 'store'])->name('admin.catauto.store');
Route::get('/admin/catauto/edit/{id}',[Cateautori::class, 'edit'])->name('admin.catauto.edit');
Route::delete('/admin/catauto/destroy/{id}',[Cateautori::class,'destroy'])->name('admin.catauto.destroy');
Route::patch('/admin/catauto/update/{id}',[Cateautori::class,'update'])->name('admin.catauto.update');
// Route::post('/turnos/agregar',[TurnosController::class,'store'])->name('turnos.store');

Route::get('/turnos/xmedico',[TurnosController::class, 'indexMedico'])->name('turnos.xmedico');
Route::post('/turnos/xmedicoStore',[TurnosController::class, 'xmedicoStore'])->name('turnos.xmedicoStore');
Route::patch('/turnos/update/{id}',[TurnosController::class, 'update'])->name('turnos.update');
Route::delete('/turnos/destroy/{id}',[TurnosController::class, 'destroy'])->name('turnos.destroy');
Route::get('/turnos/borraragenda',[TurnosController::class, 'agendaBorrar'])->name('agenda.borrar');
Route::get('/turnos/agenda',[TurnosController::class, 'agendaIndex'])->name('agenda.index');
Route::post('/turnos/agendaDelete',[TurnosController::class, 'agendaDelete'])->name('agenda.delete');
Route::post('/turnos/agendaStore',[TurnosController::class, 'agendaStore'])->name('agenda.store');
Route::get('/turnos/index',[TurnosController::class, 'index'])->name('turnos.index');
Route::post('/turnos/store',[TurnosController::class, 'store'])->name('turnos.store');
Route::get('/turnos/show/{id}',[TurnosController::class, 'show'])->name('turnos.show');

Route::get('/turnos/xfecha',[TurnosController::class, 'indexFecha'])->name('turnos.xfecha');
Route::get('/turnos/xafiliado',[TurnosController::class, 'indexAfiliado'])->name('turnos.xafiliado');
Route::post('/turnos/listoxafiliado',[TurnosController::class,'listoxafiliado'])->name('turnos.listoxafiliado');

Route::post('/turnos/listarxfecha',[TurnosController::class, 'listarFecha'])->name('turnos.listarxfecha');
Route::get('/turnos/confirmar/{id}/{medico}',[TurnosController::class, 'confirmar'])->name('turnos.confirmar');
Route::get('/turnos/sobreturno/{medico}/{fecha}',[TurnosController::class, 'sobreturno'])->name('turnos.sobreturno');
Route::get('/turnos/eliminar/{id}',[TurnosController::class, 'eliminar'])->name('turnos.eliminar');

Route::get('/traer-turno/{afiliado}',[TurnosController::class, 'traer']);

Route::get('/edit-turno/{id}',[TurnosController::class, 'edit'])->name('turnos.editar');

Route::get('hc/index',[HcController::class, 'index'])->name('hc.index');
Route::get('hc/principal/{id}',[HcController::class, 'principal'])->name('hc.principal');
Route::get('hc/create/{id}',[HcController::class,'create'])->name('hc.create');
Route::get('hc/show/{id}',[HcController::class,'show'])->name('hc.show');
Route::post('hc/store',[EvolucioneController::class,'store'])->name('evolucion.store');
Route::patch('hc/update',[EvolucioneController::class,'update'])->name('evolucion.update');
Route::get('hc/showevos/{id}',[EvolucioneController::class,'showevos'])->name('evolucion.showevos');

Route::get('antecentes/index/{id}',[AntecedentesController::class, 'index'])->name('antecedentes.index');

Route::get('factores/index/{id}',[FactoreController::class, 'index'])->name('factores.index');
Route::post('factores/store',[FactoreController::class,'store'])->name('factores.store');
Route::patch('factores/update/{id}',[FactoreController::class,'update'])->name('factores.update');

Route::get('antecedentes/checktabaquismo/{id}',[AntecedentesController::class, 'checktabaco'])->name('antecedentes.checktabaco');
Route::get('antecedentes/checkalcohol/{id}',[AntecedentesController::class, 'checkalcohol'])->name('antecedentes.checkalcohol');
Route::get('antecedentes/checkdroga/{id}',[AntecedentesController::class, 'checkdroga'])->name('antecedentes.checkdroga');
Route::get('antecedentes/checkpersonal/{id}',[AntecedentesController::class, 'checkpersonal'])->name('antecedentes.checkpersonal');
Route::get('antecedentes/checkfamiliares/{id}',[AntecedentesController::class, 'checkfamiliares'])->name('antecedentes.checkfamiliares');
Route::get('antecedentes/checkgineco/{id}',[AntecedentesController::class, 'checkgineco'])->name('antecedentes.checkgineco');

Route::post('tabaquismo/store', [TabaquismoController::class, 'store'])->name('tabaquismo.store');
Route::Patch('tabaquismo/update/{id}',[TabaquismoController::class, 'update'])->name('tabaquismo.update');
Route::post('alcoholismo/store', [AlcoholismoController::class, 'store'])->name('alcoholismo.store');
Route::Patch('alcoholismo/update/{id}', [AlcoholismoController::class, 'update'])->name('alcoholismo.update');

Route::post('antefamiliares/store',[AntefamiliareController::class,'store'])->name('antefamiliares.store');
Route::Patch('antefamiliares/update/{id}',[AntefamiliareController::class,'update'])->name('antefamiliares.update');

Route::post('anteginecologicos/store',[AnteginecologicoController::class,'store'])->name('anteginecologicos.store');
Route::Patch('anteginecologicos/update/{id}',[AnteginecologicoController::class,'update'])->name('anteginecologicos.update');

Route::get('autorizaciones/create',[AutorizacioneController::class,'create'])->name('autorizaciones.create');
Route::post('autorizaciones/store',[AutorizacioneController::class,'store'])->name('autorizaciones.store');
Route::get('/traerAfiliados', [AutorizacioneController::class, 'traerAfiliados'])->name('traerAfiliados');

Route::post('/traerMedico', [AutorizacioneController::class, 'traerMedico'])->name('traerMedico');
Route::get('/traerPracticas', [AutorizacioneController::class, 'traerPracticas'])->name('traerPracticas');
Route::get('/buscaConvenio',[AutorizacioneController::class, 'buscaConvenio'])->name('buscaConvenio');
Route::post('/traerCategoria',[AutorizacioneController::class,'traerCategoria'])->name('traerCategoria');

Route::get('coseguros/create',[Coseguros::class,'create'])->name('admin.coseguros.create');
Route::post('coseguros/store',[Coseguros::class,'store'])->name('admin.coseguros.store');
Route::get('coseguros/index',[Coseguros::class,'index'])->name('admin.coseguros.index');
Route::post('/traerCoseguro', [Coseguros::class, 'traerCoseguro'])->name('traerCoseguro');

Route::get('vacunas/create/{id}',[VacunaController::class,'create'])->name('vacunas.create');
Route::get('vacunas/index',[VacunaController::class,'index'])->name('vacunas.index');
Route::post('vacunas/store',[VacunaController::class,'store'])->name('vacunas.store');

Route::get('crecimiento/index/{id}',[CrecimientoController::class,'index'])->name('crecimiento.index');
