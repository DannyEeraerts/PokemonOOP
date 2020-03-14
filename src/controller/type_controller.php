<?php

//require_once('../src/model/classes/type.php');
require_once('../src/model/classes/Pokemons.php');
//$url = "https://pokeapi.co/api/v2/type/";
//$pokemon_types = new Type($url);
//$types = $pokemon_types->getPokemonTypes();




$AllTypes = new AllTypes();
$types =$AllTypes->getAllPokemonsTypes();
$count = count($types);

