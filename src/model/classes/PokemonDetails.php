<?php

declare(strict_types=1);

require_once('../../../vendor/autoload.php');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class PokemonDetails
{
    const BASE_URL = "https://pokeapi.co";

    private $guzzle = null;

    public function __construct()
    {
        $this->guzzle = new Client([
            "base_uri" => static::BASE_URL . "/api/v2/",
        ]);
    }

    public function getPokemonDetails(string $name): object
    {
        try {
            $response = $this->guzzle->get("pokemon/" . $name);
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json;

        } catch (ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }

}

$name= "bulbasaur";
$AllPokemonDetails = new PokemonDetails();
($AllPokemonDetails->getPokemonDetails($name));

$pokemon_details = $pokemons_array->get_pokemon_details($pokemon->name);
$pokemon_sprite = $pokemon_details->sprites->front_default;