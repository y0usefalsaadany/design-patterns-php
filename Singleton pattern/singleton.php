<?php

class singleton{
  private static $instance;
  
  public function __construct(){
    if (null === self::$instance){
        self::$instance = $conn = mysqli_connect('localhost','root','','mydb');
        if ($conn){
            echo "<h1 style='color:green'>connected</h1> <BR>";
        }
        var_dump("first object<br>");
      return self::$instance;
    }
    var_dump("other object<br>");
    return self::$instance;
  }  
}
