<?php
declare(strict_types=1);

namespace core;

use \core\Interfaces;
use \core\Coordinate;

class Robot{

  private $Cmd  = [];

  private $Inst = [];

  private $Coordinate;

  function __construct(array $Inst, Coordinate $Coordinate){
    $this->setCoordinate($Coordinate);
    $this->setInstruction($Inst);
  }

  public function getCoordinate(){
    return $this->Coordinate;
  }

  public function setCoordinate(Coordinate $Coordinate){
    $this->Coordinate = $Coordinate;
    return $this;
  }

  public function addCommand(Interfaces $command){
    array_push($this->Cmd,$command);
    return $this;
  }

  public function setInstruction(array $Inst){
    $this->Inst = $Inst;
    return $this;
  }

  public function exec(){
    foreach ($this->Inst as $InstLabel) {
      foreach($this->Cmd as $CmdLabel){
        if( $CmdLabel->isValidCommand($InstLabel) ){
          $this->Coordinate = $CmdLabel->updateCoordinate($this->Coordinate);
        }
      } unset($CmdLabel);
    } unset($InstLabel);
    return $this;
  }
}
