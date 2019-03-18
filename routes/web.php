<?php

// For Front End User Route....................
Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'   => 'index'
]);

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as'   => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as'   => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as'   => 'tag.single'
]);



// For Front End ..................
Route::get('/user/results', [
    'uses' => 'FrontEndController@search',
    'as'   => 'user.results'
]);

Route::post('/user/subscribe', [
    'uses' => 'FrontEndController@mailChimp',
    'as'   => 'user.subscribe'

    ]);



// For Back End Admn Pannel..................
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){


    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as'   => 'dashboard'
    ]);

// User Profile Routes............
    Route::get('/profile', [
        'uses' => 'ProfilesController@index',
        'as'   => 'profile'
    ]);

    Route::post('/profile/update', [
        'uses' => 'ProfilesController@update',
        'as'   => 'profile.update'
    ]);


// All Users Routes............
    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as'   => 'users'
    ]);

    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as'   => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@Notadmin',
        'as'    => 'user.not.admin'
    ]);

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as'    => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as'    => 'user.store'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'    => 'user.delete'
    ]);


// All Posts Routes............
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as'   => 'post.create'
    ]);
    
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as'   => 'posts'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as'   => 'post.delete'
    ]);

    Route::get('/post/trashed', [
        'uses' => 'PostsController@trashed',
        'as'   => 'post.trashed'
    ]);

    Route::get('/post/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as'   => 'post.kill'
    ]);

    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as'   => 'post.restore'
    ]);

    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as'   => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as'   => 'post.update'
    ]);




    // All Category Routes............
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as'   => 'category.create'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as'   => 'categories'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as'   => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as'   => 'category.delete'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as'   => 'category.update'
    ]);



    // All Tags Route...............
    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as'   => 'tags'
    ]);
    

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as'   => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as'   => 'tag.store'
    ]);


    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as'   => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as'   => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as'   => 'tag.delete'
    ]);



// Site Settings Route............................
    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as'   => 'settings'
    ]); 
    
    Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as'   => 'settings.update'
    ]);



});