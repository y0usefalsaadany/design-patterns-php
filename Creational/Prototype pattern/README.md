# Prototype pattern

If we want to create more than one object for a class, we write
new className();
But we can create more than one object in another way by cloning, this is faster than the method
 new className();

For example, we have a computer class and we want to create another computer, so we make an abstract class called
Prototype with the use of
__clone magic method();

computer.php
```
<?php

abstract class computer {
  private $processor;
  
  public function getProcessor($processor){
    return $this->processor = $processor;
  }
}
```

Then we make a laptop class with inheriting from the abstract class computer 

laptop.php
```
<?php

class laptop extends computer{

}

```

Then we create index.php file and make laptop class from computer by cloning

index.php
```
<?php

spl_autoload_register(function ($class){
  require($class .".php");
});

$laptop = new laptop();
$newLaptop = clone $laptop;
echo "this laptop's processor is: " . $newLaptop->getProcessor("amd");
echo "<pre>";
var_dump($newLaptop);
echo "</pre>";
```
The outputs of this code are:
```
this pc's processor is: amd
object(laptop)#3 (1) {
  ["processor":"computer":private]=>
  string(3) "amd"
}
```