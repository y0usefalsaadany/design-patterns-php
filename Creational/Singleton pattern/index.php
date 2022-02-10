<?php

spl_autoload_register(function ($class){
  require $class . '.php';
});

new singleton();
new singleton();
new singleton();
