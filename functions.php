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

    function selectRandomSpiecies($array,$range){
        $newArray = array(
            
        );
        if ($array['count']<$range) {
            $range = $array['count'];
        }
        for ($i=0; $i < $range ; $i++) {
            // Generate Random key
            $key = rand(0,$array['count']-2);
            // Add random spieces to a new array
            $newArray[]['names']=$array['names'][$key];
            // Remove selected one from original array
            unset($array['names'][$key]);
            // Reindex of the old array
            $array['names'] = array_values($array['names']);
            // Decrease the count number of the original array
            $array['count']--;
        }
    $result = array(
        'newArray' => $newArray,
        'oldArray' => $array['names'],
        'newCount' => $array['count']
    );
    return $result;
    }

  function addUrlImage($array){
        foreach ($array as $key => $value) {

            // GET Img if existing for each spieces in array
            $wikipediaUrl = 'https://en.wikipedia.org/w/api.php?action=query&titles='.$value['genus'].'&prop=pageimages&format=json&piprop=original';

            // echo $wikipediaUrl;
            // echo "<br>";
            $data = ApiRequest($wikipediaUrl, 604800);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            
            // For every result 
            foreach ($data->query->pages as $resultKey => $resultValue) {
                // If img exist => add to array
                if (!empty($resultValue->original)) {
                    $array[$key]['url']= $resultValue->original->source;
                }
                else{
                    $array[$key]['url']= URL.'dist/img/defaultImg.jpg';
                }
            }
        }
        return $array;
    }