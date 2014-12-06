<?php

class Visitdate extends Eloquent {
	public function user() {
    # Visitdate belongs to User
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('User');
  }
  public function destination(){
     return $this -> belongsToMany('Destination');
   }
}
