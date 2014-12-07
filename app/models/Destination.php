<?php

class Destination extends Eloquent {
	
  /**
   * Destination Belongs to many Categories
   */
   public function categories(){
     return $this -> belongsToMany('Category');
   }
   
   /**
   * Destination Belongs to many VisitDates
   */
   public function visitdate(){
     return $this -> belongsToMany('Visitdate');
   }
   
   /**
   * Returns a key=>value pair of destination id => destination name
   */
   public static function getIdNamePair() {
	   $destinations = Array();
		 $collection = Destination::all();
		 foreach($collection as $destination) {
		   $destinations[$destination->id] = $destination->name;
		 }
     return $destinations;
	 }
}
