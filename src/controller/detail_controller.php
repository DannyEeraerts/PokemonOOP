<?php

require_once('../src/model/classes/detail.php');


$url = "https://pokeapi.co/api/v2/pokemon/";

$name =$_SERVER['QUERY_STRING'];
$pokemonDetail = new Detail($url,$name);
$id = $pokemonDetail->getPokemonId();
$name = $pokemonDetail->getPokemonName();
$height = $pokemonDetail->getPokemonHeight();
$weight = $pokemonDetail->getPokemonWeight();
$types =  (array)$pokemonDetail->getPokemonType();
$abilities = (array)$pokemonDetail->getPokemonAbilities();
$imageFront= $pokemonDetail->getPokemonImageFront();
$imageBack = $pokemonDetail->getPokemonImageBack();
$tempArray = [];
$tempArray2 = [];
?>
<!--<h2 class="my-5 border pt-2 pb-3" ><?/*=ucfirst($name)*/?></h2>
<div class="row">
    <div class="col-6 pt-5">
        <img  src="<?php /*echo $imageFront */?>" class="mb-2 px-2" width="175px" alt="pokemon">
        <img  src="<?php /*echo $imageBack */?>" class="mb-2 px-2" width="175px" alt="pokemon">
    </div>
    <div class="col-6 py-md-5 border">
        <p ><span class="black">id: </span><?/*=$id*/?> </p>
        <p> <span class="black">height:</span> <?/*=$height." "*/?>m</p>
        <p> <span class="black">weight:</span> <?/*=$weight." "*/?>kg</p>
        <?php /*foreach ($types as $type) {
                array_push($tempArray,$type->type->name);
        }*/?>
        <p> <span class="black">type(s):</span> <?php /*echo implode(", ", $tempArray);*/?></p>
        <?php /*foreach ($abilities as $ability) {
            array_push($tempArray2,$ability->ability->name);
        }*/?>
        <p> <span class="black">abilities:</span> <?php /*echo implode(", ", $tempArray2);*/?></p>
    </div>
--></div>





