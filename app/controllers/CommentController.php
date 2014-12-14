<?php

class CommentController extends BaseController {
	/** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    # Only logged in users allowed here.
		$this->beforeFilter('auth');
  }

  /*-->/comments/{id}*/
  //List all comments by a particular user
  public function getListUser($id) {
	  try {
		  $user = User::findOrFail($id);
		  $comments = $user-> comment;
		  //$authors = Author::getIdNamePair();
		}
		catch(exception $e) {
		  return Redirect::to('/attractions')->with('flash_message', 'User does not exist');
		}
		//echo Paste\Pre::render($comments);//DEBUG
		/*
		foreach($comments as $comment){
			echo Paste\Pre::render($comment -> comment);//DEBUG
			echo Paste\Pre::render($comment -> destination -> name);//DEBUG
		}*/
		
    return View::make('user_comment')
               ->with('comments', $comments)
               ->with('user', $user) ;
	}
	
	//List all comments for a particular desination
  public function getListDestination($id){
  	try {
		  $destination = Destination::findOrFail($id);
		  $comments = $destination-> comment;
		  //$authors = Author::getIdNamePair();
		}
		catch(exception $e) {
		  return Redirect::to('/attractions')->with('flash_message', 'Destination does not exist');
		}
		/*
		echo Paste\Pre::render($comments);//DEBUG
		echo Paste\Pre::render($destination->name);//DEBUG
		
		foreach($comments as $comment){
			echo Paste\Pre::render($comment -> comment);//DEBUG
			//echo Paste\Pre::render($comment -> destination -> name);//DEBUG
		}
		*/
  	
  	return View::make('destination_comment')
               ->with('comments', $comments)
               ->with('destination', $destination) ;
  }
  
  //Form to add a comment for a destination
  public function getCreate($id){
  	try {
		  $destination = Destination::findOrFail($id);
		  	//$comments = $destination-> comment;
		  //$authors = Author::getIdNamePair();
		}
		catch(exception $e) {
		  return Redirect::to('/attractions')->with('flash_message', 'Destination does not exist');
		}
		
		return View::make('comment_add')
               ->with('destination', $destination) ;
		
  }
  
  //Handle the post. Add comment to the db.
  public function postCreate(){
  	//echo Paste\Pre::render($_POST); //DEBUG
  	
  	//Validation
    $data= Input::all();
    /*comment required, at least 10 char
      destination_id required
    */
    $rules = array(
      'comment'  => 'required|min:10',
      'destination_id'  => 'required|numeric'
    );
    
    $validator = Validator::make($data, $rules);
    
    if ($validator->passes()) {
    	//echo "pass <br>"; //DEBUG
    	//get the destination from db as object
    	try {
	      $destination = Destination::findOrFail(Input::get('destination_id'));
	      //echo Paste\Pre::render($destination); //DEBUG
	    }
	    catch(exception $e) {
	      return Redirect::to('/itinerary')->with('flash_message', 'The selected Destination was not found');
	    }
	    //get the comment from the post
	    $comment=Input::get('comment');
	    
	    $c1 =  new Comment;
      $c1 -> comment = $comment;
      $c1 -> user() -> associate(Auth::user());
      $c1 -> destination() -> associate($destination);
      $c1 -> save();
      
      return Redirect::to('/comments/user/'.Auth::user()->id)
  	                 ->with('flash_message','Your comment for '.$destination -> name.' was added.');
	    
    }
    return Redirect::to('/comments/destination/add/'.Input::get('destination_id'))
           ->withInput()
           ->withErrors($validator)
           ->with('flash_message','Please fix the errors and resubmit'); 
  }
  
  
  //Form to add a comment for a destination
  
  public function getEdit($comment_id){
  	
  	try {
		  $comment = Comment::findOrFail($comment_id);
		  	//$comments = $destination-> comment;
		  //$authors = Author::getIdNamePair();
		}
		catch(exception $e) {
		  return Redirect::to('/attractions')->with('flash_message', 'Comment does not exist');
		}

		return View::make('comment_edit')
		           ->with('comment', $comment);
		
  }
  
  
  //Handle the post. Add existing comment from the db.
  public function postEdit(){
  	//echo Paste\Pre::render($_POST); //DEBUG
  	
  	//Validation
    $data= Input::all();
    /*comment required, at least 10 char
      destination_id required
    */
    $rules = array(
      'comment'  => 'required|min:10',
      'comment_id'  => 'required|numeric'
    );
    
    $validator = Validator::make($data, $rules);
    
    if ($validator->passes()) {
    	//echo "pass <br>"; //DEBUG
    	//get the comment from db as object
    	try {
    		$comment = Comment::findOrFail(Input::get('comment_id'));
	      //$destination = Destination::findOrFail(Input::get('destination_id'));
	      //echo Paste\Pre::render($destination); //DEBUG
	      //echo "Pass";
	    }
	    catch(exception $e) {
	      return Redirect::to('/itinerary')->with('flash_message', 'The selected Comment was not found');
	    }
	    //get the destination
	    $destination=$comment->destination;
	    //echo Paste\Pre::render($destination); //DEBUG
	    
	    $comment -> comment = (Input::get('comment'));
	    $comment -> save();
	    //echo Paste\Pre::render($comment); //DEBUG	
	          
      return Redirect::to('/comments/user/'.Auth::user()->id)
  	                 ->with('flash_message','Your comment for '.$destination -> name.' was updated.');
    }
    
    return Redirect::to('/comments/destination/edit/'.Input::get('comment_id'))
           ->withInput()
           ->withErrors($validator)
           ->with('flash_message','Please fix the errors and resubmit');
    

  }
  
  
}
