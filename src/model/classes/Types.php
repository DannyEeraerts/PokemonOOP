<?php

declare(strict_types=1);

require_once('../vendor/autoload.php');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Types
{
    const BASE_URL = "https://pokeapi.co";

    private $guzzle = null;

    public function __construct()
    {
        $this->guzzle = new Client([
            "base_uri" => static::BASE_URL,
        ]);
    }

    public function getTypes(): array
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

    public function getAllPokemonsOfSpecificTypes($name):array
    {
        try {
            $response = $this->guzzle->get("/api/v2/type/".$name);
            $body = (string)$response->getBody();
            $json = json_decode($body);
            return $json->pokemon;

        } catch (ClientException $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }

}


//$name = "fire";
//$AllTypes = new Types();
//var_dump($types = $AllTypes->getAllPokemonsOfSpecificTypes($name));


