<?php
declare(strict_types=1);

namespace core;

use \core\Coordinate;

class Move implements Interfaces{

  public function isValidCommand($Command):bool{
    return ($Command === 'M');
  }

  public function updateCoordinate(Coordinate $Coordinate):Coordinate{
    $newPosX = $Coordinate->getPosX();
    $newPosY = $Coordinate->getPosY();

    switch($Coordinate->getDirection()){
      case 'N': //Move up
        $newPosY = $Coordinate->getPosY()+1;
      break;
      case 'S': //Move down
        $newPosY = $Coordinate->getPosY()-1;
      break;
      case 'E': //Move right
        $newPosX = $Coordinate->getPosX()+1;
      break;
      case 'W': //Move left
        $newPosX = $Coordinate->getPosX()-1;
      break;
    }

    return new Coordinate(
      $newPosX,
      $newPosY,
      $Coordinate->getDirection()
    );

  }
}
