<?php

require "vendor/autoload.php";

use Samee\TraitsInterfaceAbstract\Play;
use Samee\TraitsInterfaceAbstract\Concert;

$play = new Play();

print_r($play->getMenu());

$concert = new Concert();

print_r($concert->getMenu());

$concert->chargeCard();