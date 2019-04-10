<?php
    // $_GET PROCESS

    $region = explode('/',$_GET['q'])[0];
    $speciesName = explode('/',$_GET['q'])[1];

    /**
     * API
     */

    // General Infos

    $generalInfosURL = 'https://apiv3.iucnredlist.org/api/v3/species/'.$speciesName.'?token='.token;

    $generalInfosArray = ApiRequest($generalInfosURL, 604800);

    // Narrative

    $narrativeURL = 'https://apiv3.iucnredlist.org/api/v3/species/narrative/'.$speciesName.'?token='.token;
    $narrativeArray = ApiRequest($narrativeURL, 604800);

    // Threats

    $threatsURL= 'https://apiv3.iucnredlist.org/api/v3/threats/species/name/'.$speciesName.'?token='.token;
    $threatsArray = ApiRequest($threatsURL, 604800);

    // Habitats

    $habitatsURL = 'https://apiv3.iucnredlist.org/api/v3/habitats/species/name/'.$speciesName.'?token='.token;
    $habitatArray = ApiRequest($habitatsURL, 604800);
    
    // Measures

    $measuresURL = 'https://apiv3.iucnredlist.org/api/v3/measures/species/name/'.$speciesName.'?token='.token;
    $measuresArray = ApiRequest($measuresURL, 604800);
    
    // Common Name

    $commonNamesURL = 'https://apiv3.iucnredlist.org/api/v3/species/common_names/'.$speciesName.'?token='.token;
    $commonNamesArray = ApiRequest($commonNamesURL, 604800);
    
    $speciesInfosArray = array(
        'general' => $generalInfosArray->result,
        'narrative' => $narrativeArray->result,
        'threats' => $threatsArray->result,
        'habitats' => $habitatArray->result,
        'measures' => $measuresArray->result,
        'commonNames' => $commonNamesArray->result
    );
    
    echo '<pre>';
    print_r($speciesInfosArray);
    echo '</pre>';