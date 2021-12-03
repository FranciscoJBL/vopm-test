<?php
require 'vendor/autoload.php';

$testOne = new AndainTest\TestOne();
print_r($testOne->main());

// Test two its just html

$testThree = new AndainTest\TestThree();
print_r($testThree->main());

$testFour = new AndainTest\TestFour();
print_r($testFour->main());
