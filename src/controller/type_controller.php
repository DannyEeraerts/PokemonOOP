<?php

//require_once('../src/model/classes/type.php');
require_once('../src/model/classes/Types.php');
//$url = "https://pokeapi.co/api/v2/type/";
//$pokemon_types = new Type($url);
//$types = $pokemon_types->getPokemonTypes();

$pokemon_types = new Types();
$types = $pokemon_types->getTypes();

$count = count($types);

/*foreach ($types as $type) {
    if (--$count <= 1) {
        break;
    }
    */?><!--
    <option value=<?php /*echo $type->name; */?>><?php /*echo $type->name; */?></option>
--><?php
/*}*/
