<?php
    // $_GET PROCESS

    $region = explode('/',$_GET['q'])[0];
    $speciesName = explode('/',$_GET['q'])[1];

    /**
     * API
     */

    $redlistUrl = 'https://apiv3.iucnredlist.org/api/v3/species/narrative/'.$speciesName.'/region/'.$region.'?token='.token;

    echo $redlistUrl;