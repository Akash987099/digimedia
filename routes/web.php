<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::controller(HomeController::class)->group(function(){

//     Route::match(['get' , 'post'] , '/' , 'index')->name('index');

// });

Route::controller(LoginController::class)->group(function(){

    Route::match(['get' , 'post'] , 'admin/login' , 'adminLogin')->name('adminLogin');
    Route::match(['get' , 'post'] , 'adminLogins' , 'adminLogins')->name('adminLogins');

});

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {

    Route::match(['get', 'post'], '/logout', [Logincontroller::class, 'adminlogout'])->name('logout');

    Route::controller(AdminController::class)->group(function(){

        Route::match(['get' , 'post'] , '' ,'index')->name('index');

    });

    Route::controller(MenuController::class)->group(function(){

        Route::match(['get', 'post'], '/menus', 'Menus')->name('menus');
        Route::match(['get', 'post'], '/menus/list', 'MenusAjax')->name('menusAjax');
        Route::match(['get', 'post'], '/menus/save', 'Menusave')->name('Menusave');
        Route::match(['get', 'post'], '/Menus/delete', 'menudelete')->name('menu-delete');
        Route::match(['get', 'post'], '/menus/update', 'menuUpdate')->name('menuUpdate');
        Route::match(['get', 'post'], '/getmenu', 'getMenu')->name('getmenu');

        Route::match(['get', 'post'], '/submenus', 'subMenus')->name('submenus');
        Route::match(['get', 'post'], '/submenus/list', 'subMenusAjax')->name('submenusAjax');
        Route::match(['get', 'post'], '/submenus/save', 'SubMenusave')->name('submenusave');
        Route::match(['get' , 'post'] , '/submenu/delete' , 'submenu_delete')->name('submenu-delete');
        Route::match(['get', 'post'], '/submeu/update', 'updatesubmenu')->name('update-submenu');

        Route::match(['get', 'post'], '/pages', 'pages')->name('pages');
        Route::match(['get', 'post'], '/pages/list', 'pagesAjax')->name('pagesAjax');
        Route::match(['get', 'post'], '/pages/save', 'pagesSave')->name('pagessave');
        Route::match(['get' , 'post'] , 'page/delete' , 'delete_pages')->name('delete-pages');
        Route::match(['get' , 'post'] , 'update/page' , 'update_page')->name('update-page');

        Route::match(['get', 'post'], '/getsubmenus', 'getSubMenus')->name('getsubmenus');
        Route::match(['get', 'post'], '/pages/delete', 'pagesdelete')->name('pagesdelete');

        Route::match(['get','post'],'/pages/page-details/{id}','pageDetails')->name('page-details');

    });

});

Route::controller(PageController::class)->group(function() {
    
    Route::match(['get', 'post'], '/', 'index')->name('index');
    
    Route::match(['get'], '/{menu_slug}/{submenu_slug}/{page_slug}', 'showPage')->name('page.show');
    Route::match(['get'], '/{menu_slug}/{page_slug}', 'showMenuPage')->name('page.show.menu');
});