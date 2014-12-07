<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Index
 */
Route::get('/', 'IndexController@getIndex');


/**
* User
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


/**
 * Hotels
 */
/*List*/
Route::get('/hotels', 'HotelController@getIndex');
/*Admin only*/
Route::get('/hotels/create', 'HotelController@getCreate');
Route::post('/hotels/create', 'HotelController@postCreate');	
Route::get('/hotel/edit/{id}', 'HotelController@getEdit');
Route::post('/hotel/edit', 'HotelController@postEdit');


/**
 * Attractions
 */
/*List*/
Route::get('/attractions', 'AttractionController@getIndex');
/*Admin only*/
Route::get('/attractions/create', 'AttractionController@getCreate');
Route::post('/attractions/create', 'AttractionController@postCreate');	
Route::get('/attractions/edit/{id}', 'AttractionController@getEdit');
Route::post('/attractions/edit', 'AttractionController@postEdit');


/**
 * Itineraries
 */                        
Route::get('/itinerary', 'ItineraryController@getIndex');
Route::get('/itinerary/create', 'ItineraryController@getCreate');
Route::post('/itinerary/create', 'ItineraryController@postCreate');	
Route::get('/itinerary/edit/{id}', 'ItineraryController@getEdit');
Route::post('/itinerary/edit', 'ItineraryController@postEdit');
Route::post('/itinerary/delete', 'ItineraryController@postDelete');

/**
 * Seed everything
 * Hotels Done
 * Attractions Done
 * Admin and User1 Done
 * Couple of itineraries for User1 <--- TODO
 * Comments on Destinations <--- TODO
 */
Route::get('/seed', function()
{ #Hotels ...
	#Create category --> Hotel
  $hotel = new Category();
  $hotel -> name ='hotel';
  $hotel -> save();
  echo "Created category Hotel... <br>";
	
  #Create Hotel --> Standard, high Line
  $standard = new Destination();
  $standard -> name = 'The Standard, High Line';
  $standard -> description = 'Amazing views straddling a one of a kind elevated park';
  $standard -> map = 'http://goo.gl/O1NfVZ';
  $standard -> link = 'images/hotels/Standard.png';
  $standard -> save();
  $standard -> categories() -> attach ($hotel); 
  
  #Create Hotel --> The W hotel
  $thew = new Destination();
  $thew -> name = 'The W Hotel';
  $thew -> description = 'Midtown and next to everything';
  $thew -> map = 'http://goo.gl/326Dnd';
  $thew -> link = 'images/hotels/W.png';
  $thew -> save();
  $thew -> categories() -> attach ($hotel); 
  echo "Created 2 Hotels... <br>";
  
  #Attractions...
  #Create category --> Attraction
  $attraction = new Category();
  $attraction -> name ='attraction';
  $attraction -> save();
  echo "Created category Attraction... <br>";
  
  #Create Attraction --> Central Park
  $c_park = new Destination();
  $c_park -> name = 'Central Park';
  $c_park -> description = 'An urban green space like no other';
  $c_park -> map = 'http://goo.gl/1ci2qj';
  $c_park -> link = 'images/attractions/Central_Park.png';
  $c_park -> save();
  $c_park -> categories() -> attach ($attraction);
  
  #Create Attraction --> Statue of Liberty
  $liberty = new Destination();
  $liberty -> name = 'Lady Liberty';
  $liberty -> description = 'Liberty Enlightens the world';
  $liberty -> map = 'http://goo.gl/tNXFfC';
  $liberty -> link = 'images/attractions/Statue_of_Liberty.png';
  $liberty -> save();
  $liberty -> categories() -> attach ($attraction);
  echo "Created 2 attractions... <br>";
  
  #Admin user
  $user = new User;
  $user->email = "admin@email.com";
  $user->password = Hash::make("password");   
  #Try to add admin user 
  try {
    $user->save();
  }
  #Fail
  catch (Exception $e) {
  	return "Failed to create Admin user";
  }
  echo "Created Admin User <br>";
  
  #Test user1
  $user1 = new User;
  $user1->email = "user1@email.com";
  $user1->password = Hash::make("password");
  #Try to add user user1 
  try {
    $user1->save();
  }
  #Fail
  catch (Exception $e) {
  	return "Failed to create user1";
  }
  echo "Created User user1 <br>";
  
  #Test user2
  $user2 = new User;
  $user2->email = "user2@email.com";
  $user2->password = Hash::make("password");
  #Try to add user user1 
  try {
    $user2->save();
  }
  #Fail
  catch (Exception $e) {
  	return "Failed to create user2";
  }
  echo "Created User user2 <br>";
  
  
  #Create a new itinerary
  $visitdate = new Visitdate;
  $visitdate -> checkin_date = "2014-07-10 12:00:00";
  $visitdate -> checkout_date = "2014-08-10 12:00:00";
  $visitdate -> user() -> associate($user1);
  $visitdate -> save();
  $visitdate -> destination()->attach($standard);
  echo "Created a stay at the standard hotel <br>";
  
  #Create another itinerary
  $visitdate1 = new Visitdate;
  $visitdate1 -> checkin_date = "2014-09-10 12:00:00";
  $visitdate1 -> user() -> associate($user1);
  $visitdate1 -> save();
  $visitdate1 -> destination()->attach($c_park);  
  echo "Created a trip to central park <br>";

  #Create another itinerary
  $visitdate2 = new Visitdate;
  $visitdate2 -> checkin_date = "2014-10-10 12:00:00";
  $visitdate2 -> checkout_date = "2014-11-10 12:00:00";
  $visitdate2 -> user() -> associate($user2);
  $visitdate2 -> save();
  $visitdate2 -> destination()->attach($thew);
  echo "Created a stay at the W <br>";  
  
  #Create another itinerary
  $visitdate3 = new Visitdate;
  $visitdate3 -> checkin_date = "2014-09-10 12:00:00";
  $visitdate3 -> user() -> associate($user2);
  $visitdate3 -> save();
  $visitdate3 -> destination()->attach($liberty);  
  echo "Created a trip to central park <br>";
  
  echo "Seeding done";
  
  

});







/***Debug****/
Route::get('/environment', function() {
  echo App::environment(); 
});


/**
 * Debug...
 * Various debug items...
 */
Route::get('/debug',function() {
  echo "Debug Messages... <br> <br>";
  echo "Environment: ".App::environment();
});


/*
TODO --> REMOVE ME BEFORE I GO LIVE
*/
Route::get('/truncate', function() {
  # Clear the tables to a blank slate
  DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
  DB::statement('TRUNCATE categories');
  DB::statement('TRUNCATE destinations');
  DB::statement('TRUNCATE category_destination');
  DB::statement('TRUNCATE users');
  DB::statement('TRUNCATE visitdates');
  DB::statement('TRUNCATE destination_visitdate');
  echo "Truncated all Database records <br>";
});
