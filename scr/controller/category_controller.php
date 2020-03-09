<?php

require_once('../scr/model/classes/pokemon.php');


$url = "https://pokeapi.co/api/v2/pokemon";
if (isset($_SESSION['currentPage'])){
    $page = $_SESSION['currentPage'];
    $limit = 18;
    $offset = $page * 18;
}
else {
    $offset = 0;
    $limit = 18 ;
}
if (isset($_POST['limit'])){
    $limit = ($_POST['limit']);
}

$pokemons_array = new Pokemon($url,$offset,$limit);
$pokemons = $pokemons_array->getPokemons();

?>
<div class="row">
    <?php

    foreach ($pokemons as $pokemon) {

        $pokemon_details = $pokemons_array->get_pokemon_details($pokemon->name);
        $pokemon_sprite = $pokemon_details->sprites->front_default;
        if (isset($_COOKIE['favorites'])) {
            $favorites = $_COOKIE['favorites'];
        }
        ?>

            <div class="col-6 col-md-4">
                <div class="card mb-4">
                    <img class ="mx-auto d-block" src="<?= $pokemon_sprite ?>" class="mb-2 px-2" width="125px" alt="pokemon">
                    <div class="card-body">
                        <h5 class ="card-text"> <?= ucfirst($pokemon->name);?>
                            <?php
/*                                setcookie("favorites", "", time()-3600);
                            */?>
                                <i class=" ml-2 fa fa-heart-o text-danger "></i>
                        </h5>
                        <a href="../templates/detail.php?<?php echo $pokemon->name;?>" class="btn btn-primary">More over <?= ucfirst($pokemon->name);?>?</a>
                        <?php /*foreach($favoritesArray as $Array){
                            echo $Array;
                        }*/?>
                    </div>
                </div>
            </div>
        <?php

    }?>
</div>
<?php


// HOW TO GET DETAILS OF SPECIFIC POKEMON; ACCEPTS NAME AND ID NUMBER
// $bulbasaur = $pokemons_db->get_pokemon_details("1");
//var_dump_pretty($bulbasaur);

// CHANGE PAGENUMBER TO SET NEXT 20 POKEMON IN CLASS, WHICH YOU THEN GET GET WITH OTHER METHOD
// $pokemons2 = $pokemons_db->change_default_pokemons_results_page(2);
// $pokemons2 = $pokemons_db->show_pokemons();
// var_dump_pretty($pokemons2);
// edit: how to link with pagination? maybe use GET-parameters?
// var_dump_pretty($_GET);
// var_dump($_GET);
// var_dump($_SERVER);
//var_dump($_SERVER["QUERY_STRING"]);


// GET POKEMONS BY TYPE
// $fire_pokemons = $pokemons_db->find_pokemons_by_type("fire");
// $fire_pokemons = $pokemons_db->show_pokemons();
// var_dump_pretty($fire_pokemons);

/*if (isset($_POST["type"])) {
    $type = $_POST["type"];
    $pokemons = $pokemons_array->find_pokemons_by_type($type);
    $pokemons = $pokemons_array->show_pokemons();
    // WARNING: this code does work, but is different from other. need to clean up so that the structure of data that $pokemons is reusable
    foreach ($pokemons as $pokemon) {
        $pokemon_details =  $pokemons_array->get_pokemon_details($pokemon->pokemon->name);
        //     $pokemon_details =  $pokemons_db->get_pokemon_details($pokemon->name);
        $pokemon_sprite = $pokemon_details->sprites->front_default;*/?><!--
        <img src="<?php /*echo $pokemon_sprite; */?>>" class="mb-2 px-2" width="125px" alt="card">
        <?php
/*    //      echo "<img src=" . $pokemon_sprite . ">";*/?>
        <p> <?php /*echo $pokemon->pokemon->name;*/?></p>
        --><?php
/*    }
}*/?>
