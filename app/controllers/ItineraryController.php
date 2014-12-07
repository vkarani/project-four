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
  	//DEBUG ... Find logged in user
  	$email = Auth::user()->email;
  	//echo Paste\Pre::render($email);
  	$userid = Auth::user()->id;
  	//echo Paste\Pre::render($userid);
  	
  	$itineraries = Visitdate::with('destination')
  	               -> where('user_id',$userid)
  	               ->get(); //TODO <-- add query for user
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
  	
  }
  
  /**
	* Process the "Add an Itinerary form"
	* @return Redirect
	*/
  public function postCreate(){
  	
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
	* Process itinerary deletion
	*
	* @return Redirect
	*/
  public function postDelete() {
  	
  }
  
}
