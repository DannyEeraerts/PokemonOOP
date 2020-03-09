<?php


class Detail
{
    private $details;

    public function __construct($url,$name)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.$name);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $pokemonDetails = json_decode($data);
        $this->details = $pokemonDetails;
    }

    public function getPokemonId() : int
    {
        return $this->details->id;
    }

    public function getPokemonName() : string
    {
        return $this->details->name;
    }

    public function getPokemonWeight() :float
    {
        return $this->details->weight/10;
    }

    public function getPokemonHeight() : float
    {
        return $this->details->height/10;
    }
    public function getPokemonImageFront()
    {
        return $this->details->sprites->front_default;
    }
    public function getPokemonImageBack()
    {
        return $this->details->sprites->back_default;
    }
    public function getPokemonType()
    {
        return $this->details->types;
    }
    public function getPokemonAbilities()
    {
        return $this->details->abilities;
    }

}