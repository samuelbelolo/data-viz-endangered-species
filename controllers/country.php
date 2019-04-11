<?php
    /**
    *   API 
    */

    // $countryNameURL = 'https://apiv3.iucnredlist.org/api/v3/country/list?token='.token;
    // $countryArray = ApiRequest($countryNameURL, 604800);

    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
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


    // include('./views/pages/region.php');