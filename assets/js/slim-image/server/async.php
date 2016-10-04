<?php

// Uncomment if you want to allow posts from other domains
// header('Access-Control-Allow-Origin: *');

require_once('slim.php');

// get posted data, if something is wrong, exit
try {
    $images = Slim::getImages();
}
catch (Exception $e) {
    Slim::outputJSON(SlimStatus::Failure);
    return;
}

// if no images found
if (count($images)===0) {
    Slim::outputJSON(SlimStatus::Failure);
    return;
}

// should always be one file (when posting async)
$image = $images[0];
$file = Slim::saveFile($image['output']['data'], $image['input']['name']);

// echo results
Slim::outputJSON(SlimStatus::Success, $file['name'], $file['path']);