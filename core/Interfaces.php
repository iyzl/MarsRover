<?php
declare(strict_types=1);

namespace core;

use \core\Coordinate;

interface Interfaces{

  public function isValidCommand($Command):bool;

  public function updateCoordinate(Coordinate $Coordinate):Coordinate;

}
