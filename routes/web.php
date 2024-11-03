
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|ki
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware grdoup. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Front End
Route::middleware(['auth'])->group(function () {
  Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'index');
});
});



Route::controller(FrontEndController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');

});


//Category
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {


    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function (){

    Route::get('/category', 'index');

    Route::get('/category/create','create');

    Route::post('/category','store');

    Route::get('/category/{category}/edit','edit');

    Route::put('/category/{category}','update');
    });

    //Product
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('/products', 'index');
    //for the product ui
    Route::get('/products/create', 'create');
    //product creation
    Route::post('/product', 'store');

    //Edit User Interface
    Route::get('/product/{product}/edit', 'edit');
    //UPDATE the data
    Route::put('/product/{product}', 'update');

    //Delete Image
    Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
       //Ajax Color
       Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
    });


   //Color
    Route::controller(ColorController::class)->group(function () {
    Route::get('/colors', 'index');
    Route::get('/colors/create', 'create');
    //adding the color
    Route::post('/colors/create', 'store');
    //view the single color
    Route::get('/colors/{color}/edit', 'edit');
    //update the color
    Route::put('/colors/{color_id}', 'update');
    });

//sliders
    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slide}/edit', 'edit');
        Route::put('/sliders/{slide}', 'update');
        Route::get('/sliders/{slider}/delete', 'delete');

    });


    // Profile Controller
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index');
    });

    //Users
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user/store', 'store')->name('user.store');
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        Route::put('/user/update/{id}', 'update')->name('user.update');
    });







    Route::get('/brand', App\Http\Livewire\Admin\Brand\Index::class);
    //Test

    });

    Route::get('test/1', Test::class);

    Route::get('test/index',function (){
        return view('frontend.main');
    });













// Additional Functions
Route::get('/getChartData', [DashboardController::class, 'getStudentCount'])->name('getStudentCount');
Route::get('/export', [DashboardController::class, 'export'])->name('export ');
