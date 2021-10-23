<?php

require_once('google-search-results-php-master/google-search-results.php');
require_once('google-search-results-php-master/restclient.php');

class Search{
    public function getResearchMaterials($q){

        $api_key="8924776e0f8e548640726cb15d431e1dc967cbfb6cacff48ee2a01c26013ed15";

        $query = [
        "engine" => "google_scholar",
        "q" => "".$q."",
        "api_key" => $api_key
        ];

        $search = new GoogleSearch($api_key);
        $results = $search->get_json($query);
        return $results->organic_results;
    }
}