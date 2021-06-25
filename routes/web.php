<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetallesComponent;
use App\Http\Livewire\CategoriaComponent;
use App\Http\Livewire\FinalizarOrdenComponent;
use App\Http\Livewire\User\UserOrdenComponent;
use App\Http\Livewire\Admin\AdminOrdenComponent;
use App\Http\Livewire\Admin\AdminAgregarCategoria;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminProductoComponent;
use App\Http\Livewire\Admin\AdminCategoriaComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserOrdenDetalleComponent;
use App\Http\Livewire\Admin\AdminOrdenDetalleComponent;
use App\Http\Livewire\Admin\AdminEditarProductoComponent;
use App\Http\Livewire\Admin\AdminAgregarProductoComponent;
use App\Http\Livewire\Admin\AdminEditarCategoriaComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('producto.cart');

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/producto/{slug}', DetallesComponent::class)->name('producto.detalles');

Route::get('/producto-categoria/{categoria_slug}', CategoriaComponent::class)->name('producto.categoria');

Route::get('/search', SearchComponent::class)->name('producto.search');

Route::get('/finalizar-orden', FinalizarOrdenComponent::class)->name('gracias');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

//RUTA PARA USUARIO CLIENTE
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');  
    Route::get('/user/orden', UserOrdenComponent::class)->name('user.orden');
    Route::get('/user/orden/{orden_id}', UserOrdenDetalleComponent::class)->name('user.ordendetalle');   
});

//RUTA PARA ADMINISTRADOR
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard'); 
    Route::get('/admin/categorias', AdminCategoriaComponent::class)->name('admin.categorias');
    Route::get('/admin/categorias/add', AdminAgregarCategoria::class)->name('admin.addcategorias');
    Route::get('/admin/categorias/edit/{categoria_slug}', AdminEditarCategoriaComponent::class)->name('admin.editcategorias');
    Route::get('/admin/productos', AdminProductoComponent::class)->name('admin.productos');
    Route::get('/admin/productos/add', AdminAgregarProductoComponent::class)->name('admin.addproducto');
    Route::get('/admin/productos/edit/{producto_slug}', AdminEditarProductoComponent::class)->name('admin.editproducto');
    Route::get('/admin/orden', AdminOrdenComponent::class)->name('admin.orden');
    Route::get('/admin/orden/{orden_id}', AdminOrdenDetalleComponent::class)->name('admin.ordendetalle');

});