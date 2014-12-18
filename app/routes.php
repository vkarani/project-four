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
 * Destinations
 * to list and view details for Hotels or Attractions
 */
Route::get('/destinations/{id}', 'DestinationController@getEdit');



/**
 * Itineraries
 */                        
Route::get('/itinerary', 'ItineraryController@getIndex');
Route::get('/itinerary/create', 'ItineraryController@getCreate');
Route::post('/itinerary/create', 'ItineraryController@postCreate');	
Route::get('/itinerary/edit/{id}', 'ItineraryController@getEdit');
Route::post('/itinerary/edit', 'ItineraryController@postEdit');
Route::post('/itinerary/delete/{id}', 'ItineraryController@postDelete');
Route::delete('/itinerary/delete/{id}', 'ItineraryController@destroy');


/**
 * Comments
 */
Route::get('/comments/user/{id}', 'CommentController@getListUser');
Route::get('/comments/destination/{id}', 'CommentController@getListDestination');
Route::get('/comments/destination/create/{id}', 'CommentController@getCreate');   //Add a comment form
Route::post('/comments/create', 'CommentController@postCreate');               //Add a comment post
Route::get('/comments/destination/edit/{id}', 'CommentController@getEdit');     //Edit a comment form 
Route::post('/comments/edit', 'CommentController@postEdit');               //Edit a comment post

/**
 * Friends
 */                        
Route::get('/friends', 'FriendController@getIndex');
Route::get('/friends/itinerary/{id}', 'FriendController@getItinerary');  //List Friends itinerary
Route::post('/friends/delete/{id}', 'FriendController@postDelete');//Delete a Friend
Route::delete('/friends/delete/{id}', 'FriendController@destroy');

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

  
  #Test user3
  $user3 = new User;
  $user3->email = "user3@email.com";
  $user3->password = Hash::make("password");
  #Try to add user user3 
  try {
    $user3->save();
  }
  #Fail
  catch (Exception $e) {
  	return "Failed to create user3";
  }
  echo "Created User user3 <br>";

  #Test user4
  $user4 = new User;
  $user4->email = "user4@email.com";
  $user4->password = Hash::make("password");
  #Try to add user user4 
  try {
    $user4->save();
  }
  #Fail
  catch (Exception $e) {
  	return "Failed to create user4";
  }
  echo "Created User user4 <br>";

  
  
  
  //Make user1 some friends ...
  $user1->add_friend($user2->id);
  echo "Made user2 a friend of user1 <br>";
  $user1->add_friend($user3->id);
  echo "Made user3 a friend of user1 <br>";
  $user1->add_friend($user4->id);
  echo "Made user4 a friend of user1 <br>";
  

  //echo "The friend of user1 is $user3->email<br>";
  //echo Paste\Pre::render($user3); //DEBUG  

  #User1 comments on Lady Liberty
  $l_comment =  new Comment;
  $l_comment -> comment = "Great and historic but SO many tourists";
  $l_comment -> user() -> associate($user1);
  $l_comment -> destination() -> associate($liberty);
  $l_comment -> save();
  echo "user1 comments on Lady Liberty <br>";
  
  #User1 comments on central park
  $c_comment =  new Comment;
  $c_comment -> comment = "I almost got run over by a rabid cyclist! Didn't even stop. Where is the justice?";
  $c_comment -> user() -> associate($user1);
  $c_comment -> destination() -> associate($c_park);
  $c_comment -> save();
  echo "user1 comments on central park <br>";  

  $c_comment1 =  new Comment;
  $c_comment1 -> comment = "Good for people watching.";
  $c_comment1 -> user() -> associate($user1);
  $c_comment1 -> destination() -> associate($c_park);
  $c_comment1 -> save();
  echo "user1 comments on central park. Again. <br>";  

  $c_comment2 =  new Comment;
  $c_comment2 -> comment = "Looks like the Tavern on the green is shuttered. Sad.";
  $c_comment2 -> user() -> associate($user1);
  $c_comment2 -> destination() -> associate($c_park);
  $c_comment2 -> save();
  echo "user1 comments on central park. Again and Again. <br>"; 
  
  $c_comment3 =  new Comment;
  $c_comment3 -> comment = "Looks like the Tavern on the green is shuttered. Sad.";
  $c_comment3 -> user() -> associate($user2);
  $c_comment3 -> destination() -> associate($c_park);
  $c_comment3 -> save();
  echo "user3 comments on central park. Again and Again. <br>";
  
  
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
  
  echo "Seeding done <br>";
  
  /*
  echo "The friends of user1 are ";
  foreach($user1->friends as $i) {
    //var_dump($i->email);
    echo $i->email;
  }
  */
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


