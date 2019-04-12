<?php
    /**
    *   GET ALL URL 
    */

    $countryNameURL = 'https://apiv3.iucnredlist.org/api/v3/country/list?token=' . token;
    $countryArray   = ApiRequest($countryNameURL, 604800);

    // for ($i=0; $i < 10 ; $i++) { 
    //     $countrySpeciesURL = 'https://apiv3.iucnredlist.org/api/v3/country/getspecies/'.$countryArray->results[$i]->isocode.'?token='.token;
    //     // echo $countrySpeciesURL;
    //     $countryArray = ApiRequest($countrySpeciesURL, 604800);

    //     echo '<pre>';
    //     print_r($countryArray->results[$i]->isocode);
    //     echo '</pre>';
    // }
    $i =0;
    foreach ($countryArray->results as $key => $value) {
        $countrySpeciesURL = 'https://apiv3.iucnredlist.org/api/v3/country/getspecies/'.$value->isocode.'?token='.token;
            $countryArray = ApiRequest($countrySpeciesURL, 604800);
            foreach ($countryArray->result as $key => $value) {
                $generalInfosURL = 'https://apiv3.iucnredlist.org/api/v3/species/'.$value->scientific_name.'?token='.token;

                $generalInfosArray = ApiRequest($generalInfosURL, 604800);
                $narrativeURL = 'https://apiv3.iucnredlist.org/api/v3/species/narrative/'.$value->scientific_name.'?token='.token;
                $narrativeArray = ApiRequest($narrativeURL, 604800);
                $threatsURL= 'https://apiv3.iucnredlist.org/api/v3/threats/species/name/'.$value->scientific_name.'?token='.token;
                $threatsArray = ApiRequest($threatsURL, 604800);
                $habitatsURL = 'https://apiv3.iucnredlist.org/api/v3/habitats/species/name/'.$value->scientific_name.'?token='.token;
                $habitatArray = ApiRequest($habitatsURL, 604800);
                echo '<pre>';
                print_r($generalInfosArray);
                echo '</pre>';
                // Measures

                $measuresURL = 'https://apiv3.iucnredlist.org/api/v3/measures/species/name/'.$value->scientific_name.'?token='.token;
                $measuresArray = ApiRequest($measuresURL, 604800);
                
                // Common Name

                $commonNamesURL = 'https://apiv3.iucnredlist.org/api/v3/species/common_names/'.$value->scientific_name.'?token='.token;
                $commonNamesArray = ApiRequest($commonNamesURL, 604800);
            }
        $i++;
        
    }
    die();
    /**
    *   API 
    */

    // SORT BY
    $sortBy = 'LC';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    // Change Sort if $_POST from the form on the page
    if (!empty($_POST['cat'])) {
        $sortBy = $_POST['cat'];
    }


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
    // echo '<pre>';
    // print_r($categoryCountArray);
    // echo '</pre>';

    // SORT BY VALUES

    

    $selectedSpeciesArray = selectRandomSpiecies($categoryCountArray['category'][$sortBy],6);

    /**
    *   Get Infos Of Species
    */
    foreach ($selectedSpeciesArray['newArray'] as $key => $value) {
        // Make URL
        $speciesInfosUrl='https://apiv3.iucnredlist.org/api/v3/species/'.$value['names'].'?token='.token;
        // Make Request
        $speciesInfosArray = ApiRequest($speciesInfosUrl, 604800);
        // Add Infos to general Array
        foreach ($speciesInfosArray->result[0] as $keySpecies => $value) {
            $selectedSpeciesArray['newArray'][$key][$keySpecies] = $value;
        }
    }


    /**
    *  Add Image URL
    */

    $selectedSpeciesArray['newArray'] = addUrlImage($selectedSpeciesArray['newArray']);

    // echo '<pre>';
    // print_r($selectedSpeciesArray);
    // echo '</pre>';
    // die();
    // $_POST['isNextSpecies'] = 'true';
    // $_POST['array'] = $selectedSpeciesArray;

    if (!empty($_POST['isNextSpecies']) && $_POST['isNextSpecies'] == 'true') {
        echo '<pre>';
        print_r($_POST['array']['oldArray']);
        echo '</pre>';
        $selectedSpeciesArray = selectRandomSpiecies($_POST['array']['oldArray'],6);
        

        /**
        *   Get Infos Of Species
        */
        foreach ($selectedSpeciesArray['newArray'] as $key => $value) {
            // Make URL
            $speciesInfosUrl='https://apiv3.iucnredlist.org/api/v3/species/'.$value['names'].'?token='.token;
            // Make Request
            $speciesInfosArray = ApiRequest($speciesInfosUrl, 604800);
            // Add Infos to general Array
            foreach ($speciesInfosArray->result[0] as $keySpecies => $value) {
                $selectedSpeciesArray['newArray'][$key][$keySpecies] = $value;
            }
        }


        /**
        *  Add Image URL
        */

        $selectedSpeciesArray['newArray'] = addUrlImage($selectedSpeciesArray['newArray']);
        // echo '<pre>';
        // print_r($selectedSpeciesArray['newArray']);
        // echo '</pre>';

        echo '<pre>';
        print_r(json_encode($selectedSpeciesArray));
        echo '</pre>';
    }

    
    // echo '<pre>';
    // print_r($selectedSpeciesArray['newArray']);
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
    // print_r($selectedSpeciesArray['newArray']);
    // echo '</pre>';


    include('./views/pages/country.php');