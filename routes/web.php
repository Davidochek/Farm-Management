<?php

use App\Http\Controllers\CropController;
use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PestsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\User\AdminsController;
use App\Http\Controllers\User\BuyersController;
use App\Http\Controllers\User\SprovidersController;
use App\Http\Controllers\User\SuperusersController;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    // return view('crops.home');
    return view('admins.login');
});



Route::get('/home', HomeComponent::class)->name('home');
Route::get('/pests', [PestsController::class, 'index'])->name('pests');
Route::get('/diseases', [DiseasesController::class, 'index'])->name('diseases');
// Route::get('/market', [MarketController::class, 'index'])->name('market');
Route::get('/marketdetails', [MarketController::class, 'marketdetails'])->name('marketdetails');
// Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');
Route::post('/searchPest', [SearchController::class, 'searchPest'])->name('searchPest');
Route::post('/searchDisease', [SearchController::class, 'searchDisease'])->name('searchDisease');
Route::get('/showPests/{pest_slug}', [SearchController::class, 'showPests'])->name('showPests');
Route::get('/showPests/{id}', [SearchController::class, 'showPests'])->name('showPests');
Route::get('/showDiseases/{disease_slug}', [SearchController::class, 'showDiseases'])->name('showDiseases');
Route::get('/showDiseases/{id}', [SearchController::class, 'showDiseases'])->name('showDiseases');
Route::get('/showPestDetails/{id}', [SearchController::class, 'showPestDetails'])->name('showPestDetails');
Route::get('/showPestPesticides/{id}', [SearchController::class, 'showPestPesticides'])->name('showPestPesticides');
Route::get('/showDiseaseDetails/{id}', [SearchController::class, 'showDiseaseDetails'])->name('showDiseaseDetails');
Route::get('/showDiseasePesticides/{id}', [SearchController::class, 'showDiseasePesticides'])->name('showDiseasePesticides');
Route::get('/searchPests', [SearchController::class, 'searchPests'])->name('searchPests');
// Route::resource('/market', MarketController::class);
Route::post('/create_orders', [OrderController::class, 'create_orders'])->name('create_orders');
Route::resource('/services', ServicesController::class);
Auth::routes();

Route::prefix('buyer')->name('buyers.')->group(function(){
Route::middleware(['guest:buyer', 'PreventBackHistory'])->group(function(){
Route::view('/login', 'buyers.login')->name('login');
Route::view('/register', 'buyers.register')->name('register');
Route::post('/create', [BuyersController::class, 'create'])->name('create');
Route::post('/check', [BuyersController::class, 'check'])->name('check');
});
Route::middleware(['auth:buyer', 'PreventBackHistory'])->group(function(){
Route::view('/home', 'buyers.home')->name('home');
Route::post('logout', [BuyersController::class, 'logout'])->name('logout');
});
});

Route::prefix('admin')->name('admins.')->group(function(){
Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
Route::view('/login', 'admins.login')->name('login');
Route::view('/register', 'admins.register')->name('register');
Route::post('/create', [AdminsController::class, 'create'])->name('create');
Route::post('/check', [AdminsController::class, 'check'])->name('check');
});
Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
// Route::view('/home', 'admins.home')->name('home');
	Route::get('/home', [FarmerController::class, 'chart'])->name('home');
	// Route::get('/home', [FarmerController::class, 'farmerinfo'])->name('home');
Route::post('logout', [AdminsController::class, 'logout'])->name('logout');
// Route::view('register-crop', 'admins.register-crop')->name('register-crop');
Route::view('register-farmer', 'admins.register-farmer')->name('register-farmer');
Route::get('register-crop', [FarmerController::class, 'registercrops'])->name('register-crop');
Route::get('register-farms', [FarmerController::class, 'registerfarms'])->name('register-farms');
Route::get('view-harvest', [FarmerController::class, 'viewharvest'])->name('view-harvest');
Route::get('harvest-reports', [FarmerController::class, 'harvestreports'])->name('harvest-reports');
Route::get('services-report', [FarmerController::class, 'servicesreports'])->name('services-report');
Route::get('register-services', [FarmerController::class, 'registerservices'])->name('register-services');
Route::get('previewfarmer/{id}', [FarmerController::class, 'previewfarmer'])->name('previewfarmer');
Route::get('farmerdetails/{id}', [FarmerController::class, 'farmerdetails'])->name('farmerdetails');
Route::get('farmers', [FarmerController::class, 'farmers'])->name('farmers');
Route::post('create_service2', [ServicesController::class, 'create_service2'])->name('create_service2');
Route::get('services', [FarmerController::class, 'services'])->name('services');
});
});
Route::prefix('superuser')->name('superusers.')->group(function(){
Route::middleware(['guest:superuser', 'PreventBackHistory'])->group(function(){
Route::view('/login', 'superusers.login')->name('login');
Route::view('/register', 'superusers.register')->name('register');
Route::post('/create', [SuperusersController::class, 'create'])->name('create');
Route::post('/check', [SuperusersController::class, 'check'])->name('check');
});
Route::middleware(['auth:superuser', 'PreventBackHistory'])->group(function(){
Route::view('/home', 'superusers.home')->name('home');
Route::post('logout', [SuperusersController::class, 'logout'])->name('logout');
Route::view('register_service', 'superusers.register-service')->name('register_service');
Route::get('/all', [ServicesController::class, 'all'])->name('all');
Route::get('/preview/{id}', [ServicesController::class, 'preview'])->name('preview');
Route::post('/approve/{id}', [ServicesController::class, 'approve'])->name('approve');
Route::post('create_service', [ServicesController::class, 'create_service'])->name('create_service');
Route::get('service_requests', [ServicesController::class, 'service_requests'])->name('service_requests');
});
});

Route::prefix('sprovider')->name('sproviders.')->group(function(){
Route::middleware(['guest:sprovider', 'PreventBackHistory'])->group(function(){
Route::view('/login', 'sproviders.login')->name('login');
Route::view('/register', 'sproviders.register')->name('register');
Route::post('/create', [SprovidersController::class, 'create'])->name('create');
Route::post('/check', [SprovidersController::class, 'check'])->name('check');
});
Route::middleware(['auth:sprovider', 'PreventBackHistory'])->group(function(){
Route::view('/home', 'sproviders.home')->name('home');
Route::post('logout', [SprovidersController::class, 'logout'])->name('logout');
Route::view('register_service', 'sproviders.register-service')->name('register_service');
Route::post('create_service', [ServicesController::class, 'create_service'])->name('create_service');
});
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/market', MarketController::class, [
    'only' => ['index', 'store']
]);
Route::put('updatefarmer/{id}', [FarmerController::class, 'updatefarmer'])->name('updatefarmer');
Route::get('previewcrop/{id}', [CropController::class, 'previewcrop'])->name('previewcrop');
Route::post('admins/pdfreport', [FarmerController::class, 'pdfreport'])->name('admins.pdfreport');
Route::get('admins/print/{id}', [FarmerController::class, 'print'])->name('admins.print');
Route::get('admins/print2/{id}', [FarmerController::class, 'print2'])->name('admins.print2');
Route::resource('farmers', FarmerController::class);
Route::resource('fields', FieldController::class);
Route::resource('harvests', HarvestController::class);
