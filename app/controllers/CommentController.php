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
}
