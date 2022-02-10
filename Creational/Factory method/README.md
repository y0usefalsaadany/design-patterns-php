# Factoty method pattern

This pattern acts as a factory in the sense that if we want to build a computer, we make specific rules so that other models follow these rules
We make an abstract class in the name of computer and set the rules for properties:

computer.php
```
<?php

abstract class computer{
  public $ram;
  public $processor;
  abstract function showComputer($ram,$cpu);

}
```
Now if we want to create a laptop, it has to follow the criteria that we set in the computer. We make a class with the name laptop and inherit it from the computer

laptop.php 
```
<?php

class laptop extends computer{
  
  public function showComputer($ram,$cpu){
    $this->ram = $ram;
    $this->processor = $cpu;
    echo "laptop's ram is: " . $this->ram  ."GB<BR>cpu is: ".$this->processor;
  }
  
}
```
Now let's make a abstract class called FactoryMethod
With it, we will create any device we want:

FactoryMethod.php
```
<?php


abstract class FactoryMethod{
  abstract function createComputer();
  
}

```
Now let's get this laptop ready and make a class called : CreateDevice

CreateDevice.php
```
<?php

class CreateDevice extends FactoryMethod{
  public function createComputer(){
    $lap = new laptop();
    $lap->showComputer();
    return $lap;
  }
}
```

Now let's create an index.php file to implement this pattern

index.php
```
<?php

spl_autoload_register(function ($class){
  require($class.".php");
});

$pc = new createPc();
$pc->createComputer();
```
The outputs of this code are:
```
laptop's ram is: 16GB
cpu is: intel core i7 10th
```