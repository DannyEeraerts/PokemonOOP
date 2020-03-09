<?php

require_once('../scr/model/classes/type.php');

$url = "https://pokeapi.co/api/v2/type/";
$pokemon_types = new Type($url);
$types = $pokemon_types->getPokemonTypes();

    foreach ($types as $type) { ?>
        <option value=<?php echo $type->name; ?>><?php echo $type->name; ?></option>
    <?php }
