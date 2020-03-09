<?php

declare(strict_types=1);

/*$data = array('id'=>$_GET['eid']);
$header = array('USERTOKEN:' . GenerateToken());
$result = CallAPI('GET', "GetCategoryById", $data, $header);

function CallAPI($method, $api, $data, $headers) {
    $url = SITEURL . "/" . $api;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    switch ($method) {
        case "GET":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "POST":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
    }
    $response = curl_exec($curl);
    $data = json_decode($response);


    //$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // Check the HTTP Status code
    switch ($httpCode) {
        case 200:
            $error_status = "200: Success";
            return ($data);
            break;
        case 404:
            $error_status = "404: API Not found";
            break;
        case 500:
            $error_status = "500: servers replied with an error.";
            break;
        case 502:
            $error_status = "502: servers may be down or being upgraded. Hopefully they'll be OK soon!";
            break;
        case 503:
            $error_status = "503: service unavailable. Hopefully they'll be OK soon!";
            break;
        default:
            $error_status = "Undocumented error: " . $httpCode . " : " . curl_error($curl);
            break;
    }
    curl_close($curl);
    echo $error_status;
    die;
}*/





class Pokemon
{
    // basic logic: set pokemon array with some methods, then use other method to show it.
    // to do: maybe create class or so to clean up stuff so that the "pokemons" array set by type or by default(pages) is the same in form? BEWARE: some of these calls return different data, but name is always one of them
    // to do: there's also a details method which operates on another level, more specific that may not to move elsewhere
    private $pokemons = [];
    //private $pokemons_offset = 0;


//        there are 10157 pokemon in the database  "https://pokeapi.co/api/v2/pokemon?offset=0&limit=10157");
//        without limit the assignment wants to display 20 at a time
//        limit is standard 2O, offset = next page of 20

    public function __construct($url,$offset,$limit)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."?offset=".$offset."&limit=".$limit);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $pokemons = json_decode($data);
        $this->pokemons = $pokemons->results;
        //$this->pokemons_offset = 1;
        //var_dump($url."?offset=".$offset."&limit=".$limit);

    }

    public function getPokemons(): array
    {
        return $this->pokemons;
    }




    // notes: chose to only allow string, while integer works too.
    // note: can return more than 20 pokemon -
    // notes: chose to only allow string, while integer works too.

    function find_pokemons_by_type(string $type, int $pagenumber, int $pokemon_per_page)
    {
        // decided not to refactor this in separate connection function as the result is qualitatively different: list of categories versus list of pokemon that match catergory
        $all_type_data_json = file_get_contents("https://pokeapi.co/api/v2/type/$type");
        $all_type_data = json_decode($all_type_data_json);
        // needed to reformat this in order to have a uniform pokemons array in this class in order to have re-usable code
        $pokemons = [];
        $pokemons_raw = $all_type_data->pokemon;
        foreach ($pokemons_raw as $pokemon_raw) {
            $pokemon = $pokemon_raw->pokemon;
            array_push($pokemons, $pokemon);
        }
        // need to calculatee the following as it is notreadily available in
        $pokemons2 = $this->pokemon_type_results_to_default_results_logic($pokemons, $pagenumber, $pokemon_per_page);
        $this->pokemons = $pokemons2;
    }

    // id can be both integer or name of pokemon
    public function get_pokemon_details($id)
    {
        $pokemon_json = file_get_contents("https://pokeapi.co/api/v2/pokemon/$id");
        $pokemon = json_decode($pokemon_json);
        return $pokemon;
    }
}