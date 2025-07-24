<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrestamoController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

/*Route::get('/', function () {
    return view('home');
});*/



Route::get('/login',[AuthController::class,'loginForm'])->name('login');

Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth')->group(function(){
    
    Route::get("/",HomeController::class)->name('home');

    Route::get('/books',[BooksController::class,'index'])->name('libros.index');

    Route::get('/clientes',[ClienteController::class,'index'])->name('clientes.index');

    Route::get('/books/registrar',[BooksController::class,'create'])->name('libros.crear');

    Route::get('/books/edit/{id}',[BooksController::class,'edit'])->name('libros.editar');

    Route::get('/books/delete/{id}',[BooksController::class,'delete'])->name('libros.eliminar');

    Route::post('/books/guardar',[BooksController::class,'guardar'])->name('libros.save');

    Route::put('/books/update/{libro}', [BooksController::class, 'editar'])->name('libros.update');

    Route::get('/Prestamos',[PrestamoController::class,'index'])->name('prestamos.index');

    Route::get('/Prestamos/registrar',[PrestamoController::class,'create'])->name('prestamos.registrar');

    Route::post('/Prestamos/guardar',[PrestamoController::class,'guardar'])->name('prestamos.guardar');

    Route::get('/Prestamos/edit/{id}',[PrestamoController::class,'edit'])->name('prestamos.edit');

    Route::put('/Prestamos/actualizar/{prestamo}',[PrestamoController::class,'actualizar'])->name('prestamos.actualizar');

    Route::get('/Prestamos/delete/{id}',[PrestamoController::class,'delete'])->name('prestamos.eliminar');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});