# Singleton pattern
If we have a class for connecting to the database, and if we want to create more than one object for this class, and suppose we create four objects, four objects will be stored in the RAM for one class!
That's why this pattern was made where you can create more than one number of objects for the same class, but only the first object will be stored in RAM and the rest of the objects will refer to the first object

Singleton.php
```
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
```

index.php
```
<?php

spl_autoload_register(function ($class){
  require $class . '.php';
});

new singleton();
new singleton();
new singleton();
```

The outputs of this code are:
```
connected
string(16) "first object"
string(16) "other object"
string(16) "other object"
```

Although three objects were created, the word “connected” was printed only once

But if we didn't use a singleton pattern, the word would be printed
```
connected
connected
connected
```
