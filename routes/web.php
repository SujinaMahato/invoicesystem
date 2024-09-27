<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Category\CategoryController;
Use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManageSaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

//login controller
Route::get('/',[LoginController::class,'create']);
Route::post('/login',[LoginController::class,'store'])->name('admin.login');

//category controller
Route::get('/add',[CategoryController::class,'add']);
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/list', [CategoryController::class, 'list']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/categories/add',[CategoryController::class,'store'])->name('categories.add');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// customer controller
Route::resource('customers', CustomerController::class);
Route::get('/customer/list', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::get('/add-customer', function () {
    return view('admin.customer.add-customer');
});
Route::post('/add-customer', [CustomerController::class, 'create'])->name('customers.create');
Route::resource('/customer', CustomerController::class);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

//supplier controller
Route::get('/supplier-list', function () {
    return redirect('/supplierlist');
});
Route::get('/addsupplier', [SupplierController::class, 'create']);
Route::post('/suppliers', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplierlist', [SupplierController::class, 'index'])->name('supplier.index');
Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::get('/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');

//product controller
Route::get('/add-product',[ProductController::class,'add'])->name('product.add');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product-list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

//Unit controller
Route::get('/add-unit', [UnitController::class, 'addUnit'])->name('unit.add');
Route::post('/store-unit', [UnitController::class, 'store'])->name('unit.store');
Route::get('/unit-list', [UnitController::class, 'list'])->name('unit.list');
Route::get('/unit/{id}/edit', [UnitController::class, 'edit'])->name('unit.edit');
Route::put('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
Route::delete('/unit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

// saleterm controller
Route::get('/addsale',[ManageSaleController::class,'add'])->name('manage.add');
Route::post('/store-term',[ManageSaleController::class,'store'])->name('manage.store');
Route::get('/term-list',[ManageSaleController::class,'list'])->name('manage.list');
Route::get('/term/{id}/edit',[ManageSaleController::class,'edit'])->name('manage.edit');
Route::put('/term/update/{id}',[ManageSaleController::class,'update'])->name('manage.update');
Route::delete('/term/{id}',[ManageSaleController::class,'destroy'])->name('manage.delete');

//Purchase Controller

Route::resource('purchases', PurchaseController::class);

//Sale Controller
Route::resource('sale', SaleController::class);
/*Route::get('/newsale', function () {
    return view('admin.sale.newsale');
});*/

//Stock Controller
Route::get('/admin/stocks', [StockController::class, 'list'])->name('stocks.list');
Route::get('/admin/stocks/add', [StockController::class, 'add'])->name('stocks.add');
Route::post('/admin/stocks', [StockController::class, 'store'])->name('stocks.store');
Route::get('/admin/stocks/edit/{id}', [StockController::class, 'edit'])->name('stocks.edit');
Route::put('/admin/stocks/{id}', [StockController::class, 'update'])->name('stocks.update');
Route::delete('/admin/stocks/{id}', [StockController::class, 'destroy'])->name('stocks.delete');

















/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

//require __DIR__.'/auth.php';

