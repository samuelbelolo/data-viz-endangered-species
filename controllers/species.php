<?php
    // $_GET PROCESS

    $region = explode('/',$_GET['q'])[0];
    $speciesName = explode('/',$_GET['q'])[1];

    /**
     * API
     */

    // General Infos

    $generalInfosURL = 'https://apiv3.iucnredlist.org/api/v3/species/'.$speciesName.'?token='.token;

    $speciesInfosArray = ApiRequest($generalInfosURL, 604800);

    // Narrative

    $narrativeURL = 'https://apiv3.iucnredlist.org/api/v3/species/narrative/'.$speciesName.'?token='.token;
    $narrativeArray = ApiRequest($narrativeURL, 604800);

    // Threats

    $threatsURL= 'https://apiv3.iucnredlist.org/api/v3/threats/species/name/'.$speciesName.'?token='.token;
    $threatsArray = ApiRequest($threatsURL, 604800);

    // Habitats

    $habitatsURL = 'https://apiv3.iucnredlist.org/api/v3/habitats/species/name/'.$speciesName.'?token='.token;
    $habitatArray = ApiRequest($habitatsURL, 604800);
    
    
    // $result = array_merge($speciesInfosArray->result,$test->result);
    echo '<pre>';
    print_r($habitatArray);
    echo '</pre>';