<?php

Route::namespace ('Admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    });
    // Admin password reset
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/admin-password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/reset/password/{token}/{email}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/update/reset', 'ResetPasswordController@reset')->name('admin.reset.update');
    Route::get('/Change/Password', 'AdminController@ChangePassword')->name('admin.password.change');
    Route::post('/password/update', 'AdminController@Update_pass')->name('admin.password.update');

    // Admin category
    Route::get('/categories', 'Category\CategoryController@category')->name('categories');
    Route::post('/store/category', 'Category\CategoryController@storecategory')->name('store.category');
    Route::get('/delete/category/{id}', 'Category\CategoryController@deleteCategory');
    Route::get('/edit/category/{id}', 'Category\CategoryController@editCategory');
    Route::post('/update/category/{id}', 'Category\CategoryController@updateCategory');

    // Admin Brand
    Route::get('/brands', 'Category\BrandController@brand')->name('brands');
    Route::post('/store/brand', 'Category\BrandController@storebrand')->name('store.brand');
    Route::get('/delete/brand/{id}', 'Category\BrandController@DeleteBrand');
    Route::get('/edit/brand/{id}', 'Category\BrandController@EditBrand');
    Route::post('/update/brand/{id}', 'Category\BrandController@UpdateBrand');

    // Sub Categories
    Route::get('sub/category', 'Category\SubCategoryController@subcategories')->name('sub.categories');
    Route::post('store/subcat', 'Category\SubCategoryController@storesubcat')->name('store.subcategory');
    Route::get('delete/subcategory/{id}', 'Category\SubCategoryController@DeleteSubcat');
    Route::get('edit/subcategory/{id}', 'Category\SubCategoryController@EditSubcat');
    Route::post('update/subcategory/{id}', 'Category\SubCategoryController@UpdateSubcat');

    // Coupons All
    Route::get('sub/coupon', 'Category\CouponController@Coupon')->name('admin.coupon');
    Route::post('store/coupon', 'Category\CouponController@StoreCoupon')->name('store.coupon');
    Route::get('delete/coupon/{id}', 'Category\CouponController@DeleteCoupon');
    Route::get('edit/coupon/{id}', 'Category\CouponController@EditCoupon');
    Route::post('update/coupon/{id}', 'Category\CouponController@UpdateCoupon');

    // News letters
    Route::get('admin/newsletter', 'Category\CouponController@newsLatter')->name('admin.newsletters');
    Route::get('delete/sub/{id}', 'Category\CouponController@DeleteSub');

    // Get subcategory by category_id
    Route::get('get/subcategory/{category_id}', 'ProductController@GetSubcat');

    // Product All Route
    Route::get('product/all', 'ProductController@index')->name('all.product');
    Route::get('product/add', 'ProductController@create')->name('add.product');
    Route::post('store/product', 'ProductController@store')->name('store.product');

    Route::get('delete/product/{id}', 'ProductController@DeleteProduct');
    Route::get('inactive/product/{id}', 'ProductController@inactive');
    Route::get('active/product/{id}', 'ProductController@active');

    Route::get('view/product/{id}', 'ProductController@ViewProduct');
    Route::get('edit/product/{id}', 'ProductController@EditProduct');

    Route::post('update/product/withoutphoto/{id}', 'ProductController@UpdateProductWithoutPhoto');

    Route::post('update/product/photo/{id}', 'ProductController@UpdateProductPhoto');
});
