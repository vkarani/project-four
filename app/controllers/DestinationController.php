<?php

class DestinationController extends BaseController {
	/** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    # Only logged in users allowed here.
		$this->beforeFilter('auth');
  }
  
  /**
	* Show the "Add a comment form"
	* @return View
	*/
	public function getEdit($id) {
		try{
			//$destination = Destination::with('tags')->findOrFail($id);
			$destination = Destination::with('categories')->findOrFail($id);
		}
		catch(exception $e){
			return Redirect::to('/itinerary')->with('flash_message', 'Destination not found');
		}
		
		//echo "<br> Boo <br>";//DEBUG
		//echo Paste\Pre::render($destination);//DEBUG
		
		
		return View::make('destination_detail')
    		->with('destination', $destination);
	  
	}

}
