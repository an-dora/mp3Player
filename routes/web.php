<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
})->name('home');

    Route::get('/thuvien',              [SongController::class,'index'])    ->name('danhsach');
    Route::get('/thong-tin-chi-tiet/{id?}',   [SongController::class, 'show'])    ->name('chitiet');
    Route::get('/them',                 [SongController::class, 'create'])  ->name('them');
    Route::post('/luu/{id?}',                 [SongController::class, 'update'])  ->name('luu');
    Route::get('/sua/{id?}',            [SongController::class, 'edit'])    ->name('sua');
    Route::get('/xoa/{id?}',           [SongController::class, 'destroy']) ->name('xoa');

    Route::get('/danh-sach-the-loai',            [categoryController::class, 'index'])      ->name('danhsachTL');
    Route::get('/them-the-loai',                 [categoryController::class, 'create'])     ->name('themTL');
    Route::post('/luu-the-loai/{id?}',                 [categoryController::class, 'update'])     ->name('luuTL');
    Route::get('/sua-the-loai/{id?}',            [categoryController::class, 'edit'])       ->name('suaTL');
    Route::get('/xoa-the-loai/{id?}',                  [categoryController::class, 'destroy'])    ->name('xoaTL');

    Route::get('/theloai/{theloai}', [categoryController::class, 'theloai'])->name('filter');

    Route::get('/tao-user',function(){
        return view('user.add');
    })->name('search');

    Route::prefix('/user')->group(function(){
        Route::get('/them', [userController::class, 'index'])->name('tao-user');
        Route::post('/save', [userController::class, 'save'])->name('save');
    });