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

use Illuminate\Support\Facades\Auth;
use App\Config;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    
    // Authentication Routes...
    Route::get('/', function () {
        return redirect()->route('auth_products');
    });
    
    $this->get('/login', 'LoginController@showLoginForm')->name('login');
    $this->post('/login', 'LoginController@login');
    $this->get('/logout', 'LoginController@logout')->name('logout');
    $this->get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Products
    $this->get('/products', 'ProductsController@index')->name('auth_products');
    Route::match(['get', 'post'], '/products/create', 'ProductsController@create')->name('auth_products_create');
    Route::match(['get', 'post'], '/products/edit/{id}', 'ProductsController@edit')->name('auth_products_edit');
    Route::match(['get', 'post'], '/products/search', 'ProductsController@search')->name('auth_products_search');
    Route::post('/products/remove', 'ProductsController@remove')->name('auth_products_remove');
    
    // Vendors
    $this->get('/vendors', 'VendorsController@index')->name('auth_vendors');
    Route::match(['get', 'post'], '/vendors/create', 'VendorsController@create')->name('auth_vendors_create');
    Route::match(['get', 'post'], '/vendors/edit/{id}', 'VendorsController@edit')->name('auth_vendors_edit');
    Route::match(['get', 'post'], '/vendors/search', 'VendorsController@search')->name('auth_vendors_search');
    Route::post('/vendors/remove', 'VendorsController@remove')->name('auth_vendors_remove');
    
    // Categories
    $this->get('/categories', 'CategoriesController@index')->name('auth_categories');
    Route::match(['get', 'post'], '/categories/create', 'CategoriesController@create')->name('auth_categories_create');
    Route::match(['get', 'post'], '/categories/edit/{id}', 'CategoriesController@edit')->name('auth_categories_edit');
    Route::match(['get', 'post'], '/categories/search', 'CategoriesController@search')->name('auth_categories_search');
    Route::post('/categories/remove', 'CategoriesController@remove')->name('auth_categories_remove');
    
    // Banners
    $this->get('/banners', 'BannersController@index')->name('auth_banners');
    Route::match(['get', 'post'], '/banners/create', 'BannersController@create')->name('auth_banners_create');
    Route::match(['get', 'post'], '/banners/edit/{id}', 'BannersController@edit')->name('auth_banners_edit');
    Route::match(['get', 'post'], '/banners/search', 'BannersController@search')->name('auth_banners_search');
    Route::post('/banners/remove', 'BannersController@remove')->name('auth_banners_remove');
    
    // Contacts
    $this->get('/contacts', 'ContactsController@index')->name('auth_contacts');
    Route::match(['get', 'post'], '/contacts/edit/{id}', 'ContactsController@edit')->name('auth_contacts_edit');
    Route::match(['get', 'post'], '/contacts/search', 'ContactsController@search')->name('auth_contacts_search');
    Route::post('/contacts/remove', 'ContactsController@remove')->name('auth_contacts_remove');
    
    // Posts
    $this->get('/posts', 'PostsController@index')->name('auth_posts');
    Route::match(['get', 'post'], '/posts/create', 'PostsController@create')->name('auth_posts_create');
    Route::match(['get', 'post'], '/posts/edit/{id}', 'PostsController@edit')->name('auth_posts_edit');
    Route::match(['get', 'post'], '/posts/search', 'PostsController@search')->name('auth_posts_search');
    Route::post('/posts/remove', 'PostsController@remove')->name('auth_posts_remove');
    
    // Post groups
    $this->get('/post_groups', 'PostGroupsController@index')->name('auth_postgroups');
    Route::match(['get', 'post'], '/post_groups/create', 'PostGroupsController@create')->name('auth_postgroups_create');
    Route::match(['get', 'post'], '/post_groups/edit/{id}', 'PostGroupsController@edit')->name('auth_postgroups_edit');
    Route::match(['get', 'post'], '/post_groups/search', 'PostGroupsController@search')->name('auth_postgroups_search');
    Route::post('/post_groups/remove', 'PostGroupsController@remove')->name('auth_postgroups_remove');
    
    // Orders
    $this->get('/orders', 'OrdersController@index')->name('auth_orders');
    Route::match(['get', 'post'], '/orders/edit/{id}', 'OrdersController@edit')->name('auth_orders_edit');
    Route::match(['get', 'post'], '/orders/search', 'OrdersController@search')->name('auth_orders_search');
    Route::post('/orders/remove', 'OrdersController@remove')->name('auth_orders_remove');
    
    $this->get('/shipfee', 'OrdersController@shipFee')->name('auth_shipfee');
    
    // Users
    $this->get('/users', 'UsersController@index')->name('auth_users');
    Route::match(['get', 'post'], '/users/create', 'UsersController@create')->name('auth_users_create');
    Route::match(['get', 'post'], '/users/edit/{id}', 'UsersController@edit')->name('auth_users_edit');
    Route::match(['get', 'post'], '/users/search', 'UsersController@search')->name('auth_users_search');
    Route::post('/users/remove', 'UsersController@remove')->name('auth_users_remove');
    
    // Config
    Route::match(['get', 'post'], '/config', 'ConfigController@index')->name('auth_config');

    // Setting
    Route::match(['get', 'post'], '/setting', 'SettingController@index')->name('auth_setting');
    
    // Profile
    Route::match(['get', 'post'], '/profile', 'UsersController@profile')->name('auth_profile');
    
    // Pages
    $this->get('/pages', 'PagesController@index')->name('auth_pages');
    Route::match(['get', 'post'], '/pages/edit/{id}', 'PagesController@edit')->name('auth_pages_edit');
    
    // IP
    $this->get('/ip_address', 'ConfigController@ipAddress')->name('auth_ip');
    Route::match(['get', 'post'], '/ip_address/search', 'ConfigController@ipSearch')->name('auth_ip_search');
    Route::post('/ip_address/remove', 'ConfigController@ipRemove')->name('auth_ip_remove');
    
    // Backup source + database
    $this->get('/backup', 'BackupController@index')->name('auth_backup');
    Route::match(['get', 'post'], '/backup/search', 'BackupController@search')->name('auth_backup_search');
    Route::match(['post'], '/backup/create', 'BackupController@create')->name('auth_backup_create');
    Route::post('/backup/remove', 'BackupController@remove')->name('auth_backup_remove');
    $this->get('/backup/download/{file_download}', 'BackupController@download')->name('auth_backup_download');
    
    // Jobs
    Route::get('/jobs', 'JobsController@index')->name('auth_jobs');
    Route::post('/jobs/run', 'JobsController@doRun')->name('auth_jobs_run');
    Route::post('/jobs/dispatch', 'JobsController@doDispatch')->name('auth_jobs_dispatch');
    
    // Source editor
    Route::get('/editor', 'EditorController@index')->name('auth_editor');
    
    // Registration Routes...
//     $this->get('/register', 'RegisterController@showRegistrationForm')->name('register');
//     $this->post('/register', 'RegisterController@register');
    
    // Password Reset Routes...
//     $this->get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
//     $this->post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//     $this->get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
//     $this->post('/password/reset', 'ResetPasswordController@reset');
    
});

// Route::group(['prefix' => 'backend', 'namespace' => 'Auth'], function () {
//     Route::get('/{a?}/{b?}', function () {
//         return File::get(public_path('dist/backend.html'));
//     });
// });

Route::group(['prefix' => ''], function () {
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/gioi-thieu', 'HomeController@about')->name('about');
    // Route::get('/dat-lich-hen', 'HomeController@booking')->name('booking');
    // Route::get('/nhom-trao-doi', 'HomeController@forum')->name('forum');
    Route::get('/san-pham', 'HomeController@products')->name('products');
    Route::get('/huong-dan-mua-hang', 'HomeController@orderIntroduction')->name('order_introduction');
    // Route::get('/kiem-tra-don-hang', 'HomeController@orderChecking')->name('order_checking');
    Route::get('/chinh-sach-bao-hanh', 'HomeController@guaranteePolicy')->name('guarantee_policy');
    Route::get('/chinh-sach-van-chuyen', 'HomeController@shipmentPolicy')->name('shipment_policy');
    
    Route::match(['get', 'post'], '/lien-he', 'HomeController@contact')->name('contact');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::match(['get', 'post'], 'account/login', 'MembersController@login')->name('account_login');
    Route::match(['get', 'post'], '/account/register', 'MembersController@register')->name('account_register');
    Route::get('/account/logout', 'MembersController@logout')->name('account_logout');
    Route::post('/account/recover', 'MembersController@recover')->name('account_recover');
    Route::get('/account/active/{token}', 'MembersController@active')->name('account_active');
    Route::get('/account/unactive', 'MembersController@unactive')->name('account_unactive');
    Route::match(['get', 'post'], '/account/profile', 'MembersController@profile')->name('account_profile');
    
    Route::post('/load-data', 'HomeController@loadData')->name('loadData');
    
    Route::group(['prefix' => 'gio-hang', 'as' => 'cart.'], function () {
        Route::get('', 'CartController@index')->name('list');
        Route::get('/thanh-toan', 'CartController@checkout')->name('checkout');
    });

    // Route::get('/cart', 'CartController@index')->name('cart');
    // Route::post('/cart/add-to-cart', 'CartController@addToCart')->name('addToCart');
    // Route::post('/cart/update-cart', 'CartController@updateCart')->name('updateCart');
    // Route::post('/cart/update-cart-detail', 'CartController@updateCartDetail')->name('updateCartDetail');
    // Route::post('/cart/remove-item', 'CartController@removeItem')->name('removeItem');
    // Route::post('/cart/remove-detail-item', 'CartController@removeDetailItem')->name('removeDetailItem');
    Route::match(['get', 'post'], '/cart/checkout', 'CartController@checkout')->name('checkout');
    Route::get('/cart/checkout/success', 'CartController@checkoutSuccess')->name('checkoutSuccess');

    Route::get('/nhan-hieu/{slug}', 'HomeController@vendor')->name('vendor');
    Route::get('/khuyen-mai', 'HomeController@discountProducts')->name('discountProducts');
    Route::get('/san-pham-noi-bat', 'HomeController@popularProducts')->name('popularProducts');
    Route::get('/san-pham-moi', 'HomeController@newProducts')->name('newProducts');
    Route::get('/san-pham-ban-chay', 'HomeController@bestSellProducts')->name('bestSellProducts');
    Route::get('/danh-muc/{slug}', 'HomeController@category')->name('category');
    
    Route::group(['prefix' => 'tin-tuc', 'as' => 'posts.'], function () {
        Route::get('', 'HomeController@posts')->name('list');
        Route::get('/{slug1}', 'HomeController@postDetails')->name('detail');
    });
    
    Route::get('/{slug}', 'HomeController@productDetails')->name('product_details');
    Route::post('refreshcaptcha', 'MembersController@refreshCaptcha')->name('refreshcaptcha');
    Route::post('checkcaptcha', 'MembersController@checkCaptcha')->name('checkCaptcha');
    
    Route::get('/offline', function() {
        exit;
    })->name('offline');
});




