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
               
  	//echo Paste\Pre::render($user_email);//DEBUG
  		
  	$itineraries = Visitdate::with('destination')
  	               -> where('user_id',$userid)
  	               ->get();
  	 
  	
  	return View::make('friend_itinerary')
  	           ->with('itineraries', $itineraries)
  	           ->with('user_email',$user_email);
  	           
  }
  
  
  /**
	* Process itinerary deletion
	*
	* @return Redirect
	*/	
  public function postDelete() {
  	//echo Paste\Pre::render($_POST); //DEBUG
  }
  
  
  /**
	* Process itinerary deletion
	*
	* @return Redirect
	*/
  public function destroy($id) {
  	try {
	    $user = User::findOrFail($id);
	  }
	  catch(exception $e) {
	    return Redirect::to('/friends/')->with('flash_message', 'Could not remove friend - not found.');
	  }
  	
  	//$user1->add_friend($user2->id);
  	Auth::user()->remove_friend($id);
	  return Redirect::to('/friends/')->with('flash_message', 'Friend removed.');
  }
  
  
  public function postAdd(){
  	//echo Paste\Pre::render($_POST); //DEBUG
  	
  	//Validation
    $data= Input::all();
    /*checkindate, time mandatory
      All dates and times must have proper format
    */
    $rules = array(
      'friend'  => 'required|email'
    );
    $validator = Validator::make($data, $rules);
    
    if ($validator->passes()) {
    	//get id from email address...
    	$friend_users= User::where('email','=' , Input::get('friend') ) -> get();
    	//echo Paste\Pre::render($friend_users); //DEBUG
    	
    	$result = count($friend_users);
    	//echo Paste\Pre::render($result); //DEBUG
    	
    	if ($result > 0){
    		foreach($friend_users as $friend_user){
    		  //echo Paste\Pre::render($friend_user -> id); //DEBUG
    		  $current_user = Auth::user();
    		  $current_user->add_friend($friend_user ->id);
    		  return Redirect::to('/friends')->with('flash_message', 'Friend '.$friend_user -> email.' added');
    	  }
    	}
    	else{
    		return Redirect::to('/friends')->with('flash_message', 'The selected User does not exist');
    	}
    
    }

  }

  
}
