<?php

spl_autoload_register(function ($class){
  require($class .".php");
});

$laptop = new laptop();
$newLaptop = clone $laptop;
$newLaptop->getProcessor("amd");
echo "<pre>";
var_dump($newLaptop);
echo "</pre>";