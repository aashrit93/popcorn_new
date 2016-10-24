<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => 'members'], function (Router $router) {

    $router->group(['middleware' => 'guest'], function(Router $router) {
        
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

    });

    // ...
}