<?php
namespace hello\Http\Controllers;
use hello\Http\Controllers\Controller;
use hello\Http\Requests;
use Illuminate\Http\Request;
class ContentController extends Controller  {

    public function getNowPlaying() {
    	
    	$movieRepository = app('MovieRepository');
    	$imageHelper = app('ImageHelper');
    	
    	$response = $movieRepository->getNowPlaying();
    	$response = $response->toArray();
    	$movies = array();
    	
    	foreach($response as $movie) {
    		$posterImage = $movie->getPosterPath();
    		$backdropImage = $movie->getBackdropPath();
    		
    		$movieItem['poster'] = $imageHelper->getUrl($posterImage);
    		$movieItem['backdrop'] = $imageHelper->getUrl($backdropImage);
    		$movieItem['id'] = $movie->getId();
    		$movieItem['title'] = $movie->getTitle();
    		$movieItem['popularity'] = $movie->getPopularity();
    		$movieItem['releaseDate'] = $movie->getReleaseDate();
    		
    		$movies[] = $movieItem;
    		
    	}
    	
    	//print_r($movies);
    	
    	return \Response::json($movies);
    	
    }
    
    
    public function getPopular() {
    	$movieRepository =app('MovieRepository');
    	$imageHelper = app('ImageHelper');
    	$response = $movieRepository->getPopular();
    	$response = $response->toArray();
    	$movies = array();
    	
    	foreach($response as $movie) {
    		$posterImage = $movie->getPosterPath();
    		$backdropImage = $movie->getBackdropPath();
    		
    		$movieItem['poster'] = $imageHelper->getUrl($posterImage);
    		$movieItem['backdrop'] = $imageHelper->getUrl($backdropImage);
    		$movieItem['id'] = $movie->getId();
    		$movieItem['title'] = $movie->getOriginalTitle();
    		$movieItem['popularity'] = $movie->getPopularity();
    		$movieItem['releaseDate'] = $movie->getReleaseDate();    		
    		$movieItem['voteCount'] = $movie->getVoteCount();  		
    		$movieItem['voteAverage'] = $movie->getVoteAverage();
    		
    		$movies[] = $movieItem;
    		
    	}
    	
    	//print_r($response);
    	
    	return \Response::json($movies);	
    }
    
    public function getMovie($movieId) {
    	$movieRepository = app('MovieRepository');
    	$imageHelper = app('ImageHelper');
    	
    	$movie = $movieRepository->load($movieId);
    	
    	$posterImage = $movie->getPosterPath();
    	
    	$genres = $movie->getGenres();
    	$genreList = array();
    	foreach($genres as $genre) {
    		$genreList[] = $genre->getName();
    	}
    	$genreList = implode(', ', $genreList);
    	
    	$credits = $movie->getCredits();
    	$casts = $credits->getCast();
    	$casts = $casts->getCast();
    	$castList = array();
    	foreach($casts as $cast) {
    		$castList[] = $cast->getName();
    	}
    	$castList = implode(', ', $castList);
    	
    	$review = array(
    		'posterImage' => $imageHelper->getUrl($posterImage),
    		'genreList' => $genreList,
    		'castList' => $castList,
    		'homepage' => $movie->getHomepage(),
    		'overview' => $movie->getOverview(),
    		'popularity' => $movie->getPopularity(),
    		'releaseDate' => $movie->getReleaseDate()->format('Y-m-d H:i:s'),
    		'status' => $movie->getStatus(),
    		'tagline' => $movie->getTagline(),
    		'title' => $movie->getOriginalTitle(),
    		'voteAverage' => $movie->getVoteAverage(),
    		'voteCount' => $movie->getVoteCount(),
    		'runtime' => $movie->getRuntime(),
    		
    	);
    	//print_r($review);
    	return \View::make('review', array('data' => $review));
    	    	
    }
    
    public function searchMovie(Request $request) {
    	//$keyword = 'toka';
    	
    	$keyword =  $request->input('keyword');;
    	
    	$movieQuery = app('MovieSearchQuery');
    	$movieQuery->searchType('ngram');
    	$movieQuery->language('en');
    	
    	$movieRepository = app('MovieSearchRepository');
    	$imageHelper = app('ImageHelper');
    	$searchResult = $movieRepository->searchMovie($keyword, $movieQuery);
    	
    	$response = $searchResult->toArray();
    	$movies = array();
    	
    	foreach($response as $movie) {
    		$posterImage = $movie->getPosterPath();
    		$backdropImage = $movie->getBackdropPath();
    		
    		$movieItem['poster'] = $imageHelper->getUrl($posterImage);
    		$movieItem['backdrop'] = $imageHelper->getUrl($backdropImage);
    		$movieItem['id'] = $movie->getId();
    		$movieItem['title'] = $movie->getOriginalTitle();
    		$movieItem['popularity'] = $movie->getPopularity();
    		$movieItem['releaseDate'] = $movie->getReleaseDate();    		
    		$movieItem['voteCount'] = $movie->getVoteCount();  		
    		$movieItem['voteAverage'] = $movie->getVoteAverage();
    		
    		$movies[] = $movieItem;
    		
    	}
    	
    	return \Response::json($movies);	
    	
    }

}


