<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;

Route::get('/', function () {
    return view('main');
});

###### aluno ########
Route::get('/aluno', [AlunoController::class, 'index']);
Route::get('/aluno/create', [AlunoController::class, 'create']);
Route::post(
    '/aluno/store',
    [AlunoController::class, 'store']
)->name('aluno.store');

Route::get(
    '/aluno/edit/{id}',
    [AlunoController::class, 'edit']
)->name('aluno.edit');
Route::put(
    '/aluno/update/{id}',
    [AlunoController::class, 'update']
)->name('aluno.update');

Route::delete(
    '/aluno/{id}',
    [AlunoController::class, 'destroy']
)->name('aluno.destroy');

Route::post(
    '/aluno/search',
    [AlunoController::class, 'search']
)->name('aluno.search');
#################################################

###### curso ########
// O report precisa estar ACIMA do resource
Route::get('/curso/report', 
    [CursoController::class, 'report'])->name('curso.report');

Route::get('/curso/report-matriculados', 
    [CursoController::class, 'reportMatriculados'])->name('curso.reportMatriculados');

Route::get('/curso/chart', 
    [CursoController::class, 'chart'])->name('curso.chart');

Route::get('/curso/chart-qtd-aluno-curso-chart', 
    [CursoController::class, 'chartQtdAlunoCurso'])->name('curso.qtdAlunoCursoChart');

Route::post(
    '/curso/search',
    [CursoController::class, 'search']
)->name('curso.search'); // Corrigido controller, name e adicionado ';' no final

Route::resource('curso', CursoController::class);

Route::get('/curso/{curso}/turmas', [TurmaController::class, 'index'])->name('curso.turmas');
Route::get('/curso/{curso}/turmas/create', [TurmaController::class, 'create'])->name('curso.turmas.create');
#############################################

###### turma ########
Route::post(
    '/turma/search',
    [TurmaController::class, 'search'] // Corrigido para TurmaController
)->name('turma.search');

Route::resource('turma', TurmaController::class);

###### matricula ########
Route::post(
    '/matricula/search',
    [MatriculaController::class, 'search'] // Corrigido para MatriculaController
)->name('matricula.search');

Route::resource('matricula', MatriculaController::class);
#################################################

/*
Route::get('/aluno', function () {
    return view('aluno.list');
    //return "<h3>Olá mundo Laravel!</h3>";
});
*/