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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth_'], function () {
    
    // Authentication Routes...
    Route::get('/', function () {
        return redirect()->route('products');
    });
    
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductsController@index')->name('products');
        Route::match(['get', 'post'], '/create', 'ProductsController@create')->name('products_create');
        Route::match(['get', 'post'], '/edit/{id}', 'ProductsController@edit')->name('products_edit');
        Route::match(['get', 'post'], '/search', 'ProductsController@search')->name('products_search');
        Route::post('/remove', 'ProductsController@remove')->name('products_remove');
    });
    
    // Vendors
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/', 'VendorsController@index')->name('vendors');
        Route::match(['get', 'post'], '/create', 'VendorsController@create')->name('vendors_create');
        Route::match(['get', 'post'], '/edit/{id}', 'VendorsController@edit')->name('vendors_edit');
        Route::match(['get', 'post'], '/search', 'VendorsController@search')->name('vendors_search');
        Route::post('/remove', 'VendorsController@remove')->name('vendors_remove');
    });
    
    // Categories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoriesController@index')->name('categories');
        Route::match(['get', 'post'], '/create', 'CategoriesController@create')->name('categories_create');
        Route::match(['get', 'post'], '/edit/{id}', 'CategoriesController@edit')->name('categories_edit');
        Route::match(['get', 'post'], '/search', 'CategoriesController@search')->name('categories_search');
        Route::post('/remove', 'CategoriesController@remove')->name('categories_remove');
    });
    
    // Banners
    Route::group(['prefix' => 'banners'], function () {
        Route::get('/center', 'BannersController@index')->name('bannerscenter');
        Route::get('/left', 'BannersController@index')->name('bannersleft');
        Route::get('/right_up', 'BannersController@index')->name('bannersrightup');
        Route::get('/right_down', 'BannersController@index')->name('bannersrightdown');

        Route::match(['get', 'post'], '/center/search', 'BannersController@search')->name('bannerscenter_search');
        Route::match(['get', 'post'], '/left/search', 'BannersController@search')->name('bannersleft_search');
        Route::match(['get', 'post'], '/right_up/search', 'BannersController@search')->name('bannersrightup_search');
        Route::match(['get', 'post'], '/right_down/search', 'BannersController@search')->name('bannersrightdown_search');

        Route::match(['get', 'post'], '/center/remove', 'BannersController@remove')->name('bannerscenter_remove');
        Route::match(['get', 'post'], '/left/remove', 'BannersController@remove')->name('bannersleft_remove');
        Route::match(['get', 'post'], '/right_up/remove', 'BannersController@remove')->name('bannersrightup_remove');
        Route::match(['get', 'post'], '/right_down/remove', 'BannersController@remove')->name('bannersrightdown_remove');

        Route::match(['get', 'post'], '/center/create', 'BannersController@create')->name('bannerscenter_create');
        Route::match(['get', 'post'], '/left/create', 'BannersController@create')->name('bannersleft_create');
        Route::match(['get', 'post'], '/right_up/create', 'BannersController@create')->name('bannersrightup_create');
        Route::match(['get', 'post'], '/right_down/create', 'BannersController@create')->name('bannersrightdown_create');

        Route::match(['get', 'post'], '/center/edit/{id}', 'BannersController@edit')->name('bannerscenter_edit');
        Route::match(['get', 'post'], '/left/edit/{id}', 'BannersController@edit')->name('bannersleft_edit');
        Route::match(['get', 'post'], '/right_up/edit/{id}', 'BannersController@edit')->name('bannersrightup_edit');
        Route::match(['get', 'post'], '/right_down/edit/{id}', 'BannersController@edit')->name('bannersrightdown_edit');
    });
    
    // Contacts
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/', 'ContactsController@index')->name('contacts');
        Route::match(['get', 'post'], '/edit/{id}', 'ContactsController@edit')->name('contacts_edit');
        Route::match(['get', 'post'], '/search', 'ContactsController@search')->name('contacts_search');
        Route::post('/remove', 'ContactsController@remove')->name('contacts_remove');
    });
    
    // Posts
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostsController@index')->name('posts');
        Route::match(['get', 'post'], '/create', 'PostsController@create')->name('posts_create');
        Route::match(['get', 'post'], '/edit/{id}', 'PostsController@edit')->name('posts_edit');
        Route::match(['get', 'post'], '/search', 'PostsController@search')->name('posts_search');
        Route::post('/remove', 'PostsController@remove')->name('posts_remove');
    });
    
    // Orders
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrdersController@index')->name('orders');
        Route::match(['get', 'post'], '/edit/{id}', 'OrdersController@edit')->name('orders_edit');
        Route::match(['get', 'post'], '/search', 'OrdersController@search')->name('orders_search');
        Route::post('/remove', 'OrdersController@remove')->name('orders_remove');
    });
    
    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@index')->name('users');
        Route::match(['get', 'post'], '/create', 'UsersController@create')->name('users_create');
        Route::match(['get', 'post'], '/edit/{id}', 'UsersController@edit')->name('users_edit');
        Route::match(['get', 'post'], '/search', 'UsersController@search')->name('users_search');
        Route::post('s/remove', 'UsersController@remove')->name('users_remove');
    });
    
    // Config
    Route::match(['get', 'post'], '/config', 'ConfigController@index')->name('config');

    // Profile
    Route::match(['get', 'post'], '/profile', 'UsersController@profile')->name('profile');
    
    // Pages
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', 'PagesController@index')->name('pages');
        Route::match(['get', 'post'], '/edit/{id}', 'PagesController@edit')->name('pages_edit');
    });
    
    // Source editor
    Route::get('/editor', 'EditorController@index')->name('editor');
    
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




