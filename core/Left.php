<?php
declare(strict_types=1);

namespace core;

use \core\Coordinate;

class Left implements Interfaces{

  public function isValidCommand($Command):bool{
    return ($Command === 'L');
  }

  public function updateCoordinate(Coordinate $Coordinate):Coordinate{
    $newDirection = $Coordinate->getDirection();

    switch($Coordinate->getDirection()){
      case 'N': // -90d
        $newDirection = Coordinate::DIR_WEST;
      break;
      case 'S': // -90d
        $newDirection = Coordinate::DIR_EAST;
      break;
      case 'E': // -90d
        $newDirection = Coordinate::DIR_NORTH;
      break;
      case 'W': // -90d
        $newDirection = Coordinate::DIR_SOUTH;
      break;
    }

    return new Coordinate(
      $Coordinate->getPosX(),
      $Coordinate->getPosY(),
      $newDirection
    );
  }

}
