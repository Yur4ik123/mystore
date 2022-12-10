<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products'], function ($router){
    $router->post('/create', [ProductsController::class, 'create'])->name('products.create');
    $router->put('/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    $router->get('/all', [ProductsController::class, 'getProducts'])->name('products.all');
    $router->post('/import', [ProductsController::class, 'import'])->name('products.import');
    $router->post('/xml-import', [ProductsController::class, 'xmlimport'])->name('products.xmlimport');
    $router->get('/{id}', [ProductsController::class, 'getOneProduct'])->name('products.one');
});
