<?php

declare(strict_types=1);

namespace App\Model\Classes;
require_once('../vendor/autoload.php');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;



abstract class Pokemons
{
    const BASE_URL = "https://pokeapi.co";

    protected $guzzle = null;

    public function __construct()
    {
        $this->guzzle = new Client([
            "base_uri" => static::BASE_URL,
        ]);
    }
}

class AllPokemons extends Pokemons{

    public function getAllPokemonsDividedInPages(int $offset, int $limit) : array
    {
        try {
            $response = $this->guzzle->get("/api/v2/pokemon?offset=" . $offset . "&limit=" . $limit);
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json->results;

        } catch (ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }

}

class AllTypes extends Pokemons{

    public function getAllPokemonsTypes() : array
    {
        try {
            $response = $this->guzzle->get("/api/v2/type");
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json->results;

        } catch (ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }

    public function getAllPokemonsOfSpecificTypes(string $name) : array
    {
        try {
            $response = $this->guzzle->get("/api/v2/type/" . $name);
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json->pokemon;

        } catch (ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }


}

class Details extends Pokemons{
    public function getPokemonDetails(string $name): object
    {
        try {
            $response = $this->guzzle->get( "/api/v2/pokemon/" .$name );
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json;

        } catch(ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }







}


/*$AllPokemons = new AllPokemons();
$PokemonPage = $AllPokemons->getAllPokemonsDividedInPages(0,20);
var_dump($PokemonPage);

var_dump($PokemonPage[0]->name);


$AllTypes = new AllTypes();
$Types =$AllTypes->getAllPokemonsTypes();
var_dump($Types);

$specificTypePokemons = new AllTypes();
$name = "fire";
$TypesPage = $specificTypePokemons->getAllPokemonsOfSpecificTypes($name, 0, 20);
var_dump($TypesPage);
$offset = 0;
$limit = 20;
while ($offset < $limit){
    var_dump($TypesPage[$offset]->pokemon->name);
    $offset++;
};
//var_dump($TypesPage);

$detail = $PokemonDetails->getPokemonDetails($name);
*/

/*$PokemonDetails = new Details();
$name = "spearow";
$detail = $PokemonDetails->getPokemonDetails($name);
var_dump($detail->id);
var_dump($detail->name);
var_dump($detail->height);
var_dump($detail->types);
var_dump($detail->abilities);
var_dump($detail->sprites->front_default);
var_dump($detail->sprites->back_default);*/

