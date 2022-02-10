<?php

class laptop extends computer{
  
  public function showComputer($ram,$cpu){
    $this->ram = $ram;
    $this->processor = $cpu;
    echo "laptop's ram is: " . $this->ram  ."GB<BR>cpu is: ".$this->processor;
  }
  
}