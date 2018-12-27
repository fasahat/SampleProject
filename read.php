<?php  

 //read the json file contents
    $jsondata = file_get_contents('points.geojson');

    //do not convert to array
    $json = json_decode($jsondata,true);
    // var_dump($json);

    foreach ($json['features'] as $key => $value) {
    	var_dump($value['geometry']['coordinates']);
    	echo('<br>');
    	echo('<br>');
    }
    // $id = $json->device->sn;

    // var_dump($id);
?>