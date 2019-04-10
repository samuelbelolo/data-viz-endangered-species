<?php
    // $_GET PROCESS

    $region = explode('/',$_GET['q'])[0];
    $speciesName = explode('/',$_GET['q'])[1];

    /**
     * API
     */

    $generalInfosURL = 'https://apiv3.iucnredlist.org/api/v3/species/'.$speciesName.'?token='.token;

    $speciesInfosArray = ApiRequest($generalInfosURL, 604800);
    echo '<pre>';
    print_r($speciesInfosArray);
    echo '</pre>';