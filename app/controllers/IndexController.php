<?php

class IndexController extends BaseController {
	/** 
   * Constructor
   */
  public function __construct(){
    //Call the Basecontroller
    parent::__construct();
    # Only guests allowed here.
		$this->beforeFilter('guest');
  }

  public function getIndex(){
  	return View::make('index');
  }
  
}
