<?php
  // FUNCTIONS
  function ApiRequest($url, $delay){

    // Cache info
    $cacheKey = md5($url);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // If cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < $delay){
      $result = file_get_contents($cachePath);
      $cacheUsed = true;
    }
    else{
      // API REQUEST
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      $result = curl_exec($curl);
      curl_close($curl);

      // Save API in cache
      file_put_contents($cachePath, $result);
    }

    $result= json_decode($result);

    return $result;
  }

  function selectRandomSpiecies($array,$count,$range){
    $newArray = array();
    for ($i=0; $i < $range ; $i++) {
      // Generate Random key
      $key = rand(0,$count);
      // Add random spieces to a new array
      $newArray[]=$array[$key];
      // Remove selected one from original array
      unset($array[$key]);
      // Reindex of the old array
      $array = array_values($array);
      // Decrease the count number of the original array
      $count -= 1;
    }
    
    $result = array(
      'newArray' => $newArray,
      'oldArray' => $array,
      'newCount' => $count
    );
    return $result;
  }

  function addUrlImage($array){
    foreach ($array as $key => $value) {
      // GET Img if existing for each spieces in array
      $wikipediaUrl = 'https://en.wikipedia.org/w/api.php?action=query&titles='.$value->genus_name.'&prop=pageimages&format=json&piprop=original';
      $result = ApiRequest($wikipediaUrl, 604800);
    
      // For every result 
      foreach ($result->query->pages as $resultKey => $resultValue) {
        // If img exist => add to array
        if (!empty($resultValue->original)) {
          $value->url= $resultValue->original->source;
        }
      }
    }
    return $array;
  }

  // API URL BY REGION
  $redlistUrl = 'http://apiv3.iucnredlist.org/api/v3/species/region/'.$_GET['q'].'/page/0?token='.token;

  $result = ApiRequest($redlistUrl, 604800);

  // Parameter of the response

  $count = (int) $result->count;

  $resultArray = selectRandomSpiecies($result->result,$count,10);

  // Get Img URL FROM WIKIPEDIA API
  $resultArray['newArray'] = addUrlImage($resultArray['newArray']);


  echo '<pre>';
  print_r($resultArray['newArray']);
  echo '</pre>';


  // include('./views/pages/region.php');