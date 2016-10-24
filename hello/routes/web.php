<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::post('/tweet', 'TweetController@getTweets');
Route::post('/content/now_playing', 'ContentController@getNowPlaying');
Route::post('/content/popular', 'ContentController@getPopular');

Route::get('/content/review/{movieId}', 'ContentController@getMovie');
Route::get('/', 'HomeController@showHomePage');
Route::post('/search', 'ContentController@searchMovie');

 $router->post('/tweet',
            ['as' => 'tweet',
             'uses' => 'TweetController@getTweets']
        );
        $router->post('/content/now_playing',
            ['as' => 'recent',
             'uses' => 'ContentController@getNowPlaying']
        );
        $router->post('/content/popular',
            ['as' => 'popular',
             'uses' => 'ContentController@getPopular']
        );
        $router->post('/content/review/{movieId}',
            ['as' => 'review',
             'uses' => 'ContentController@getMovie
HomeController@showHomePage']
        );
        $router->post('/',
            ['as' => 'home',
             'uses' => 'HomeController@showHomePage']
        );
        $router->post('/search',
            ['as' => 'search',
             'uses' => 'ContentController@searchMovie']
        );
