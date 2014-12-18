<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
   * User HasMany Visitdates
   */
	public function user() {
    return $this->hasMany('Visitdate');
  }
  
  /**
   * User HasMany Comments
   */
  public function comment(){
    return $this -> hasMany('Comment');
  }
  
  /**
  * get itinerary for user
  */
  public function itineraries(){
  	$itineraries = Visitdate::with('destination')
  	                      -> where('user_id',$this ->id)
  	                      ->get();
  	return $itineraries;
  }
  
    /**
    * friends
    */
  public function friends()
  {
    $friends = $this->belongsToMany('User', 'friend_user', 'user_id', 'friend_id');
    return $friends;
  }
   
  public function add_friend($friend_id)
  {
    $this->friends()->attach($friend_id);   // add friend
   // $friend = User::find($friend_id);       // find your friend, and...
   // $friend->friends()->attach($this->id);  // add yourself, too
  }
   
  public function remove_friend($friend_id)
  {
    $this->friends()->detach($friend_id);   // remove friend
   // $friend = User::find($friend_id);       // find your friend, and...
   // $friend->friends()->detach($this->id);  // remove yourself, too
  }

}
