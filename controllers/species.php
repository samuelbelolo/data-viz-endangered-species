<?php
    // $_GET PROCESS

    $region = explode('/',$_GET['q'])[0];
    $speciesName = explode('/',$_GET['q'])[1];

    /**
     * API
     */

    $redlistUrl = 'https://apiv3.iucnredlist.org/api/v3/country/list?token=9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee';

    // echo $redlistUrl;
    $result = ApiRequest($redlistUrl, 604800);
    $array = array(
        'country' => array(),
        'count' => array()
    );
    foreach ($result->results as $key => $value) {
        $url = 'https://apiv3.iucnredlist.org/api/v3/country/getspecies/'.$value->isocode.'?token=9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee';
        $resultCount = ApiRequest($url, 604800);
        $array['country'][]=$value->country;
        $array['count'][]= $resultCount->count;


    }
    for ($i=0; $i <count($array['country']) ; $i++) { 
        echo $array['country'][$i]. " : ".$array['count'][$i].'</br>';
    }

    // echo '<pre>';
    // print_r($result->results);
    // echo '</pre>';