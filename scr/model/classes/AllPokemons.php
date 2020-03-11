<?php

declare(strict_types=1);

require_once('../vendor/autoload.php');

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;

class AllPokemons {

    const BASE_URL = "https://pokeapi.co";

    private $guzzle = null;

    public function __construct() {

        $this->guzzle = new Client([
            "base_uri" => static::BASE_URL . "/api/v2/pokemon" ,
        ]);
    }

    public function getPokemons(int $offset, int $limit) : array
    {

        try {

            $response = $this->guzzle->get( "?offset=" . $offset . "&limit=" . $limit);
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json->results;

        } catch(ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
       }
    }

    public function get_pokemon_details($id): object
    {
        try {

            $response = $this->guzzle->get( "/api/v2/pokemon/" .$id );
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json;

        } catch(ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }

    /*public function getTypes()
    {
        try {
            $response = $this->guzzle->get("/api/v2/type/"."1");
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json;

        } catch (ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }*/

}


