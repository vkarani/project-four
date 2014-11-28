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

Route::get('/', 
  //return "Display a list of all itineraries";
  array(
    'before' => 'guest',
    function() {
      return View::make('index');
    }
  )
);

/*List of Hotels*/
Route::get('/hotels', 
  //return "Display a list of all itineraries";
  array(
    'before' => 'auth',
    function() {
      return View::make('hotels');
    }
  )
); 
	

/*Admin console to add/edit a hotel*/
/*get*/
Route::get('/hotels/add', function()
{
	//return View::make('???');
	return "Provide form to add a Hotel";
});
/*post*/
Route::post('/hotels/add', function()
{

});
Route::get('/hotels/edit/{name}', function()
{
	return "Form to edit hotel if it exists";
});
Route::post('/hotels/edit/{name}', function()
{
	
});


/*List of Attractions*/
Route::get('/attractions',
  //return "Display a list of all itineraries";
    array(
      'before' => 'auth', //lock down route
      function() {
        return View::make('attractions');
      }
    )
);

/*Admin console to add/edit attractions*/
/*get*/
Route::get('/attractions/add', function()
{

});
/*post*/
Route::post('/attractions/add', function()
{

});
Route::get('/attractions/edit/{name}', function()
{
	return "Form to edit attraction if it exists";
});
Route::post('/attractions/edit/{name}', function()
{
	
});
 
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

/**Signup**/
Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/attractions')->with('flash_message', 'Welcome to Foobooks!');

        }
    )
);

/**Login**/

Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);


Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/itinerary')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);


Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});


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



