<?php

class createPc extends FactoryMethod{
  public function createComputer(){
    $lap = new laptop();
    $lap->showComputer();
    return $lap;
  }

}