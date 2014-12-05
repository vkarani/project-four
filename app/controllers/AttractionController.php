<?php

class AttractionController extends BaseController {
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
    	
  	$destinations = Destination::with('categories')->get();  
    if($destinations -> isEmpty()!= TRUE ){
      return View::make('attractions')->with('destinations',$destinations);
    } 
    else{
      //TODO Make me better
      return 'No Destinations Found';
    }
  }

  /**
	* Show the "Add an attraction form"
	* @return View
	*/  
  public function getCreate(){
  	
  }
  
  /**
	* Process the "Add an Attraction form"
	* @return Redirect
	*/
  public function postCreate(){
  	
  }
  
  /**
	* Show the "Edit an Attraction form"
	* @return View
	*/
  public function getEdit(){
  	
  }
  
  /**
	* Process the "Edit an Attraction form"
	* @return Redirect
	*/
  public function postEdit(){
  	
  }
  
  
}
