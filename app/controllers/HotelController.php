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
}
