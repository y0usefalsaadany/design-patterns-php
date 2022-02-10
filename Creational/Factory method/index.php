<?php

spl_autoload_register(function ($class){
  require($class.".php");
});

$pc = new CreateDevice();
$pc->createComputer();