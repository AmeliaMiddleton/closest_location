<?php 
include 'distance.php';

$lat = $_REQUEST['lat'];
$long = $_REQUEST['long'];

$handle = fopen('pharmacies.csv',"r");
$pharmanies = array();
$firstrow = true;
$closest = null; // Holds the closest location since loop started.

while(($data = fgetcsv($handle, 1000, ",")) !== false)
{
    if($firstrow == false){
        $pharmany = array();
        $pharmany["name"] = $data[0];
        $pharmany["address"] = $data[1];
        $pharmany["city"] = $data[2];
        $pharmany["state"] = $data[3];
        $pharmany["zipcode"] = $data[4];
        $pharmany["lat"] = $data[5];
        $pharmany["long"] = $data[6];
        $pharmany['distance'] = distance($lat, $long, $pharmany["lat"], $pharmany["long"], "M");

        // If $closest has not been assigned then make $closest = $pharmany
        // if $closest is assigned then check if $closest distanct is greater than $pharmany distance then make $closest = $pharmany.
        if(is_null($closest) | $closest['distance'] > $pharmany['distance']) 
        { 
            $closest = $pharmany;
        }
    }
    else $firstrow = false;
}

fclose($handle);



echo json_encode($closest);
?>
