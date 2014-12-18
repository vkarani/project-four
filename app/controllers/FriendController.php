<?php

class FriendController extends BaseController {
	/** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    # Only logged in users allowed here.
		$this->beforeFilter('auth');
  }
  
  //List Friends
  public function getIndex(){
    return View::make('friend');                                
  }
  
  //List Itinerary for a particular friend
  public function getItinerary($id){
  	
  	try {
		  $user = User::findOrFail($id);
		}
		catch(exception $e) {
		  return Redirect::to('/attractions')->with('flash_message', 'Friend does not exist');
		}
    $userid=$user->id;
    $user_email = $user->email;
               
  	echo Paste\Pre::render($user_email);//DEBUG
  		
  	$itineraries = Visitdate::with('destination')
  	               -> where('user_id',$userid)
  	               ->get();
  	 
  	
  	return View::make('friend_itinerary')
  	           ->with('itineraries', $itineraries)
  	           ->with('user_email',$user_email);
  	           
  }
  
}
