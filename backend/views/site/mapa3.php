<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use voime\GoogleMaps\Map;

echo Map::widget([
    'zoom' => 16,
    'apiKey'=>'AIzaSyAf8eCBwsOUhcCUM2vYJ80X4nc9agB09is',
    'center' => [20, 40.555],
    'width' => '700px',
    'height' => '400px',
    'mapType' => Map::MAP_TYPE_ROADMAP,
]);

?>