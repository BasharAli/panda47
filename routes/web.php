<?php

use Illuminate\Http\Request;
use App\Http\Controllers\VendorApplicationController;
use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\BrandsComponent as AdminBrandsComponent;
use App\Http\Livewire\Admin\CategoriesComponent as AdminCategoriesComponent;
use App\Http\Livewire\Admin\CompanyTypesComponent;
use App\Http\Livewire\Admin\CouponsComponent;
use App\Http\Livewire\Admin\DeliveryMedthodsComponent;
use App\Http\Livewire\Admin\EditHomeSlidersComponent;
use App\Http\Livewire\Admin\HomeSlidersComponent;
use App\Http\Livewire\Admin\ProductsListComponent;
use App\Http\Livewire\Admin\SaleComponent;
use App\Http\Livewire\Admin\SingleAdComponent;
use App\Http\Livewire\Admin\SubCategoriesComponent;
use App\Http\Livewire\Admin\TaxesComponent;
use App\Http\Livewire\Admin\TopPageAds;
use App\Http\Livewire\Admin\Translations;
use App\Http\Livewire\Admin\UpdateCategoryComponent;
use App\Http\Livewire\Admin\UpdateSubCategoryComponent;
use App\Http\Livewire\Admin\UsersListComponent;
use App\Http\Livewire\Admin\VendorList;
use App\Http\Livewire\Admin\VendorProfile;
use App\Http\Livewire\Admin\VendorRequests;
use App\Http\Livewire\BecomeVendorLivewire;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoriesComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactusComponent;
use App\Http\Livewire\FaqComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\OfferComponent;
use App\Http\Livewire\ProductsComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\SingleProductComponent;
use App\Http\Livewire\SingleShopComponent;
use App\Http\Livewire\SubCategoryComponent;
use App\Http\Livewire\TrackOrderComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\VendorApplicationStatusComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\MyShopComponent;
use App\Http\Livewire\BrandsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\EditAccountDetailsComponent;
use App\Http\Livewire\User\OrderDetailsComponent;
use App\Http\Livewire\User\OrderHistoryComponent;
use App\Http\Livewire\Vendor\VendorAddProduct;
use App\Http\Livewire\Vendor\VendorDashboard;
use App\Http\Livewire\Vendor\VendorEditProduct;
use App\Http\Livewire\Vendor\VendorProductsList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AboutComponent;
use App\Http\Livewire\Admin\ContactDetailsComponent;
use App\Http\Livewire\Admin\KargoPricesComponent;
use App\Http\Livewire\Admin\VendorPayments;
use App\Http\Livewire\FailController;
use App\Http\Livewire\HataSayfasiComponent;
use App\Http\Livewire\OdemeOnayComponent;
use App\Http\Livewire\PaymentStepComponent;
use App\Http\Livewire\SuccessComponent;
use App\Http\Livewire\User\Invoice;
use App\Http\Livewire\User\InvoicesComponent;
use App\Http\Livewire\Vendor\VendorDelivery;
use App\Http\Livewire\Vendor\VendorEditDelivery;
use App\Http\Livewire\Vendor\VendorEditSettings;
use App\Http\Livewire\Vendor\VendorOrderDetails as VendorVendorOrderDetails;
use App\Http\Livewire\Vendor\VendorOrders;
use App\Http\Livewire\Vendor\VendorSettingsComponent;
use App\Http\Livewire\VendorOrderDetails;
use App\Models\ContactDetails;

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

Route::get('/', HomeComponent::class)->name('home');
Route::get('/all-shops', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart')->middleware('check.delivery.option');
Route::get('/categories', CategoriesComponent::class);
Route::get('/offer', OfferComponent::class)->name('hotoffer');
Route::get('/brands', BrandsComponent::class);
Route::get('/about-us', AboutusComponent::class);
Route::get('/wishlist', WishlistComponent::class);
Route::get('/vemail', [WishlistComponent::class, 'viewEmail']);
Route::get('/vinvoice', Invoice::class);
Route::get('/contactus', ContactusComponent::class);
Route::get('/faq', FaqComponent::class);
Route::get('/track-order', TrackOrderComponent::class);
Route::get('/singleshop/{slug}', SingleShopComponent::class);
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/product/{slug}', SingleProductComponent::class);
Route::get('/categories/{slug}', SubCategoryComponent::class);
Route::get('/categories/{categoryname}/{slug}', ProductsComponent::class);
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
Route::get('/thank-you/{user_id}/{order_id}', [ThankyouComponent::class, 'vInvoice']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);

// for fail request debugging
Route::get('/fail', function (Request $request) {
    if($request->AuthenticationResponse) {
        $RequestContent = urldecode($request->AuthenticationResponse);
        $data =  simplexml_load_string($RequestContent) or die("Error: Cannot create object");
        dd($request , $RequestContent , $data);
    }
    return "failed!";
})->name('fail');

// for success request debugging
Route::get('/done', function (Request $request) {
    if($request->AuthenticationResponse) {
        $RequestContent = urldecode($request->AuthenticationResponse);
        $data =  simplexml_load_string($RequestContent) or die("Error: Cannot create object");
        dd($request , $RequestContent , $data);
    }
    return "done!";
})->name('done');

Route::get('/logout', function(){

    session()->flush();
    return redirect('/');
    
})->name('logout');


//user
Route::middleware(['auth:sanctum' , 'verified',])->group(function(){

    Route::get('/check-out', CheckoutComponent::class)->name('checkout');
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('myaccount');
    Route::get('/vendorapplication', [VendorApplicationController::class, 'hasShop']);
    Route::get('/becomeavendor', BecomeVendorLivewire::class);
    Route::get('/myaccount/{slug}', VendorDashboard::class);
    Route::get('/myaccount/{slug}/orders', VendorOrders::class);
    Route::get('/myaccount/{slug}/orders/order-details/{order_id}', VendorVendorOrderDetails::class);
    Route::get('/myaccount/{slug}/products', VendorProductsList::class)->name('vendor.products');
    Route::get('/myaccount/{slug}/add-product', VendorAddProduct::class);
    Route::get('/myaccount/{slug}/info', VendorSettingsComponent::class);
    Route::get('/myaccount/{slug}/info/edit', VendorEditSettings::class);
    Route::get('/myaccount/{slug}/delivery', VendorDelivery::class)->name('deliveries');
    Route::get('/myaccount/{slug}/delivery/edit', VendorEditDelivery::class);
    Route::get('/myaccount/{slug}/products/{product_slug}/edit', VendorEditProduct::class)->name('vendor.editproducts');
    Route::get('/status/{slug}', VendorApplicationStatusComponent::class)->name('vendorapplicationstatus');
    Route::get('/{slug}/pay', PaymentStepComponent::class)->name('paymentstep');
    Route::get('/user/dashboard/edit-account-details/{user_id}', EditAccountDetailsComponent::class);
    Route::get('/user/dashboard/order-history', OrderHistoryComponent::class);
    Route::get('/user/dashboard/order-details/{order_id}', OrderDetailsComponent::class);
    Route::get('/user/dashboard/invoices', InvoicesComponent::class);
    // Route::get('/failurl', HataSayfasiComponent::class)->name('payment.failure');
    // Route::get('/successurl', OdemeOnayComponent::class)->name('payment.success');


    //post routes
    Route::post('/becomeavendor/apply', [BecomeVendorLivewire::class, 'store']);
});

//admin
Route::middleware(['auth:sanctum' , 'verified', 'authadmin'])->group(function(){

    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('adminpanel');
    Route::get('/admin/vendor-list', VendorList::class);
    Route::get('/admin/vendor-request', VendorRequests::class);
    Route::get('/admin/vendor-payments', VendorPayments::class);
    Route::get('/admin/vendor-profile/{slug}', VendorProfile::class);
    Route::get('/admin/user-list', UsersListComponent::class);
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('cat.add');
    Route::get('/admin/categories/{category_slug}/edit', UpdateCategoryComponent::class);
    Route::get('/admin/subcategories', SubCategoriesComponent::class)->name('sub.add');
    Route::get('/admin/subcategories/{subcategory_slug}/edit', UpdateSubCategoryComponent::class);
    Route::get('/admin/product-list', ProductsListComponent::class);
    Route::get('/admin/brands', AdminBrandsComponent::class);
    Route::get('/admin/homesliders', HomeSlidersComponent::class)->name('slider.add');
    Route::get('admin/homesliders/{slider_id}/edit', EditHomeSlidersComponent::class);
    Route::get('/admin/time-sales', SaleComponent::class)->name('admin.sale');
    Route::get('/admin/coupons', CouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/twin-ads', TopPageAds::class)->name('admin.ads');
    Route::get('/admin/single-ad', SingleAdComponent::class)->name('admin.singleAd');
    Route::get('/admin/taxes', TaxesComponent::class)->name('admin.taxes');
    Route::get('/admin/delivery-methods', DeliveryMedthodsComponent::class)->name('admin.delivery');
    Route::get('/admin/delivery-prices', KargoPricesComponent::class);
    Route::get('/admin/translation', Translations::class);
    Route::get('/admin/company-types', CompanyTypesComponent::class);
    Route::get('/admin/about-us', AboutComponent::class);
    Route::get('/admin/contact-details', ContactDetailsComponent::class);


});





// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
