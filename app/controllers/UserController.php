<?php

class UserController extends BaseController {
        
  /** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    //Only signup if you are a guest...
    $this -> beforeFilter('guest', 
    	array(
        'only' =>array ('getLogin','getSignup')
      )
    );
  }
  
  /**
   * New User Signup form
   * @return View
   */
  public function getSignup(){
    return View::make('signup');
  }
  
  /*** 
   * Process a new user signup
   * @return Redirect
   */
  public function postSignup(){
    #The rules
    $rules=array(
      'email'=>'required|email|unique users,email',
      'password'=>'required|min:4',
    );
     
    #Run the Validator
    $validator=Validator::make(Input::all(), $rules);
     
    #Return to signup on fail
    if ($validator -> fails()){
      return Redirect::to('/signup')
        -> with('flash_message', 'Sign up failed; please try again.')
        -> withInput()
        -> withErrors($validator);
    }
    
    $user = new User;
    $user->email    = Input::get('email');
    $user->password = Hash::make(Input::get('password'));
     
    # Try to add the user 
    try {
      $user->save();
    }
    # Fail
    catch (Exception $e) {
      return Redirect::to('/signup')
        ->with('flash_message', 'Sign up failed; please try again.')
        ->withInput();
    }

    # Log the user in
    Auth::login($user);

    return Redirect::to('/attractions')
      ->with('flash_message', 'Welcome to New York Travel!');

  }
  
  /**
   * Display Login Form
   * @return View
   */
  public function getLogin(){
  	return View::make('login');
  }
  
  /**
   * Process the login form
   * @return View
   */
   public function postLogin(){
     //TODO ******* csrf?????
   	 $credentials = Input::only('email','password');
   	 if (Auth::attempt($credentials, $remember = true)) {
        return Redirect::intended('/itinerary')->with('flash_message', 'Welcome Back!');
     }
     else {
        return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
     }
     return Redirect::to('login');
   }
   
   
   /**
    * Logout
    * @return Redirect
    */
   public function getLogout(){
   	 # Log out
     Auth::logout();

     # Send them to the homepage
     return Redirect::to('/');
   } 
  
  
}

