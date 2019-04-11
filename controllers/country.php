<?php
    /**
    *   API 
    */

    $countrySpeciesURL = 'https://apiv3.iucnredlist.org/api/v3/country/getspecies/'.$_GET['country'].'?token='.token;
    $countryArray = ApiRequest($countrySpeciesURL, 604800);

    /**
    *   VALUES 
    */
    $countSpecies = $countryArray->count;
    $categoryCountArray = array(
        'count' => array(
            'DD' => 0,
            'LC' => 0,
            'NT' => 0,
            'VU' => 0,
            'EN' => 0,
            'CR' => 0,
            'EW' => 0,
            'EX' => 0,
            'LR/lc' => 0,
            'LR/nt' => 0,
            'LR/cd' => 0
        ),
        'ratio' => array()
    );

    foreach ($countryArray->result as $key => $value) {
        $categoryCountArray['count'][$value->category]++;
    }

    foreach ($categoryCountArray['count'] as $key => $value) {
        $categoryCountArray['ratio'][$key] = $value/$countSpecies;
    }
    // echo '<pre>';
    // print_r($categoryCountArray);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($countryArray);
    // echo '</pre>';
    
    
    // foreach ($variable as $key => $value) {
    //     # code...
    // }

    // $redlistUrl = 'http://apiv3.iucnredlist.org/api/v3/species/region/'.$_GET['q'].'/page/0?token='.token;

    // $result = ApiRequest($redlistUrl, 604800);

    // // Parameter of the response

    // $count = (int) $result->count;

    // $resultArray = selectRandomSpiecies($result->result,$count,10);

    // // Get Img URL FROM WIKIPEDIA API
    // $resultArray['newArray'] = addUrlImage($resultArray['newArray']);


    // echo '<pre>';
    // print_r($resultArray['newArray']);
    // echo '</pre>';


    include('./views/pages/country.php');