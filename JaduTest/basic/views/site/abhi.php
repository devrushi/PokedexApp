<?php
    

 function pokemonApi($string) {
    // create a new cURL resource
    $ch = curl_init();
    // set url 
    curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/");
    //returns the response as a string of the return value
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output json
    $output = curl_exec($ch);
    
    curl_close($ch);

    return $output;

    
}
  
?>