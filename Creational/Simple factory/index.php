<?php

spl_autoload_register(function ($class){
  require($class .".php");
});

//$test = FactoryMethod::index();
$amd = SimpleFactory::buildClass("amd");
$intel = SimpleFactory::buildClass("intel");