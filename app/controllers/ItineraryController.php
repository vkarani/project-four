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
  	//DEBUG section here... get data from DB
  	$itinerary = Visitdate::first();
  	echo "The Checkin date is ".$itinerary -> checkin_date."<br>"; //DEBUG
  	//echo Paste\Pre::render($itinerary -> destination() -> first() -> name); //DEBUG
  	echo "The name of the destination is ".$itinerary -> destination() -> first() -> name."<br>";
  	//echo Paste\Pre::render($itinerary -> destination -> first() -> categories()-> first()-> name); //DEBUG
  	echo "The type of destination is ".$itinerary -> destination -> first() -> categories()-> first()-> name."<br>";
  	//echo Paste\Pre::render($itinerary); //DEBUG
  	return View::make('itinerary');//TODO send stuff to itinerary
  	//DEBUG section above. get data from DB.
  	/*
//  	$itinerary = Visitdate::with('destination')->get();
  	$itinerary = Visitdate::first();
    if($itinerary -> isEmpty()!= TRUE ){
      //return View::make('attractions')->with('destinations',$destinations);
      echo Paste\Pre::render($itinerary); //DEBUG
//      echo $itinerary -> checkin_date;
      return View::make('itinerary');//TODO send stuff to itinerary
    } 
    else{
      //TODO Make me better
      return 'No Itinerary Found';
    }
    */
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
