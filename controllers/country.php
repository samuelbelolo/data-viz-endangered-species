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
        'category' => array(
            'DD' => array(
                'count' => 0,
                'names' => array()
            ),
            'LC' => array(
                'count' => 0,
                'names' => array()
            ),
            'NT' => array(
                'count' => 0,
                'names' => array()
            ),
            'VU' => array(
                'count' => 0,
                'names' => array()
            ),
            'EN' => array(
                'count' => 0,
                'names' => array()
            ),
            'CR' => array(
                'count' => 0,
                'names' => array()
            ),
            'EW' => array(
                'count' => 0,
                'names' => array()
            ),
            'EX' => array(
                'count' => 0,
                'names' => array()
            ),
            'LR/lc' => array(
                'count' => 0,
                'names' => array()
            ),
            'LR/nt' => array(
                'count' => 0,
                'names' => array()
            ),
            'LR/cd' => array(
                'count' => 0,
                'names' => array()
            )
        ),
        'ratio' => array()
    );

    foreach ($countryArray->result as $key => $value) {
        $categoryCountArray['category'][$value->category]['count']++;
        $categoryCountArray['category'][$value->category]['names'][]=$value->scientific_name;
    }

    foreach ($categoryCountArray['category'] as $key => $value) {
        $categoryCountArray['ratio'][$key] = $value['count']/$countSpecies;
    }
    echo '<pre>';
    print_r($categoryCountArray);
    echo '</pre>';

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




    include('./views/pages/country.php');