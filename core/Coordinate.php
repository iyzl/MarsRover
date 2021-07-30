<?php
declare(strict_types=1);

namespace core;

class Coordinate{
  const DIR_NORTH   = 'N';
  const DIR_SOUTH   = 'S';
  const DIR_WEST    = 'W';
  const DIR_EAST    = 'E';

  private $posX     = 0;
  private $posY     = 0;
  private $direction= 'N';

  private $acceptableDirection = [
      self::DIR_NORTH,self::DIR_SOUTH,self::DIR_WEST,self::DIR_EAST
  ];

  function __construct(int $x,int $y,string $direction){
    $this->setPosX($x);
    $this->setPosY($y);
    $this->setDirection($direction);
  }

  public function getPosX():int{
    return $this->posX;
  }

  private function setPosX(int $posX){
    $this->posX = $posX;
  }

  public function getPosY():int{
    return $this->posY;
  }

  private function setPosY(int $posY){
    $this->posY = $posY;
  }

  public function getDirection():string{
    return $this->direction;
  }

  private function setDirection(string $direction){
    if ( ! in_array($direction, $this->acceptableDirection) ){
      throw new \Exception(sprintf('The direction [%s] you provided is invalid',$direction));
    }
    $this->direction = $direction;
  }

  function __toString():string{
    return "{$this->getPosX()} {$this->getPosY()} {$this->getDirection()}";
  }

}
