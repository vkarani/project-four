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


/*Seed Hotels and attractions
ONLY admin can do this.
*/
Route::get('/seed-hotels-and-attractions', function()
{ #Create category --> Hotel
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
  $c_park = new Destination();
  $c_park -> name = 'Lady Liberty';
  $c_park -> description = 'Liberty Enlightens the world';
  $c_park -> map = 'http://goo.gl/tNXFfC';
  $c_park -> link = 'images/attractions/Statue_of_Liberty.png';
  $c_park -> save();
  $c_park -> categories() -> attach ($attraction);
  echo "Created 2 attractions... <br>";
  
  echo "Seeding done";
});


/*Seed Hotels and attractions with comments and associated users
ONLY admin can do this.
*/
Route::get('/seed-hotels-and-attractions-with-comments', function()
{

});


/*Display a summary of itineraries
Only a logged in user will be able to 
visit ANY itinerary page.
*/
Route::get('/itinerary', 
  //return "Display a list of all itineraries";
  array(
    'before' => 'auth',
    function() {
      return View::make('itinerary');
    }
  )
);
/*Add itinerary*/
Route::get('/itinerary/add', function()
{
  return "Display form to create a new itinerary";
});
/*post info for itinerary*/
Route::post('/itinerary/add', function()
{
   
});



/***Debug****/
Route::get('/environment', function() {
  echo App::environment(); 
});


/**
* User
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


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
  echo "Truncated all Database records <br>";
});


Route::get('/unpacking-sessions-and-cookies', function() {

    # Log in check
    if(Auth::check())
        echo "You are logged in: ".Auth::user();
    else
        echo "You are not logged in.";
    echo "<br><br>";

    # Cookies
    echo "<h1>Your Raw, encrypted Cookies</h1>";
    echo Paste\Pre::render($_COOKIE,'');

    # Decrypted cookies
    echo "<h1>Your Decrypted Cookies</h1>";
    echo Paste\Pre::render(Cookie::get(),'');
    echo "<br><br>";

    # All Session files
    echo "<h1>All Session Files</h1>";
    $files = File::files(app_path().'/storage/sessions');

    foreach($files as $file) {
        if(strstr($file,Cookie::get('laravel_session'))) {
            echo "<div style='background-color:yellow'><strong>YOUR SESSION FILE:</strong><br>";
        }
        else {
            echo "<div>";
        }
        echo "<strong>".$file."</strong>:<br>".File::get($file)."<br>";
        echo "</div><br>";
    }

    echo "<br><br>";

    # Your Session Data
    $data = Session::all();
    echo "<h1>Your Session Data</h1>";
    echo Paste\Pre::render($data,'Session data');
    echo "<br><br>";

    # Token
    echo "<h1>Your CSRF Token</h1>";
    echo Form::token();
    echo "<script>document.querySelector('[name=_token]').type='text'</script>";
    echo "<br><br>";

});
