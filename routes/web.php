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


Route::get('admin/login', 'AdminController@adminLogin')->name('admin.login');
Route::post('admin/login/post', 'AdminController@adminLoginSubmit')->name('admin.login.submit');

Route::group(['prefix' => 'admin', 'middleware'=>'admin_middleware'], function () {
    Route::get('/', 'AdminController@adminIndex')->name('admin.index');
    Route::get('logout', 'AdminController@logout')->name('admin.logout');


    //moderator
    Route::get('/moderator/list', 'AdminController@moderatorList')->name('admin.moderator.list');
    Route::post('/moderator/add', 'AdminController@addModeratorPost')->name('admin.moderator.add');
    Route::post('/moderator/delete/{id}', 'AdminController@deleteModerator')->name('admin.moderator.delete');

    //division
    Route::get('/division', 'AdminController@divisionList')->name('admin.division');
    Route::post('/division/add', 'AdminController@addDivision')->name('admin.division.add');
    Route::post('/division/delete/{id}', 'AdminController@deleteDivision')->name('admin.division.delete');
    Route::get('/division/edit/json', 'AdminController@editDivisionJson')->name('admin.division.edit.json');
    Route::post('/division/edit', 'AdminController@editDivision')->name('admin.division.edit');

    //city
    Route::get('/cities', 'AdminController@cityList')->name('admin.city');
    Route::post('/cities/add', 'AdminController@addCity')->name('admin.city.add');
    Route::post('/cities/delete/{id}', 'AdminController@deleteCity')->name('admin.city.delete');
    Route::get('/cities/edit/json', 'AdminController@editCityJson')->name('admin.city.edit.json');
    Route::post('/cities/edit', 'AdminController@editCity')->name('admin.city.edit');

    //category
    Route::get('/categories', 'AdminController@categoryList')->name('admin.categories');
    Route::post('/category/add', 'AdminController@addCategory')->name('admin.category.add');
    Route::post('/category/delete/{id}', 'AdminController@deleteCategory')->name('admin.category.delete');
    Route::get('/category/edit/json', 'AdminController@getCategoryJson')->name('admin.category.edit.json');
    Route::post('/category/edit', 'AdminController@editCategory')->name('admin.category.edit');

    //sub category
    Route::get('/categories/sub-categories', 'AdminController@subCategoryList')->name('admin.subcategories');
    Route::post('/subcategory/add', 'AdminController@addSubCategory')->name('admin.subcategory.add');
    Route::post('/subcategory/delete/{id}', 'AdminController@deleteSubCategory')->name('admin.subcategory.delete');
    Route::get('/subcategory/edit/json', 'AdminController@editSubCategoryJson')->name('admin.subcategory.edit.json');
    Route::post('/subcategory/edit', 'AdminController@editSubCategory')->name('admin.subcategory.edit');



    /*========================================Blog==================================================================*/

    //blog category
    Route::get('/blog/categories', 'AdminController@blogCategoryList')->name('admin.blog.categories');
    Route::post('blog/category/add', 'AdminController@addBlogCategory')->name('admin.blog.category.add');
    Route::post('blog/category/delete/{id}', 'AdminController@deleteBlogCategory')->name('admin.blog.category.delete');
    Route::get('blog/category/edit/json', 'AdminController@getBlogCategoryJson')->name('admin.blog.category.edit.json');
    Route::post('blog/category/edit', 'AdminController@editBlogCategory')->name('admin.blog.category.edit');



    //blog sub category
    Route::get('/blog/subcategories', 'AdminController@blogSubCategoryList')->name('admin.blog.subcategories');
    Route::post('blog/subcategory/add', 'AdminController@blogaddSubCategory')->name('admin.blog.subcategory.add');
    Route::post('blog/subcategory/delete/{id}', 'AdminController@blogdeleteSubCategory')->name('admin.blog.subcategory.delete');
    Route::get('blog/subcategory/edit/json', 'AdminController@blogeditSubCategoryJson')->name('admin.blog.subcategory.edit.json');
    Route::post('blog/subcategory/edit', 'AdminController@blogeditSubCategory')->name('admin.blog.subcategory.edit');



    //blog tags
    Route::get('/blog/tags', 'AdminController@blogTagList')->name('admin.blog.tags');

    //blog post
    Route::get('/blog/posts', 'AdminController@blogPostList')->name('admin.blog.posts');
});


/*===================================================moderator routes========================================*/
Route::group(['prefix' => 'moderator', 'middleware'=>'moderator_middleware'], function () {
    //moderator panel
    Route::get('/', 'AdminController@adminModeratorIndex')->name('admin.moderator.index');
});



Route::get('/user/register/', 'ClientController@registerIndex')->name('user.register');
Route::post('/user/register/post/', 'ClientController@userRegistration')->name('user.register.post');
Route::get('/user/login', 'ClientController@userLogin')->name('user.login');
Route::post('/user/login/post', 'ClientController@userLoginPost')->name('user.login.post');

Route::group(['middleware'=>'user_middleware'], function () {
Route::get('/user/dashboard/','ClientController@userDashboard')->name('user.dashboard');
Route::get('/user/logout/', 'ClientController@userLogout')->name('user.logout');
Route::post('/user/ad/post','ClientController@userPostSubmit')->name('user.post.submit');
Route::get('/dashboard/notification', 'ClientController@messageNotification')->name('dashboard.notification');
Route::post('/post/delete/', 'ClientController@deletePost')->name('post.delete');
Route::get('/post/edit/{client_id}/{post_id}/{slug}/','ClientController@editPost')->name('post.edit');
});

Route::get('/details/{id}/{slug}','ClientController@postDetail')->name('post.details');
Route::post('/details/review', 'ClientController@postReview')->name('post.review');
Route::post('/post/message', 'ClientController@postMessage')->name('post.message');
