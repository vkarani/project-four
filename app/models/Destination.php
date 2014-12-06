<?php

class Destination extends Eloquent {
  /*
   * Destination Belongs to many Categories
   */
   public function categories(){
     return $this -> belongsToMany('Category');
   }
   public function visitdate(){
     return $this -> belongsToMany('Visitdate');
   }
}
