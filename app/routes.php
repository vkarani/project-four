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

Route::get('/', function()
{
	//return View::make('hello');
	return View::make('index');
	//return "Main Landing page. Add links for Hotel and Attractions";
});




/*List of Hotels*/
Route::get('/hotels', function()
{
	return View::make('hotels');
	//return "List of Available Hotels";
});

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
Route::get('/attractions', function()
{
	return View::make('attractions');
	//return "List of Available Attractions";
});

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
{

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
Route::get('/itinerary', function()
{
   return View::make('itinerary');
   //return "Display a list of all itineraries";
});
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

