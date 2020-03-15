<?php

use App\Model\Classes\AllTypes;

require "../vendor/autoload.php";
//require_once('../src/Model/Classes/Pokemons.php');

$AllTypes = new AllTypes();
$types =$AllTypes->getAllPokemonsTypes();
$count = count($types);

