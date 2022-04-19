<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\GoLoginController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\LoginControllers;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\GithubSocialController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlishController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\ShipAreaController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\MyprofileController;
use App\Http\Controllers\admin\pages\AboutController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\admin\ProductReviewsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\User\MyCartPageController;
use App\Http\Controllers\Frontend\CouponsController;
use App\Http\Controllers\Frontend\LanguageControler;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\AjaxModalController;
use App\Http\Controllers\Admin\SubsubcategoryController;
use App\Http\Controllers\Auth\FacebookSocialiteController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Frontend\CouponController as FrontendCouponController;
use App\Http\Controllers\Frontend\OrderTrackController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SubCategoryController as FrontendSubCategoryController;
use App\Http\Controllers\User\ProductReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[IndexController::class,'index']);
// Login With Google
Route::get('/auth/redirect/{provider}',[GoogleLoginController::class,'redirect']);
Route::get('/callback/{provider}',[GoogleLoginController::class,'callback']);
// Login With Facebook
 Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
 Route::get('/callback/{provider}', [SocialController::class, 'callback']);
// Login With Github
 Route::get('/auth/redirect/{provider}',[GithubSocialController::class,'redirect']);
 Route::get('/callback/{provider}',[GithubSocialController::class,'callback']);
/////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();
//admin login
Route::get('admin/home', [AdminController::class, 'index']);
Route::get('admin', [LoginControllers::class, 'showLoginForm'])->name('login.admin');
Route::post('admin', [LoginControllers::class, 'login']);

Route::group(['middleware' =>['permission']],function(){
//Admin My-Profile Route are Here
Route::get('admin/my-profile',[MyprofileController::class,'myProfile'])->name('my-profile');
Route::get('admin/edit/profile',[MyprofileController::class,'editProfile'])->name('admin.edit.profile');
Route::post('admin/update/profile',[MyprofileController::class,'profileUpdate'])->name('admin.profile.update');
Route::post('update/password',[MyprofileController::class,'updatePassword'])->name('admin.change.password');
// All User Show
Route::get('all/users',[MyprofileController::class,'allUsers']);
Route::get('active/users/{id}',[MyprofileController::class,'activeUsers']);
Route::get('admin/user/banned/{id}',[MyprofileController::class,'userBanned']);
Route::get('admin/user/unbanned/{id}',[MyprofileController::class,'userUnBanned']);
// Search By Ajax User
Route::post('admin/search-users/',[MyprofileController::class,'searchByUser'])->name('search.users');

//Brands Router Here
Route::get('admin/brands',[BrandController::class,'index'])->name('brands');
ROute::post('admin/brands/store',[BrandController::class,'brnadStore'])->name('brands.store');
Route::get('admin/brands/delete/{id}',[BrandController::class,'brandDelete']);
Route::get('admin/brands/edit/{id}',[BrandController::class,'brandEdit']);
Route::post('admin/brands/update/',[BrandController::class,'brandUpdate'])->name('brands.update');
//Category
Route::get('admin/category',[CategoryController::class,'index'])->name('category');
Route::post('admin/category-store',[CategoryController::class,'categoryStore'])->name('category.store');
Route::get('admin/category/delete/{id}',[CategoryController::class,'categoryDelete']);
Route::get('admin/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::post('admin/category/update/',[CategoryController::class,'categoryUpdate'])->name('category.update');
//Subcategory
Route::get('admin/subcategory',[SubcategoryController::class,'index'])->name('subcategory');
Route::post('admin/subcategories/store',[SubcategoryController::class,'subCatStore'])->name('subcategories.store');
Route::get('admin/subcategory/edit/{id}',[SubcategoryController::class,'subcatEdit']);
Route::post('admin/subcategory/update',[SubcategoryController::class,'subcatUpdate'])->name('subcategory.update');
Route::get('admin/subcategory/delete/{id}',[SubcategoryController::class,'subcatDelete']);
//Subsubcategory
Route::get('admin/subsubcategory',[SubsubcategoryController::class,'index'])->name('subsubcategory');
Route::get('/admin/subcategory/ajax/{cat_id}',[SubsubcategoryController::class,'getSubcategoy']);
Route::post('admin/subcategory/store',[SubsubcategoryController::class,'subsubCatStore'])->name('subsubcategory.store');
Route::get('admin/subsubcategory/delete/{id}',[SubsubcategoryController::class,'subsubcatDelete']);
Route::get('admin/subsubcategory/edit/{id}',[SubsubcategoryController::class,'subsubEdit']);
Route::post('admin/subsubcategory/update/',[SubsubcategoryController::class,'subsubCatUpdate'])->name('subsubcategory.update');
//Products
Route::get('admin/add-product',[ProductController::class,'addProduct'])->name('add.product');
Route::post('admin/product-store',[ProductController::class,'productStore'])->name('product.store');
Route::get('admin/subsubcategory/ajax/{id}',[ProductController::class,'getSubSubcategoy']);
Route::get('admin/porduct-manage',[ProductController::class,'productManage'])->name('product.manage');
Route::get('admin/product/edit/{product_id}',[ProductController::class,'productEdit']);
Route::get('admin/product/view/{product_id}',[ProductController::class,'productView']);
Route::get('admin/product/delete/{id}',[ProductController::class,'productDelete']);
Route::post('admin/product/update',[ProductController::class,'productUpdate'])->name('product.update');
Route::post('admin/product/thambnail/update',[ProductController::class,'productThamnailUpdate'])->name('product.thambnail.update');
Route::post('admin/product/update/multiple-img',[ProductController::class,'producMultiImg'])->name('multiple.img.update');
Route::get('admin/product/multiimg/delete/{id}',[ProductController::class,'multiImgDelete']);
Route::get('admin/product/inactive/{id}',[ProductController::class,'productInactive']);
Route::get('admin/product/active/{id}',[ProductController::class,'productActive']);
/// Slider
Route::get('admin/slider',[SliderController::class,'index'])->name('sliders');
Route::post('admin/slider-store',[SliderController::class,'sliderStore'])->name('sliders.store');
Route::get('admin/slider/edit/{id}',[SliderController::class,'sliderEdit']);
Route::post('admin/slider/update/',[SliderController::class,'sliderUpdate'])->name('sliders.update');
Route::get('admin/slider/delete/{id}',[SliderController::class,'sliderDelete']);
Route::get('admin/slider/inactive/{id}',[SliderController::class,'sliderInactive']);
Route::get('admin/slider/active/{id}',[SliderController::class,'sliderActive']);
// Coupon
Route::get('admin/coupon',[CouponController::class,'couponCreate'])->name('coupon');
Route::post('admin/coupon-store',[CouponController::class,'couponStore'])->name('coupon.store');
Route::get('admin/coupon/edit/{id}',[CouponController::class,'couponEdit']);
Route::post('admin/coupon-update',[CouponController::class,'couponUpdate'])->name('coupon.update');
Route::get('admin/coupon/delete/{id}',[CouponController::class,'couponDelete']);
Route::get('admin/coupon/inactive/{id}',[CouponController::class,'couponInactive']);
Route::get('admin/coupon/active/{id}',[CouponController::class,'couponActive']);
// Add Division
Route::get('/admin/add/division',[ShipAreaController::class,'addDivision'])->name('division');
Route::post('/admin/store/division',[ShipAreaController::class,'storeDivison'])->name('division.store');
Route::get('admin/division/edit/{id}',[ShipAreaController::class,'divisionEdit']);
Route::post('admin/division/update',[ShipAreaController::class,'updateDivision'])->name('update.division');
Route::get('admin/division/delete/{id}',[ShipAreaController::class,'divisionDelete']);

// Add District
Route::get('admin/add/district',[ShipAreaController::class,'addDistrict'])->name('district');
Route::post('admin/store/district',[ShipAreaController::class,'storeDistrict'])->name('district.store');
Route::get('admin/district/edit/{id}',[ShipAreaController::class,'editDistrict']);
Route::post('admin/district/update',[ShipAreaController::class,'districtUpdate'])->name('district.update');
Route::get('admin/district/delete/{id}',[ShipAreaController::class,'districtDelete']);
// Add State
Route::get('admin/add/state',[ShipAreaController::class,'addState'])->name('state');
// District Show with Ajax
Route::get('/admin/distrct/ajax/{id}',[ShipAreaController::class,'getDistrictAjax']);
Route::post('/admin/state/store',[ShipAreaController::class,'stateStore'])->name('state.store');
Route::get('admin/state/edit/{id}',[ShipAreaController::class,'stateEdit']);
Route::post('admin/state/update',[ShipAreaController::class,'stateUpdate'])->name('state.update');
Route::get('admin/state/delete/{id}',[ShipAreaController::class,'stateDelete']);
// Orders
Route::get('admin/pending-orders',[OrdersController::class,'pendingOrders'])->name('pending.orders');
Route::get('admin/order/view/{id}',[OrdersController::class,'orderView']);
Route::get('admin/confirmed-orders',[OrdersController::class,'confirmedOrders'])->name('confirmed.orders');
Route::get('admin/processing-orders',[OrdersController::class,'processingOrders'])->name('processing.orders');
Route::get('admin/picked-orders',[OrdersController::class,'pickedOrders'])->name('picked.orders');
Route::get('admin/shipped-orders',[OrdersController::class,'shippedOrders'])->name('shipped.orders');
Route::get('admin/delivered-orders',[OrdersController::class,'deliveredOrders'])->name('delivered.orders');
Route::get('admin/cancel-orders',[OrdersController::class,'cancelOrders'])->name('cancel.orders');
// Orders Status Update
Route::get('admin/pending-to-confirm/{id}',[OrdersController::class,'pendingToConfirm']);
Route::get('admin/pending-to-cancel/{id}',[OrdersController::class,'pendingToCancel']);
Route::get('admin/confirm-to-processing/{id}',[OrdersController::class,'confirmToProcessing']);
Route::get('admin/processing-to-picked/{id}',[OrdersController::class,'processingToPicked']);
Route::get('admin/picked-to-shipped/{id}',[OrdersController::class,'pickedToShipped']);
Route::get('admin/shipped-to-delivered/{id}',[OrdersController::class,'shippedToDelivered']);
Route::get('admin/delivered/{id}',[OrdersController::class,'orderDelivered']);
// Invoice Download
Route::get('admin/invoice/download/{id}',[OrdersController::class,'invoiceDownload']);
// Reports
Route::get('admin/reports',[ReportController::class,'index'])->name('reports');
Route::post('admin/reports/search-by-date',[ReportController::class,'searchByDate'])->name('search_by_date');
Route::post('admin/reports/search-by-month',[ReportController::class,'searchByMonth'])->name('search_by_month');
Route::post('admin/reports/search-by-year',[ReportController::class,'searchByYear'])->name('search_by_year');
/////// Pages
Route::get('admin/about-pages',[AboutController::class,'index'])->name('about');
Route::post('admin/about-store',[AboutController::class,'aboutStore'])->name('about.store');
Route::get('admin/about-list',[AboutController::class,'aboutList'])->name('about.manage');
Route::get('admin/about/edit/{id}',[AboutController::class,'aboutEdit']);
Route::post('admin/about/update',[AboutController::class,'aboutUpdate'])->name('about.update');
// Product Reviews
Route::get('admin/product/review',[ProductReviewsController::class,'adminReview'])->name('product.review');
Route::get('admin/review/delete/{id}',[ProductReviewsController::class,'destroy']);
Route::get('admin/product/approve/{id}',[ProductReviewsController::class,'approve']);

// Stock Management
Route::get('stock-management',[StockController::class,'index'])->name('product.stock');
Route::get('admin/stock/edit/{id}',[StockController::class,'edit'])->name('admin.stock');
Route::post('admin/stock/update/{id}',[StockController::class,'update'])->name('stock.update');
//Role Management
Route::resource('role',RoleController::class);
Route::resource('permission',PermissionController::class);
Route::resource('subadmin',SubAdminController::class);

});

////////////////////////////////User Route Are Here//////////////////////////////////////////////
Route::group(['middleware' =>['isban','auth'],'namespace'=>'Isban'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    //user login
    Route::post('user/update/profile',[UserProfileController::class,'updateProfile'])->name('update.user.profile');
    Route::get('update/image-page',[UserProfileController::class,'userUpdatePage']);
    Route::post('update/image',[UserProfileController::class,'userUpdateImage'])->name('update.user.image');
    Route::get('/change/password',[UserProfileController::class,'userChangePassword']);
    Route::post('update/password',[UserProfileController::class,'userUpdatePassword'])->name('update.user.password');
    // User Checkout with ajax District Show
    Route::get('/district/ajax/{id}',[CheckoutController::class,'userDistrictAjax']);
    Route::get('/state/ajax/{id}',[CheckoutController::class,'userStateAjax']);
    Route::post('/checkout/store',[CheckoutController::class,'checkoutStore'])->name('checkout.store');
    // Stripe
    Route::post('/stripe/payment',[StripeController::class,'paymentStore'])->name('payment.order');
    // My Orders
    Route::get('/my-orders',[OrderController::class,'myOrder'])->name('my_orders');
    //Order View
    Route::get('order/view/{id}',[OrderController::class,'orderView']);
    Route::get('/invoice/download/{id}',[OrderController::class,'invoiceDownload']);
    // User Order Return
    Route::post('/order-return-submit',[OrderController::class,'userReturnOrderSubmit'])->name('order.return.submit');
    Route::get('return/order',[OrderController::class,'userReturnOrder'])->name('return.order');
    Route::get('cancel/order',[OrderController::class,'cancelOrder'])->name('cancel.order');
    // User Rating and Review
    Route::get('/review-create/{id}',[ProductReviewController::class,'review']);
    Route::post('store.review',[ProductReviewController::class,'storeReview'])->name('store.review');

});
Route::group(['middleware' =>['user','auth']], function(){
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
});


///////////////////////// Frontend Route are Here//////////////////////////////////////////////
Route::get('admin/language/english',[LanguageControler::class,'english'])->name('english.language');
Route::get('admin/language/bangla',[LanguageControler::class,'bangla'])->name('bangla.language');
// Single Product
Route::get('single/product/{id}/{slug}',[IndexController::class,'singleProduct']);
// Category wise Product Show
Route::get('category/wise-product/{id}/{slug}',[FrontendSubCategoryController::class,'catWiseProduct']);
// Sub-category wise Product Show
Route::get('sub-categorywise/product/{id}/{slug}',[FrontendSubCategoryController::class,'subCatProduct']);
// Brand wise-product show
Route::get('brand/wise-product/{id}/{slug}',[FrontendSubCategoryController::class,'brandWisProduct']);
// Product Tags wise Show
Route::get('product-tags/{id}/',[FrontendSubCategoryController::class,'tagwiseproductShow']);
//// Quick View Modal with Ajax
Route::get('quick/product/view/{id}',[AjaxModalController::class,'quickViewModal']);
// AddToCart with Ajax
Route::post('/add/data/store/{id}',[CartController::class,'addToCartStore']);
//miniCart
Route::get('/add/mini/cart/',[CartController::class,'miniCart']);
Route::get('minicart/product-remove/{rowId}',[CartController::class,'minicartRemove']);
// Wishlist Route Here
Route::post('add/to/wishlist/{id}',[WishlishController::class,'addWishlist']);
Route::get('/get-wishlist-product/',[WishlishController::class,'allWishlistProduct']);
Route::get('wishlist/remove/{id}',[WishlishController::class,'wishlistRemove']);
Route::get('wishlist-page/',[WishlishController::class,'wislishPage'])->name('wishlist');
// My Cart Page Start Here
Route::get('mycart-page',[MyCartPageController::class,'myCartPage'])->name('mycart');
Route::get('/get/all-mycart/',[MyCartPageController::class,'allMyCart']);
Route::get('/cart/remove/{rowId}',[MyCartPageController::class,'destroy']);
// Cart Decrement
Route::get('/cart/increment/{rowId}',[MyCartPageController::class,'increment']);
// Cart Increment
Route::get('/cart/decrement/{rowId}',[MyCartPageController::class,'decrement']);
/// Coupon Apply
Route::post('/coupon/apply',[CouponsController::class,'couponApply']);
// coupon Calculation With Ajax
Route::get('/coupon/calculation',[CouponsController::class,'couponCalculation']);
Route::get('coupon/remove',[CouponsController::class,'couponRemove']);
// User Checkout
Route::get('user/checkout',[CouponsController::class,'checkout'])->name('user.checkout');
// // Order Traking
Route::post('order/tracking',[OrderTrackController::class,'orderTracking'])->name('order.tracking');
// Search Products
Route::post('search/products',[SearchController::class,'serachProduct'])->name('search.products');
Route::post('/find/search',[SearchController::class,'findProducts'])->name('find.search');
// About Pages
Route::get('about/page',[PagesController::class,'aboutPage'])->name('about.page');
Route::get('contact/page',[PagesController::class,'contactPage'])->name('contact.page');






