<?php
spl_autoload_register(function ($class){
  require($class.".php");
});

$test = new Facade();
$test->hashPassword("yousef2020");