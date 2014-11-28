<?php

class Category extends Eloquent {
  /*
   * Categories Belong to many Destinations
   */
   public function destinations(){
     return $this -> belongsToMany('Destination');
   }
}
