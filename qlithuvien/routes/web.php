<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('make', 'permissionController@index')->name('make');

Route::get('/', 'FrontController@index')->name('customer.index');
Route::get('danh-muc', 'FrontController@allcategory')->name('customer.allcategory');
Route::get('danh-muc/{id}', 'FrontController@category')->name('customer.category');
Route::get('sach/{id}', 'FrontController@book')->name('customer.book');
Route::post('book_finded', 'FrontController@book_finded')->name('customer.finded');

Route::get('/customer_login', 'FrontController@login')->name('customer.login');
Route::post('/customer_login', 'CustomerController@postLogin')->name('customer.postLogin');

Route::get('/customer_register', 'FrontController@register')->name('customer.register');
Route::post('/customer_register', 'CustomerController@store')->name('customer.store');

Route::post('/customer_logout', 'CustomerController@postLogout')->name('customer.postLogout');




Route::get('book_index', 'book_controller@book_index')->name('book_index');

Route::get('book_create', 'book_controller@book_create')->name('book_create');
Route::post('book_create', 'book_controller@book_store')->name('book_store');

Route::get('book_delete/{id}', 'book_controller@book_delete')->name('book_delete');


// Route::get('book_find', 'book_controller@book_find')->name('book_find');
// Route::post('book_finded', 'book_controller@book_finded')->name('book_finded');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/loginAdmin', 'CustomerController@adminpostLogin')->name('login');

Route::middleware(['checkacl:admin'], ['auth'])->group(function () {


    // modulle warehouse
    Route::prefix('warehouse')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'WarehouseController@index')->name('warehouse.index');
        Route::get('/create', 'WarehouseController@create')->name('warehouse.add');
        Route::post('/create', 'WarehouseController@store')->name('warehouse.store');
    });

    // modulle gallery
    Route::prefix('statistical')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'StatisticalController@index')->name('statistical.index');
        // Route::get('/create', 'GalleryController@create')->name('gallery.add');
        // Route::post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });

    // modulle gallery
    Route::prefix('gallery')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'GalleryController@index')->name('gallery.index');
        Route::get('/create', 'GalleryController@create')->name('gallery.add');
        Route::post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });

    // modulle item
    Route::prefix('item')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'ItemController@index')->name('item.index');
        Route::get('/create', 'ItemController@create')->name('item.add');
        Route::post('/create', 'ItemController@store')->name('item.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });
    
    // modulle category
    Route::prefix('category')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.add');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@update')->name('category.edit');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    // modulle user
    Route::prefix('users')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.add');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@update')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });
    // module role
    Route::prefix('roles')->group(function () {
        // Route::middleware(['checkacl:role-list'])->get('/', 'RoleController@index')->name('role.index');
        // Route::middleware(['checkacl:role-add'])->get('/create', 'RoleController@create')->name('role.add');
        // Route::middleware(['checkacl:role-add'])->post('/create', 'RoleController@store')->name('role.store');
        // Route::middleware(['checkacl:role-edit'])->get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        // Route::middleware(['checkacl:role-edit'])->post('/edit/{id}', 'RoleController@update')->name('role.edit');
        // Route::middleware(['checkacl:role-delete'])->get('/delete/{id}', 'RoleController@delete')->name('role.delete');
        
        Route::get('/', 'RoleController@index')->name('role.index');
        Route::get('/create', 'RoleController@create')->name('role.add');
        Route::post('/create', 'RoleController@store')->name('role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::post('/edit/{id}', 'RoleController@update')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });

});