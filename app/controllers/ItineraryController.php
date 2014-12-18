<?php

class ItineraryController extends BaseController {
	/** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    # Only logged in users allowed here.
		$this->beforeFilter('auth');
  }

  public function getIndex(){
  	/*
  	//DEBUG ... Find logged in user    TODO remove
  	$email = Auth::user()->email;      //TODO remove
  	//echo Paste\Pre::render($email);  //TODO remove
  	*/
  	$userid = Auth::user()->id;
  	//echo Paste\Pre::render($userid);
  	
  	$itineraries = Visitdate::with('destination')
  	               -> where('user_id',$userid)
  	               ->get(); //TODO <-- add query for user
  	//echo Paste\Pre::render($itineraries);//DEBUG
  	
  	//DEBUG section here... get data from DB
  	/*
  	foreach($itineraries as $itinerary){
  		echo "The Checkin date is ".$itinerary -> checkin_date."<br>"; //DEBUG
  	  //echo Paste\Pre::render($itinerary -> destination() -> first() -> name); //DEBUG
  	  echo "The name of the destination is ".$itinerary -> destination() -> first() -> name."<br>";
  	  //echo Paste\Pre::render($itinerary -> destination -> first() -> categories()-> first()-> name); //DEBUG
  	  echo "The type of destination is ".$itinerary -> destination -> first() -> categories()-> first()-> name."<br>";
  	  //echo Paste\Pre::render($itinerary); //DEBUG
  	}
  	*/
  	//DEBUG section above. get data from DB.
  	return View::make('itinerary')
  	           ->with('itineraries', $itineraries);
  	           //->with('email',$email);
  }

  /**
	* Show the "Add an itinerary form"
	* @return View
	*/  
  public function getCreate(){
  	$destinations = Destination::getIdNamePair();
  	//echo Paste\Pre::render($destinations); //DEBUG
    return View::make('itinerary_add')
    	           ->with('destinations',$destinations);
  	//return View::make('itinerary_add');
  }
  
  /**
	* Process the "Add an Itinerary form"
	* @return Redirect
	*/
  public function postCreate(){
    //echo Paste\Pre::render($_POST); //DEBUG

    //Validation
    $data= Input::all();
    /*checkindate, time mandatory
      All dates and times must have proper format
    */
    $rules = array(
      'checkindate'  => 'required|date_format:Y-n-d',
      'checkintime'  => 'required|date_format:H:i',
      'checkoutdate' => 'date_format:Y-n-d',
      'checkouttime'  => 'date_format:H:i'
    );
    
    $validator = Validator::make($data, $rules);
    
    if ($validator->passes()) {
    	//echo "pass <br>"; //DEBUG
      //Destination
      // Validation for destination_id done using findOrFail
      try {
	      $destination = Destination::findOrFail(Input::get('destination_id'));
	      //echo Paste\Pre::render($destination); //DEBUG
	    }
	    catch(exception $e) {
	      return Redirect::to('/itinerary')->with('flash_message', 'The selected Destination was not found');
	    }
	    /*
	    //checkindate
	    echo Paste\Pre::render(Input::get('checkindate')); //DEBUG
	    //checkintime
	    echo Paste\Pre::render(Input::get('checkintime')); //DEBUG
	    //checkoutdate
	    echo Paste\Pre::render(Input::get('checkoutdate')); //DEBUG
	    //checkouttime
	    echo Paste\Pre::render(Input::get('checkouttime')); //DEBUG
	    */
	    $checkindatetime=Input::get('checkindate').' '.Input::get('checkintime').':00';
	    //echo $checkindatetime."<br>";//DEBUG
	    
	    $checkoutdatetime=NULL;
	    if((Input::get('checkoutdate')!=NULL)&&(Input::get('checkouttime')!=NULL)){
	      $checkoutdatetime=Input::get('checkoutdate').' '.Input::get('checkouttime').':00';
	      //echo $checkoutdatetime."<br>";//DEBUG
	    }
	    //Create the visit Model and save it
	    $visitdate = new Visitdate;
	    //Checkin datetime
      $visitdate -> checkin_date = $checkindatetime;
      //Checkout datetime
      if($checkoutdatetime!=NULL){
      	$visitdate -> checkout_date = $checkoutdatetime;
      }
      //Associate with logged in user
      $user = Auth::user();
  	  //echo Paste\Pre::render($userid);//DEBUG
      $visitdate -> user() -> associate($user);
      $visitdate -> save();
      //Attach to the destination
      $visitdate -> destination()->attach($destination);
      //echo "Created a new stay <br>";//DEBUG
	    
	    return Redirect::action('ItineraryController@getIndex')
  	                 ->with('flash_message','Your visit was added to your Itinerary.');
  	  
    }
    return Redirect::to('/itinerary/create')
           ->withInput()
           ->withErrors($validator)
           ->with('flash_message','Please fix the errors and resubmit');             
  }
  
  /**
	* Show the "Edit an Itinerary form"
	* @return View
	*/
  public function getEdit(){
  	
  }
  
  /**
	* Process the "Edit an Itinerary form"
	* @return Redirect
	*/
  public function postEdit(){
  	
  }
  
  
  /**
  * Confirm Itinerary Deletion
  * 
  */
  public function getDelete(){
  	//echo Paste\Pre::render($_GET); //DEBUG
  	//echo Paste\Pre::render($_POST);
  	//TODO....
  }
  
  
  /**
	* Process itinerary deletion
	*
	* @return Redirect
	*/
	
  public function postDelete() {
  	//echo Paste\Pre::render($_POST); //DEBUG
  	/*
  	// Handle the delete confirmation.
    $id = Input::get('game');
    $game = Game::findOrFail($id);
    $game->delete();

    return Redirect::action('GamesController@index');
  	
  	
  	try {
	    $visitdate = Visitdate::findOrFail(Input::get('id'));
	  }
	  catch(exception $e) {
	    return Redirect::to('/itinerary/')->with('flash_message', 'Could not delete itinerary item - not found.');
	  }
	  Visitdate::destroy(Input::get('id'));
	  return Redirect::to('/itinerary/')->with('flash_message', 'Itinerary item deleted.');
	  */
  }
  
  
  /**
	* Process itinerary deletion
	*
	* @return Redirect
	*/
	
  public function destroy($id) {
  	try {
	    $visitdate = Visitdate::findOrFail($id);
	  }
	  catch(exception $e) {
	    return Redirect::to('/itinerary/')->with('flash_message', 'Could not delete itinerary item - not found.');
	  }
	  Visitdate::destroy($id);
	  return Redirect::to('/itinerary/')->with('flash_message', 'Itinerary item deleted.');
  }
  
  
  
}
