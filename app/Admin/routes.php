<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', UserController::class);

    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () use ($router) {
        $router->resource('user-list', 'UserController');
    });
    Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () use ($router) {
        $router->resource('blog-list', 'BlogController');
    });
    Route::group(['prefix'=>'intro','namespace'=>'Intro'],function() use ($router){
        $router->resource('detail','IntroController');
    });

});


