<?php
declare(strict_types=1);

namespace core;

use \core\Coordinate;

class Right implements Interfaces{

  public function isValidCommand($Command):bool{
    return ($Command === 'R');
  }

  public function updateCoordinate(Coordinate $Coordinate):Coordinate{
    $newDirection = $Coordinate->getDirection();

    switch($Coordinate->getDirection()){
      case 'N': // +90d
        $newDirection = Coordinate::DIR_EAST;
      break;
      case 'S': // +90d
        $newDirection = Coordinate::DIR_WEST;
      break;
      case 'E': // +90d
        $newDirection = Coordinate::DIR_SOUTH;
      break;
      case 'W': // +90d
        $newDirection = Coordinate::DIR_NORTH;
      break;
    }

    return new Coordinate(
      $Coordinate->getPosX(),
      $Coordinate->getPosY(),
      $newDirection
    );
  }

}
