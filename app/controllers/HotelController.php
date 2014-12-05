<?php

class HotelController extends BaseController {
	/** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    # Only guests allowed here.
		$this->beforeFilter('auth');
  }

  public function getIndex(){
    //$destinations = Destination::all();
    $destinations = Destination::with('categories')->get();  
    if($destinations -> isEmpty()!= TRUE ){
      return View::make('hotels')->with('destinations',$destinations);
    } 
    else{
      //TODO Make me better
      return 'No Destinations Found';
    }
  }

  /**
	* Show the "Add a Hotel form"
	* @return View
	*/  
  public function getCreate(){
  	
  }
  
  /**
	* Process the "Add a Hotel form"
	* @return Redirect
	*/
  public function postCreate(){
  	
  }
  
  /**
	* Show the "Edit a Hotel form"
	* @return View
	*/
  public function getEdit(){
  	
  }
  
  /**
	* Process the "Edit a Hotel form"
	* @return Redirect
	*/
  public function postEdit(){
  	
  }
  
  
}
