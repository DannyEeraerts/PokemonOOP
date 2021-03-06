<?php

//namespace App\Controller;

use App\Model\Classes\AllPokemons;
use App\Model\Classes\AllTypes;

require "../vendor/autoload.php";

if (isset($_SESSION['currentPage'])){
    if ($_SESSION['currentPage']===1 && !isset($_SESSION['limit'])){
        $limit = 18;
        $offset = 0;
    }
    else {
        if (isset($_SESSION['limit'])){
            $limit = $_SESSION['limit'];
            $offset = ($_SESSION['currentPage'] - 1) * $limit;
        }
        else {
            $limit = 18;
            $offset = ($_SESSION['currentPage'] - 1) * 18;
        }
    }
}
else {
    $offset = 0;
    $limit = 18 ;
}

if (isset($_POST['limit'])){
    $limit = ($_POST['limit']);
    $_SESSION['limit']= $limit;
}

if (isset($_POST['type'])){
    $_SESSION['type']= $_POST['type'];
}

if ((!isset($_SESSION['type'])) || ($_SESSION['type']==='all')){
    $pokemons_array = new AllPokemons();
    $pokemons = $pokemons_array->getAllPokemonsDividedInPages($offset, $limit);
}
else {
    if (!isset($_SESSION['type'])){
        $_SESSION['type']= $_POST['type'];}
    $pokemonsTypeArray = new AllTypes();
    $pokemonsOfSpecificTypeArray = $pokemonsTypeArray->getAllPokemonsOfSpecificTypes($_SESSION['type']);
    $limit = intval($_SESSION['limit']);
    $limit *= $_SESSION['currentPage'];
    $pokemons = [];
    while ($offset < $limit){
        array_push($pokemons, $pokemonsOfSpecificTypeArray[$offset]->pokemon);
        $offset++;
    };
}




