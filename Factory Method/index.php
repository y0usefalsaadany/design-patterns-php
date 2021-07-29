<?php

spl_autoload_register(function ($class){
  require($class.".php");
});

$pc = new createPc();
$pc->createComputer();
echo "<pre>";
var_dump($pc);
echo "</pre>";
