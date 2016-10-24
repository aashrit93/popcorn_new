<?php
namespace hello\Http\Controllers;
use hello\Http\Controllers\Controller;
use hello\Http\Requests;
use Illuminate\Http\Request;
class TweetController extends Controller  {

    public function getTweets(Request $request) {
    	
    	$keyword = $request->input('keyword'); 
    	$keyword = $keyword . ' movie+exclude:retweets';
    	$twitterCaller = app('Twitter');
        $tweets=$twitterCaller::getSearch(array(
                'q' => $keyword, // required
                'result_type' => 'mixed',
                'count' => 5,
                'format' => 'json', // required
                'lang' => 'en',
                'src' => 'typd'
            ));
    	
    	$response = json_decode($tweets);
    	$response = $response->statuses;
    	$analyser = app('Analyser');
    	
    	foreach($response as $tweet) {
    		$score = $analyser->classify($tweet->text);
    		$tweet->score = $score;
    	}
    	
    	return \Response::json($response);
    	
    }

}


