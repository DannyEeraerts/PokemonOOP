<?php

use App\Model\Classes\Details;

require "../vendor/autoload.php";

//require_once('../src/Model/Classes/Pokemons.php');


//$url = "https://pokeapi.co/api/v2/pokemon/";

$name =$_SERVER['QUERY_STRING'];
$pokemonDetail = new Details();
$detail = $pokemonDetail->getPokemonDetails($name);
$id = $detail->id;
$name = $detail->name;
$height = $detail->height/10;
$weight = $detail->weight/10;
$types =  (array)$detail->types;
$abilities = (array)$detail->abilities;
$imageFront = $detail->sprites->front_default;
$imageBack = $detail->sprites->back_default;
$tempArray = [];
$tempArray2 = [];







