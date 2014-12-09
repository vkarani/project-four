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
   
  # Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {
    parent::boot();
    static::deleting(function($visitdate) {
            DB::statement('DELETE FROM destination_visitdate WHERE visitdate_id = ?', array($visitdate->id));
    });
	} 
}
