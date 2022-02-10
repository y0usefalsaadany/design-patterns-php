<?php

class CreateDevice extends FactoryMethod{
  public function createComputer(){
    $lap = new laptop();
    $lap->showComputer("16","intel core i7 10th");
    return $lap;
  }

}