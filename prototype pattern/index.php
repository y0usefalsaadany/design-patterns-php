<?php

spl_autoload_register(function ($class){
  require($class .".php");
});

$computer = new computer();
$laptop   = new laptop();

$pc = clone $computer;
echo "this computer's processor is: ". $pc->getProcessor("amd");
echo "<pre>";
var_dump($pc);
echo "</pre>";

$lap = clone $laptop;
echo "<br>this laptop's processor is: " .$lap->getProcessor("intel");

echo "<pre>";
var_dump($lap);
echo "</pre>";