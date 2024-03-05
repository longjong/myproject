<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ChinaController;
use App\Http\Controllers\HalalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThaiController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OtfController;
use App\Http\Controllers\OtwController;
use App\Http\Controllers\OtdController;
use App\Http\Controllers\OthController;
use App\Http\Controllers\OtsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PoliceController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\UserssController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TaxiController;
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





 

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->Middleware('is_admin');

Route::get('/otop/{otop}', [HomeController::class, 'GetOtop']);

// route event
Route::get('/act', [ActController::class,'index'])->name('act.event');

// route feeds
Route::resource('admin/feeds', FeedController::class);
Route::get('admin/feeds', [FeedController::class,'index'])->name('admin.feeds.index');
Route::get('admin/feeds/create', [FeedController::class,'create'])->name('admin.feeds.create');
Route::post('/feeds', [FeedController::class, 'store'])->name('admin.feeds.store');
Route::get('/feeds/{feeds}/edit', [FeedController::class, 'edit'])->name('admin.feeds.edit');
Route::put('/feeds/{feeds}/update', [FeedController::class, 'update'])->name('admin.feeds.update');
Route::delete('/feeds/{feeds}/destroy', [FeedController::class, 'destroy'])->name('admin.feeds.destroy');


// route events
Route::resource('admin/events', EventController::class);
Route::get('admin/events', [EventController::class,'index'])->name('admin.events.index');
Route::get('admin/events/create', [EventController::class,'create'])->name('admin.events.create');
Route::post('/events', [EventController::class, 'store'])->name('admin.events.store');
Route::get('/events/{events}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
Route::put('/events/{events}/update', [EventController::class, 'update'])->name('admin.events.update');
Route::delete('/events/{events}/destroy', [EventController::class, 'destroy'])->name('admin.events.destroy');


// route hotels
Route::resource('admin/hotels', HotelController::class);
Route::get('admin/hotels', [HotelController::class,'index'])->name('admin.hotels.index');
Route::get('admin/hotels/create', [HotelController::class,'create'])->name('admin.hotels.create');
Route::post('/hotels', [HotelController::class, 'store'])->name('admin.hotels.store');
Route::get('/hotels/{hotels}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');
Route::put('/hotels/{hotels}/update', [HotelController::class, 'update'])->name('admin.hotels.update');
Route::delete('/hotels/{hotels}/destroy', [HotelController::class, 'destroy'])->name('admin.hotels.destroy');


// route otfoods
Route::resource('admin/otfoods', OtfController::class);
Route::get('admin/otfoods', [OtfController::class,'index'])->name('admin.otfoods.index');
Route::get('otfoods/create', [OtfController::class,'create'])->name('admin.otfoods.create');
Route::post('/otfoods', [OtfController::class, 'store'])->name('admin.otfoods.store');
Route::get('/otfoods/{otfoods}/edit', [OtfController::class, 'edit'])->name('admin.otfoods.edit');
Route::put('/otfoods/{otfoods}/update', [OtfController::class, 'update'])->name('admin.otfoods.update');
Route::delete('/otfoods/{otfoods}/destroy', [OtfController::class, 'destroy'])->name('admin.otfoods.destroy');

// route otwaters
Route::resource('admin/otwaters', OtwController::class);
Route::get('admin/otwaters', [OtwController::class,'index'])->name('admin.otwaters.index');
Route::get('otwaters/create', [OtwController::class,'create'])->name('admin.otwaters.create');
Route::post('/otwaters', [OtwController::class, 'store'])->name('admin.otwaters.store');
Route::get('/otwaters/{otwaters}/edit', [OtwController::class, 'edit'])->name('admin.otwaters.edit');
Route::put('/otwaters/{otwaters}/update', [OtwController::class, 'update'])->name('admin.otwaters.update');
Route::delete('/otwaters/{otwaters}/destroy', [OtwController::class, 'destroy'])->name('admin.otwaters.destroy');

// route otherbs
Route::resource('admin/otherbs', OthController::class);
Route::get('admin/otherbs', [OthController::class,'index'])->name('admin.otherbs.index');
Route::get('otherbs/create', [OthController::class,'create'])->name('admin.otherbs.create');
Route::post('/otherbs', [OthController::class, 'store'])->name('admin.otherbs.store');
Route::get('/otherbs/{otherbs}/edit', [OthController::class, 'edit'])->name('admin.otherbs.edit');
Route::put('/otherbs/{otherbs}/update', [OthController::class, 'update'])->name('admin.otherbs.update');
Route::delete('/otherbs/{otherbs}/destroy', [OthController::class, 'destroy'])->name('admin.otherbs.destroy');

// route otshirts
Route::resource('admin/otshirts', OtsController::class);
Route::get('admin/otshirts', [OtsController::class,'index'])->name('admin.otshirts.index');
Route::get('otshirts/create', [OtsController::class,'create'])->name('admin.otshirts.create');
Route::post('/otshirts', [OtsController::class, 'store'])->name('admin.otshirts.store');
Route::get('/otshirts/{otshirts}/edit', [OtsController::class, 'edit'])->name('admin.otshirts.edit');
Route::put('/otshirts/{otshirts}/update', [OtsController::class, 'update'])->name('admin.otshirts.update');
Route::delete('/otshirts/{otshirts}/destroy', [OtsController::class, 'destroy'])->name('admin.otshirts.destroy');


// route otdecos
Route::resource('admin/otdecos', OtdController::class);
Route::get('admin/otdecos', [OtdController::class,'index'])->name('admin.otdecos.index');
Route::get('admin/otdecos/create', [OtdController::class,'create'])->name('admin.otdecos.create');
Route::post('/otdecos', [OtdController::class, 'store'])->name('admin.otdecos.store');
Route::get('/otdecos/{otdecos}/edit', [OtdController::class, 'edit'])->name('admin.otdecos.edit');
Route::put('/otdecos/{otdecos}/update', [OtdController::class, 'update'])->name('admin.otdecos.update');
Route::delete('/otdecos/{otdecos}/destroy', [OtdController::class, 'destroy'])->name('admin.otdecos.destroy');


// route halals
Route::resource('admin/halals', HalalController::class);
Route::get('admin/halals', [HalalController::class,'index'])->name('admin.halals.index');
Route::get('admin/halals/create', [HalalController::class,'create'])->name('admin.halals.create');
Route::post('/halals', [HalalController::class, 'store'])->name('admin.halals.store');
Route::get('/halals/{halals}/edit', [HalalController::class, 'edit'])->name('admin.halals.edit');
Route::put('/halals/{halals}/update', [HalalController::class, 'update'])->name('admin.halals.update');
Route::delete('/halals/{halals}/destroy', [HalalController::class, 'destroy'])->name('admin.halals.destroy');



// route banners
Route::resource('admin/banners', BannerController::class);
Route::get('admin/banners', [BannerController::class,'index'])->name('admin.banners.index');
Route::get('admin/banners/create', [BannerController::class,'create'])->name('admin.banners.create');
Route::post('/banners', [BannerController::class, 'store'])->name('admin.banners.store');
Route::get('/banners/{banners}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
Route::put('/banners/{banners}/update', [BannerController::class, 'update'])->name('admin.banners.update');
Route::delete('/banners/{banners}/destroy', [BannerController::class, 'destroy'])->name('admin.banners.destroy');

// route police
Route::resource('admin/postations', PoliceController::class);
Route::get('admin/postations', [PoliceController::class,'index'])->name('admin.postations.index');
Route::get('admin/postations/create', [PoliceController::class,'create'])->name('admin.postations.create');
Route::post('/postations', [PoliceController::class, 'store'])->name('admin.postations.store');
Route::get('/postations/{postations}/edit', [PoliceController::class, 'edit'])->name('admin.postations.edit');
Route::put('/postations/{postations}/update', [PoliceController::class, 'update'])->name('admin.postations.update');
Route::delete('/postations/{postations}/destroy', [PoliceController::class, 'destroy'])->name('admin.postations.destroy');

// route chinas
Route::resource('admin/chinas', ChinaController::class);
Route::get('admin/chinas', [ChinaController::class,'index'])->name('admin.chinas.index');
Route::get('admin/chinas/create', [ChinaController::class,'create'])->name('admin.chinas.create');
Route::post('/chinas', [ChinaController::class, 'store'])->name('admin.chinas.store');
Route::get('/chinas/{chinas}/edit', [ChinaController::class, 'edit'])->name('admin.chinas.edit');
Route::put('/chinas/{chinas}/update', [ChinaController::class, 'update'])->name('admin.chinas.update');
Route::delete('/chinas/{chinas}/destroy', [ChinaController::class, 'destroy'])->name('admin.chinas.destroy');


// route thais
Route::resource('admin/thais', ThaiController::class);
Route::get('admin/thais', [ThaiController::class,'index'])->name('admin.thais.index');
Route::get('admin/thais/create', [ThaiController::class,'create'])->name('admin.thais.create');
Route::post('/thais', [ThaiController::class, 'store'])->name('admin.thais.store');
Route::get('/thais/{thais}/edit', [ThaiController::class, 'edit'])->name('admin.thais.edit');
Route::put('/thais/{thais}/update', [ThaiController::class, 'update'])->name('admin.thais.update');
Route::delete('/thais/{thais}/destroy', [ThaiController::class, 'destroy'])->name('admin.thais.destroy');


// route userss
Route::resource('admin/userss', UserssController::class);
Route::get('admin/userss', [UserssController::class,'index'])->name('admin.userss.index');
Route::post('/userss', [UserssController::class, 'store'])->name('admin.userss.store');
Route::get('/userss/{userss}/edit', [UserssController::class, 'edit'])->name('admin.userss.edit');
Route::put('/userss/{userss}/update', [UserssController::class, 'update'])->name('admin.userss.update');
Route::delete('/userss/{userss}/destroy', [UserssController::class, 'destroy'])->name('admin.userss.destroy');


// route hospitals
Route::resource('admin/hospitals', HospitalController::class);
Route::get('admin/hospitals', [HospitalController::class,'index'])->name('admin.hospitals.index');
Route::get('admin/hospitals/create', [HospitalController::class,'create'])->name('admin.hospitals.create');
Route::post('/hospitals', [HospitalController::class, 'store'])->name('admin.hospitals.store');
Route::get('/hospitals/{hospitals}/edit', [HospitalController::class, 'edit'])->name('admin.hospitals.edit');
Route::put('/hospitals/{hospitals}/update', [HospitalController::class, 'update'])->name('admin.hospitals.update');
Route::delete('/hospitals/{hospitals}/destroy', [HospitalController::class, 'destroy'])->name('admin.hospitals.destroy');


// route busss
Route::resource('admin/busss', BusController::class);
Route::get('admin/busss', [BusController::class,'index'])->name('admin.busss.index');
Route::get('admin/busss/create', [BusController::class,'create'])->name('admin.busss.create');
Route::post('/busss', [BusController::class, 'store'])->name('admin.busss.store');
Route::get('/busss/{busss}/edit', [BusController::class, 'edit'])->name('admin.busss.edit');
Route::put('/busss/{busss}/update', [BusController::class, 'update'])->name('admin.busss.update');
Route::delete('/busss/{busss}/destroy', [BusController::class, 'destroy'])->name('admin.busss.destroy');


// route taxies
Route::resource('admin/taxies', TaxiController::class);
Route::get('admin/taxies', [TaxiController::class,'index'])->name('admin.taxies.index');
Route::get('admin/taxies/create', [TaxiController::class,'create'])->name('admin.taxies.create');
Route::post('/taxies', [TaxiController::class, 'store'])->name('admin.taxies.store');
Route::get('/taxies/{taxies}/edit', [TaxiController::class, 'edit'])->name('admin.taxies.edit');
Route::put('/taxies/{taxies}/update', [TaxiController::class, 'update'])->name('admin.taxies.update');
Route::delete('/taxies/{taxies}/destroy', [TaxiController::class, 'destroy'])->name('admin.taxies.destroy');





//  Route::get('res/{res_name}',[App\Http\Controllers\RestaurantController::class, 'resname'])->name('resname');

//pages
Route::get('banners', [PagesController::class,'Ban'])->name('banners');
Route::get('event', [PagesController::class,'event'])->name('event');
Route::get('restaurant/china', [PagesController::class,'restaurant'])->name('restaurant.china');
Route::get('restaurants/thai', [PagesController::class,'restaurants'])->name('restaurant.thai');
Route::get('restaurantss/halal', [PagesController::class,'restaurantss'])->name('restaurant.halal');
Route::get('otops/foodd', [PagesController::class,'of'])->name('otops.foodd');
Route::get('otops/water', [PagesController::class,'ow'])->name('otops.water');
Route::get('otops/herb', [PagesController::class,'oh'])->name('otops.herb');
Route::get('otops/shirt', [PagesController::class,'ot'])->name('otops.shirt');
Route::get('otops/decoration', [PagesController::class,'od'])->name('otops.decoration');
Route::get('stations/hosp', [PagesController::class,'hos'])->name('stations.hosp');
Route::get('stations/poli', [PagesController::class,'pol'])->name('stations.poli');
Route::get('stations/buss', [PagesController::class,'bus'])->name('stations.buss');
Route::get('stations/taxi', [PagesController::class,'taxi'])->name('stations.taxi');
Route::get('hotel', [PagesController::class,'hotel'])->name('hotel');