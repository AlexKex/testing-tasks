<?php
require_once ('vendor/autoload.php');

try{
    $reader = new application\FileReader($argv[1]);
    $iterator = $reader->readFile();

    foreach ($iterator as $item){
        echo $item . "\r\n";
    }
}
catch (Exception $e){
    echo $e->getMessage() . "\n";
}
