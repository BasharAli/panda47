<?php

use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\AdsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BecomeAvendorController;
use App\Http\Controllers\API\BrandsController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\CompayTypesController;
use App\Http\Controllers\API\ContactDetailsController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\CouponsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeSlidersController;
use App\Http\Controllers\API\kargoCompaniesController;
use App\Http\Controllers\API\KargoController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\ShopsController;
use App\Http\Controllers\API\SubCategoriesController;
use App\Http\Controllers\API\TopProductsController;
use App\Http\Controllers\API\TopVendorController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\ShopController;
use App\Http\Livewire\ContactusComponent;
use App\Models\KargoCompanies;

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


Route::get('/home-sliders', [HomeSlidersController::class, 'index']);

Route::get('/categories', [CategoriesController::class, 'index']);

Route::get('/contact-details', [ContactDetailsController::class, 'index']);

Route::get('/brands', [BrandsController::class, 'index']);

Route::get('/sub-categories', [SubCategoriesController::class, 'index']);

Route::get('/coupons', [CouponsController::class, 'index']);

Route::get('/kargo-companies', [kargoCompaniesController::class, 'index']);

Route::get('/orders', [OrdersController::class, 'index']);

Route::get('/top-products', [TopProductsController::class, 'topProducts']);

Route::get('/products', [TopProductsController::class, 'allProducts']);

Route::get('/new-coming-products', [TopProductsController::class, 'newComingProducts']);

Route::get('/twin-ads', [AdsController::class, 'twinAds']);

Route::get('/single-ad', [AdsController::class, 'singleAd']);

Route::get('/shops', [ShopsController::class, 'index']);

Route::get('/users', [UsersController::class, 'index']);

Route::get('/price-sale', [SaleController::class, 'priceSale']);
Route::get('/time-sale', [SaleController::class, 'timeSale']);

Route::get('/top-vendor', [TopVendorController::class, 'topVendors']);
Route::get('/about-us', [AboutUsController::class, 'aboutUs']);
Route::get('/contact-us', [ContactUsController::class, 'contactUs']);

Route::get('/kargo-companies', [KargoController::class, 'kgCompanies']);
Route::get('/kargo-prices', [KargoController::class, 'kgPrices']);

Route::get('/contact-us', [ContactUsController::class, 'contactUs']);

Route::get('/company-types', [CompayTypesController::class, 'companyTypes']);


Route::post('/app/vendorapplication', [BecomeAvendorController::class, 'createStore']);

Route::post('/app/signup', [AuthController::class, 'signUp']);

Route::post('/app/log-in', [AuthController::class, 'logIn']);




















// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
