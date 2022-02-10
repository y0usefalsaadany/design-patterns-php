<?php

abstract class computer {
  private $processor;
  abstract function __clone();
  public function getProcessor($processor){
    echo "this laptop's processor is: " . $this->processor = $processor;
  }
}