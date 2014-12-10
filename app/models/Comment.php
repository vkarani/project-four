<?php

class Comment extends Eloquent {
   /**
   * Comment belongs to (has only one) Destination
   */
   public function destination(){
     return $this -> belongsTo('Destination');
   }
   
   /**
   * Comment belongs to (has only one) User
   */
   public function user(){
     return $this -> belongsTo('User');
   }
   
}
