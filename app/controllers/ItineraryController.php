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
  	
  	$itinerary = Visitdate::with('destination')->get();  
    if($itinerary -> isEmpty()!= TRUE ){
      //return View::make('attractions')->with('destinations',$destinations);
      return View::make('itinerary');
    } 
    else{
      //TODO Make me better
      return 'No Itinerary Found';
    }
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
