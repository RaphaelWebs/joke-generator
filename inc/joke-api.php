<?php

function get_joke()
{
    $jokes_api_url = 'https://v2.jokeapi.dev/joke/Any?blacklistFlags=nsfw,religious,political,racist,sexist,explicit&type=single';


    // Reads the JSON file.
    $json_data = file_get_contents($jokes_api_url);


    // Decodes the JSON data into a PHP array.
    $response_data = json_decode($json_data);

    // Gets the joke from the array
    $joke = $response_data->joke;

    //returns the bad joke
    return  $joke;
};

// print the joke
echo get_joke();
