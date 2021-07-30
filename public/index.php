<?php

require_once __DIR__.'/../vendor/autoload.php';

use \core\Coordinate;
use \core\Robot;
use \core\Move;
use \core\Left;
use \core\Right;

$input = [
  'position' => '0 0 N',
  'commands' => 'LMLMLMLMM'
];

list($x,$y,$d)= explode(' ',$input['position']);
$Inst         = str_split($input['commands']);

$Coordinate   = new Coordinate($x,$y,$d);
$Calc         = new Robot($Inst,$Coordinate);
unset($Inst,$Coordinate);

$Calc->addCommand(new Move())
->addCommand(new Left())
->addCommand(new Right())
->exec();

//echo $Calc->getCoordinate();

list($x,$y,$d) = explode(' ',$Calc->getCoordinate());
echo json_encode([
  'X' => $x,
  'Y' => $y,
  'D' => $d
]);
