<?php


class Type
{
    private $type = [];

    public function __construct($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $pokemonTypes = json_decode($data);
        $this->type = $pokemonTypes->results;
    }

    public function getPokemonTypes(): array
    {
        return $this->type;
    }




}