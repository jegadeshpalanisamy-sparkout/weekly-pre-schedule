<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WeekController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return ("hii");
});

Route::get('/week-home',[WeekController::class,'index'])->name('week');
Route::get('/week-add',[WeekController::class,'WeekForm'])->name('add-week');
Route::post('/week-store',[WeekController::class,'storeWeek'])->name('store-week');

Route::get('/weeks/{id}/edit', [WeekController::class, 'edit'])->name('week.edit');
Route::put('/weeks/{id}', [WeekController::class, 'update'])->name('week.update');
Route::delete('/weeks/{id}', [WeekController::class, 'destroy'])->name('week.destroy');



//team
Route::get('/team-home',[TeamController::class,'index'])->name('team');
Route::get('/team-add',[TeamController::class,'TeamForm'])->name('add-team');
Route::post('/team-store',[TeamController::class,'storeteam'])->name('store-team');

Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
Route::put('/teams/{id}', [TeamController::class, 'update'])->name('team.update');
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

//Employee
Route::get('/employee-home',[EmployeeController::class,'index'])->name('employee');
Route::get('/employee-add',[EmployeeController::class,'employeeForm'])->name('add-employee');
Route::post('/employee-store',[EmployeeController::class,'storeEmployee'])->name('store-employee');

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');