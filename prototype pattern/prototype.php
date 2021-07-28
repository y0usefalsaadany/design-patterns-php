<?php

abstract class prototype {
  private $processor;
  
  public function getProcessor($processor){
    return $this->processor = $processor;
  }
    
}