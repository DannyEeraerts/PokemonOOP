<?php

require_once('../src/model/classes/Allpokemons.php');


//$url = "https://pokeapi.co/api/v2/pokemon";
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
$pokemons_array = new AllPokemons();
$pokemons = $pokemons_array->getPokemons($offset, $limit);

?>
<!--<div class="row">
    <?php
/*
    foreach ($pokemons as $pokemon) {

        $pokemon_details = $pokemons_array->get_pokemon_details($pokemon->name);
        $pokemon_sprite = $pokemon_details->sprites->front_default;
        */?>
            <div class="col-6 col-md-4">
                <div class="card mb-4">
                    <img class ="mx-auto d-block" src="<?/*= $pokemon_sprite */?>" class="mb-2 px-2" width="125px" alt="pokemon">
                    <div class="card-body">
                        <h5 class ="card-text"> <?/*= ucfirst($pokemon->name);*/?>
                            <i class=" ml-2 fa fa-heart-o text-danger "></i>
                        </h5>
                        <a href="../templates/detail.php?<?php /*echo $pokemon->name;*/?>" class="btn btn-primary">More over <?/*= ucfirst($pokemon->name);*/?>?</a>
                    </div>
                </div>
            </div>
        <?php
/*    }*/?>

</div>-->
<?php


