<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FamilyController;

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

// イベント登録処理
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
// イベント取得処理
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');

Route::get('/calendar', function () {
    return view('calendar');})->name('calendar');

Route::get('/family', function () {
    return view('family');})->name('family');

Route::get('/create_family', function () {
    return view('create_family');})->name('create_family');

Route::post('/family/create', [FamilyController::class, 'create_family'])->name('family.create');

Route::get('/participate_family', function () {
    return view('participate_family');})->name('participate_family');

Route::get('/home', function () {
    return view('home');})->name('home');

Route::get('/profile/calendar', [ProfileController::class, 'calendar'])->name('profile.calendar');

Route::get('/', function () {
    return view('family');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
