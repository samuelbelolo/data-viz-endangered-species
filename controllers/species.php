<?php


    // $_GET PROCESS

    $region = explode('/',$_GET['q'])[0];
    $speciesName = str_replace("_", " ", explode('/',$_GET['q'])[1]);

    /**
     * API
     */

    // General Infos

    $generalInfosURL = 'https://apiv3.iucnredlist.org/api/v3/species/'.$speciesName.'?token='.token;

    $generalInfosArray = ApiRequest($generalInfosURL, 604800);

    if (empty($generalInfosArray->result)) {
        include('./controllers/404.php');
        die();
    }

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

    // Get URL of Image

    // Make the url
    $wikipediaUrl = 'https://en.wikipedia.org/w/api.php?action=query&titles='.$generalInfosArray->result[0]->genus.'&prop=pageimages&format=json&piprop=original';
    // Get the response
    $data = ApiRequest($wikipediaUrl, 604800);

    foreach ($data->query->pages as $resultKey => $resultValue) {
        // If img exist => add to array
        if (!empty($resultValue->original)) {
            $generalInfosArray->result[0]->url= $resultValue->original->source;
        }
        else{
            $generalInfosArray->result[0]->url= URL.'dist/img/defaultImg.png';
        }
    }

    
    $speciesInfosArray = array(
        'general' => $generalInfosArray->result,
        'narrative' => $narrativeArray->result,
        'threats' => $threatsArray->result,
        'habitats' => $habitatArray->result,
        'measures' => $measuresArray->result,
        'commonNames' => $commonNamesArray->result,
    );

    /**
    * VALUES
    */
    // Process 

    $category = $speciesInfosArray['general'][0]->category;
    $mainCommonName = $speciesInfosArray['general'][0]->main_common_name;
    $isMarineSystem = $speciesInfosArray['general'][0]->marine_system == '1'? true : false;
    $isFreshWaterSystem = $speciesInfosArray['general'][0]->freshwater_system == '1'? true : false;
    $isTerrestrialSystem = $speciesInfosArray['general'][0]->terrestrial_system == '1'? true : false;
    
    // Meta Title 
    $title = $region.' '.$speciesName;
    
    // Include
    include './views/pages/species.php';
