<?php

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
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    // $exitCode = Artisan::call('route:cache');
    // $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');

    return '<h1>cleared</h1>';
});

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('lang/change/{id}','App\Http\Controllers\HomeController@lang_change');
Route::post('country-change','App\Http\Controllers\HomeController@country_change');
Route::get('search', 'App\Http\Controllers\HomeController@search')->name('search');
Route::get('order-confirmation', 'App\Http\Controllers\HomeController@order_confirmation');
Route::get('searchproduct/', 'App\Http\Controllers\HomeController@searchproduct')->name('searchproduct');
// Route::get('index','App\Http\Controllers\HomeController@countryindex');
// category
Route::get('category-products/mens-wear', 'App\Http\Controllers\CatagoryListController@mens_wear');
Route::get('category-products/womens-wear', 'App\Http\Controllers\CatagoryListController@womens_wear');
Route::get('category-products/kids-wear', 'App\Http\Controllers\CatagoryListController@kids_wear');
Route::get('category-products/footweare', 'App\Http\Controllers\CatagoryListController@footweare');
Route::get('category-products/bags', 'App\Http\Controllers\CatagoryListController@bags');
Route::get('category-products/kitchen-home-appliances', 'App\Http\Controllers\CatagoryListController@kitchen_home_appliances');
Route::get('category-products/sports', 'App\Http\Controllers\CatagoryListController@sports');
Route::get('category-products/toys', 'App\Http\Controllers\CatagoryListController@toys');


// Route::get('category-detail-products/{id}', 'App\Http\Controllers\CatagoryListController@category_detail_product');
Route::post('search-category', 'App\Http\Controllers\CatagoryListController@search_category');
Route::get('sub-category-products/{id}', 'App\Http\Controllers\CatagoryListController@sub_category_products');
Route::get('category', 'App\Http\Controllers\CatagoryListController@category');
Route::get('group-category-products/{id}', 'App\Http\Controllers\CatagoryListController@group_category_products');

// product view
Route::get('product-view/{id}', 'App\Http\Controllers\SingleProductController@product_view');
// cart
Route::get('addcart','App\Http\Controllers\CartController@addcart');
Route::get('addcart-count','App\Http\Controllers\CartController@addcart_count');
Route::get('my-cart','App\Http\Controllers\CartController@my_cart');
Route::get('remove-cart/{id}','App\Http\Controllers\CartController@remove_cart');
Route::get('remove-all-cart/','App\Http\Controllers\CartController@remove_all_cart');
Route::post('update-cart/','App\Http\Controllers\CartController@update_cart');


// login & registration
Route::get('my-login', 'App\Http\Controllers\UserLoginController@my_login');
Route::post('customer-registration/','App\Http\Controllers\UserLoginController@customer_registration');
Route::post('customer-login', 'App\Http\Controllers\UserLoginController@login');
Route::get('logout', 'App\Http\Controllers\UserLoginController@logout');
Route::get('my-account', 'App\Http\Controllers\AccountController@my_account');
Route::post('update-profile', 'App\Http\Controllers\AccountController@update_profile');
Route::post('add-review', 'App\Http\Controllers\SingleProductController@add_review');
// shopping 
Route::get('checkout/','App\Http\Controllers\CheckoutController@checkout');
Route::post('shop-complete', 'App\Http\Controllers\CheckoutController@shop_complete');

// other menu
Route::get('about-us', 'App\Http\Controllers\OtherMenuController@about_us');
Route::get('contact-us', 'App\Http\Controllers\OtherMenuController@contact_us');
Route::get('delivery-information', 'App\Http\Controllers\OtherMenuController@delivery_info');
Route::get('privacy-policy', 'App\Http\Controllers\OtherMenuController@privacy_policy');
Route::get('terms-conditions', 'App\Http\Controllers\OtherMenuController@terms_condition');
Route::get('return-policy', 'App\Http\Controllers\OtherMenuController@return_policies');

// admin side
Route::post('/myadmin-login','App\Http\Controllers\LoginController@check_login')->name('admin-login');
Route::get('/myadmin-logout','App\Http\Controllers\LoginController@myadmin_logout');
Route::get('customer', 'App\Http\Controllers\CustomerRegistrationController@index');
Route::get('admin/dash-board', 'App\Http\Controllers\LoginController@dash_board');

Route::get('product', 'App\Http\Controllers\ProductController@index');
Route::get('product-to-2000', 'App\Http\Controllers\ProductController@index_to_2000');
Route::get('product-to-4000', 'App\Http\Controllers\ProductController@index_to_4000');

Route::get('product-active/{id}', 'App\Http\Controllers\ProductController@product_active');
Route::get('product-deactive/{id}', 'App\Http\Controllers\ProductController@product_deactive');

Route::get('view-product/{id}', 'App\Http\Controllers\ProductController@view_product');
Route::get('add-product', 'App\Http\Controllers\ProductController@create');
Route::post('/add-new-product', 'App\Http\Controllers\ProductController@store');
Route::get('/edit-product/{id}', 'App\Http\Controllers\ProductController@edit');
Route::post('/update-product', 'App\Http\Controllers\ProductController@update');
Route::get('/delete-product/{id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/pro-set-featured/{id}', 'App\Http\Controllers\ProductController@set_product_featured');
Route::get('/pro-set-unfeatured/{id}', 'App\Http\Controllers\ProductController@set_product_unfeatured');
Route::get('/set-color-product/{id}', 'App\Http\Controllers\ProductController@set_color_product');
Route::post('/set-color-product', 'App\Http\Controllers\ProductController@set_color_product_post');
Route::get('autocompleteproduct', 'App\Http\Controllers\ProductController@autocomplete')->name('autocompleteproduct');
Route::get('/add-stock/{id}', 'App\Http\Controllers\ProductController@add_stock');
Route::post('/update-add-product', 'App\Http\Controllers\ProductController@update_add_stock');

Route::get('de-active-product-list', 'App\Http\Controllers\ProductReportController@de_active_product_list');
Route::get('featured-product', 'App\Http\Controllers\ProductReportController@featured_product');
Route::get('category-wise-product', 'App\Http\Controllers\ProductReportController@category_wise_product');
Route::get('brand-wise-product', 'App\Http\Controllers\ProductReportController@brand_wise_product');
Route::get('country-wise-active-product', 'App\Http\Controllers\ProductReportController@country_wise_active_product');
Route::get('country-wise-deactive-product', 'App\Http\Controllers\ProductReportController@country_wise_deactive_product');
Route::get('single-image-product', 'App\Http\Controllers\ProductReportController@single_image_product');
Route::get('last-add-n-product', 'App\Http\Controllers\ProductReportController@last_add_n_product');


Route::post('/add-new-image-product', 'App\Http\Controllers\ProductController@add_new_image');
Route::get('/delete-product-image/{id}', 'App\Http\Controllers\ProductController@delete_product_image');

Route::post('/add-new-color-product', 'App\Http\Controllers\ProductController@add_new_color_product');
Route::post('/add-new-size-product', 'App\Http\Controllers\ProductController@add_new_size_product');

Route::get('country-deactive/{code}/{id}', 'App\Http\Controllers\ProductController@country_deactive');
Route::get('country-active/{code}/{id}', 'App\Http\Controllers\ProductController@country_active');

Route::get('/add-image/{id}', 'App\Http\Controllers\ProductController@add_image');
Route::get('/add-color/{id}', 'App\Http\Controllers\ProductController@add_color');
Route::get('/add-size/{id}', 'App\Http\Controllers\ProductController@add_size');

Route::get('/reset-stock/{id}', 'App\Http\Controllers\ProductController@reset_product_stock');


Route::get('category/categories','App\Http\Controllers\CategoryController@index');
Route::get('category/add-categories','App\Http\Controllers\CategoryController@create');
Route::post('add-new-category','App\Http\Controllers\CategoryController@store');
Route::get('edit-category/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('update-category', 'App\Http\Controllers\CategoryController@update');
Route::get('delete-category/{id}', 'App\Http\Controllers\CategoryController@delete_category');

Route::get('sub-category/categories','App\Http\Controllers\SubCategoryController@index');
Route::get('sub-category/add-categories','App\Http\Controllers\SubCategoryController@create');
Route::post('sub-add-new-category','App\Http\Controllers\SubCategoryController@store');
Route::get('sub-edit-category/{id}', 'App\Http\Controllers\SubCategoryController@edit');
Route::post('sub-update-category', 'App\Http\Controllers\SubCategoryController@update');
Route::get('sub-delete-category/{id}', 'App\Http\Controllers\SubCategoryController@delete_category');

Route::get('group-category/categories','App\Http\Controllers\GroupCategoryController@index');
Route::get('group-category/add-categories','App\Http\Controllers\GroupCategoryController@create');
Route::post('group-add-new-category','App\Http\Controllers\GroupCategoryController@store');
Route::get('group-edit-category/{id}', 'App\Http\Controllers\GroupCategoryController@edit');
Route::post('group-update-category', 'App\Http\Controllers\GroupCategoryController@update');
Route::get('group-delete-category/{id}', 'App\Http\Controllers\GroupCategoryController@delete_category');

Route::get('scrach-card/index','App\Http\Controllers\ScrachCardController@index');
Route::get('scrach-card/create','App\Http\Controllers\ScrachCardController@create');
Route::post('scrach-card-add-new','App\Http\Controllers\ScrachCardController@store');
Route::get('scrach-card-delete/{id}', 'App\Http\Controllers\ScrachCardController@delete_scrach');



Route::get('spinning-wheel-slab/index','App\Http\Controllers\SpinningWheelSlabController@index');
Route::get('spinning-wheel-slab/create','App\Http\Controllers\SpinningWheelSlabController@create');
Route::post('spinning-wheel-slab-store','App\Http\Controllers\SpinningWheelSlabController@store');
Route::get('spinning-wheel-slab-edit/{id}', 'App\Http\Controllers\SpinningWheelSlabController@edit');
Route::post('spinning-wheel-slab-update', 'App\Http\Controllers\SpinningWheelSlabController@update');
Route::get('spinning-wheel-slab-delete/{id}', 'App\Http\Controllers\SpinningWheelSlabController@delete');


Route::get('spinning-wheel-slab-item/index','App\Http\Controllers\SpinningWheelSlabItemController@index');
Route::get('spinning-wheel-slab-item/create','App\Http\Controllers\SpinningWheelSlabItemController@create');
Route::post('spinning-wheel-slab-item-store','App\Http\Controllers\SpinningWheelSlabItemController@store');
Route::get('spinning-wheel-slab-item-edit/{id}', 'App\Http\Controllers\SpinningWheelSlabItemController@edit');
Route::post('spinning-wheel-slab-item-update', 'App\Http\Controllers\SpinningWheelSlabItemController@update');
Route::get('spinning-wheel-slab-item-delete/{id}', 'App\Http\Controllers\SpinningWheelSlabItemController@delete');



Route::get('spinning-wheel/index','App\Http\Controllers\ScrachCardController@index');
Route::get('spinning-wheel/create','App\Http\Controllers\ScrachCardController@create');
Route::post('spinning-wheel-add-new','App\Http\Controllers\ScrachCardController@store');
Route::get('spinning-wheel-delete/{id}', 'App\Http\Controllers\ScrachCardController@delete_scrach');



Route::get('/brands', 'App\Http\Controllers\BrandController@index');
Route::get('/add-brand', 'App\Http\Controllers\BrandController@create');
Route::post('/add-new-brand', 'App\Http\Controllers\BrandController@store');
Route::get('/set-featured/{id}', 'App\Http\Controllers\BrandController@brand_set_featured');
Route::get('/set-unfeatured/{id}', 'App\Http\Controllers\BrandController@brand_set_unfeatured');
Route::get('/edit-brands/{id}', 'App\Http\Controllers\BrandController@edit');
Route::post('/update-brands', 'App\Http\Controllers\BrandController@update');
Route::get('/view-brands/{id}', 'App\Http\Controllers\BrandController@view_brands');
Route::get('delete-brands/{id}', 'App\Http\Controllers\BrandController@delete_brands');


Route::get('/user_reviews', 'App\Http\Controllers\UserReviewController@user_reviews');
Route::get('/edit-review-stat/{id}', 'App\Http\Controllers\UserReviewController@edit_review_status');
Route::post('update-review','App\Http\Controllers\UserReviewController@update_review');
Route::get('delete-review-stat/{id}', 'App\Http\Controllers\UserReviewController@delete_review');
Route::get('out-of-stock-list', 'App\Http\Controllers\ShoppingController@out_of_stock');
Route::get('view-out-of-stock-list/{id}', 'App\Http\Controllers\ShoppingController@view_out_of_stock');



//sales

Route::get('/ad_purchase', 'App\Http\Controllers\ShoppingController@ad_purchase');
Route::get('view-purchase-list/{id}', 'App\Http\Controllers\ShoppingController@view_purchase_list');


Route::get('/ad_orders', 'App\Http\Controllers\ShoppingController@ad_orders');
Route::get('view-order-list/{id}', 'App\Http\Controllers\ShoppingController@view_orders_list');
Route::post('/update-order-status', 'App\Http\Controllers\ShoppingController@update_order_status');
Route::get('/order_invoice/{id}', 'App\Http\Controllers\ShoppingController@order_invoice');

Route::get('admn-daily-deals', 'App\Http\Controllers\ShoppingController@daily_deals');
Route::get('/admin/add-deal', 'App\Http\Controllers\ShoppingController@admin_add_Deal');
Route::post('/add-new-deal', 'App\Http\Controllers\ShoppingController@add_new_deal');
Route::get('/delete-daily-deal/{id}', 'App\Http\Controllers\ShoppingController@delete_deal');


Route::get('/ad_customers', 'App\Http\Controllers\ShoppingController@list_customers');
Route::get('/view-ad-customer/{id}', 'App\Http\Controllers\ShoppingController@view_ad_customer');
Route::get('block-customer/{id}', 'App\Http\Controllers\ShoppingController@block_customer');
Route::get('unblock-customer/{id}', 'App\Http\Controllers\ShoppingController@unblock_customer');

Route::get('/advertisment', 'App\Http\Controllers\ShoppingController@ad_advertisment');
Route::get('/add-advertisment', 'App\Http\Controllers\ShoppingController@add_advertisment');
Route::post('/add-new-ads','App\Http\Controllers\ShoppingController@add_new_ads');
Route::get('delete-adds/{id}', 'App\Http\Controllers\ShoppingController@delete_adds');
Route::get('/edit-ads/{id}', 'App\Http\Controllers\ShoppingController@edit_advertisment');
Route::post('update-ads', 'App\Http\Controllers\ShoppingController@update_advertisment');

Route::get('slider-images', 'App\Http\Controllers\ShoppingController@all_slider_images');
Route::get('add-slider-images', 'App\Http\Controllers\ShoppingController@add_slider_images');
Route::post('add-slider-img', 'App\Http\Controllers\ShoppingController@add_slider_img');
Route::get('delete-slider-image/{id}', 'App\Http\Controllers\ShoppingController@delete_slider_image');

Route::get('order-country-wise', 'App\Http\Controllers\ReportController@order_country_wise');
Route::get('order-customer-wise', 'App\Http\Controllers\ReportController@order_customer_wise');
Route::get('order-processing', 'App\Http\Controllers\ReportController@order_processing');
Route::get('order-cancel', 'App\Http\Controllers\ReportController@order_cancel');
Route::get('order-complete', 'App\Http\Controllers\ReportController@order_complete');
Route::get('order-mobile-wise', 'App\Http\Controllers\ReportController@order_mobile_wise');

Route::get('purchase-date-wise', 'App\Http\Controllers\ReportController@purchase_date_wise');
Route::get('purchase-customer-wise', 'App\Http\Controllers\ReportController@purchase_customer_wise');


Route::get('/attribute-values', 'App\Http\Controllers\ShoppingController@attribute_values');
Route::get('/add-value', 'App\Http\Controllers\ShoppingController@add_value');
Route::post('/add-new-value', 'App\Http\Controllers\ShoppingController@add_new_value');
Route::get('/edit-values/{id}', 'App\Http\Controllers\ShoppingController@edit_values');
Route::post('/update-values', 'App\Http\Controllers\ShoppingController@update_values');
Route::get('delete-values/{id}', 'App\Http\Controllers\ShoppingController@delete_values');


// Route::middleware(['auth', 'verified'])->group(function () {
   
//     Route::get('logout', 'App\Http\Controllers\DashboardController@logout');

// });
// Route::get('/dashboard', function () {
//     // return Auth::user()->id;
//     return redirect('admin-dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
