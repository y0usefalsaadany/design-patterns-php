<?php

class SimpleFactory{

  public static function buildClass($name){
    $className = $name;
    if(class_exists($className)){
      return new $className();
    }else{
      echo "this class name : {$className} not found <br>";
    }
  }
}