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
	return "Main Landing page. Add links for Hotel and Attractions";
});


/*List of Hotels*/
Route::get('/hotels', function()
{
	//return View::make('???');
	return "List of Available Hotels";
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
	//return View::make('???');
	return "List of Available Attractions";
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
   return "Display a list of all itineraries";
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
