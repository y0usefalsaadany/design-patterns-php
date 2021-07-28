<?php

class singleton{
  private static $instance;
  
  private function __construct(){
    echo "hello <BR>";
  }
  public function getInstance(){
    if (null === self::$instance){
      self::$instance = new singleton();
      var_dump("first");
      return self::$instance;
    }
    var_dump("other");
    return self::$instance;
  }
  
  
}
