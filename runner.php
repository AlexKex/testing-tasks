<?php
require_once ('vendor/autoload.php');

try{
    $reader = new application\WordsCount($argv[1]);
    $reader->countWords();
    var_dump($reader->getTopFive());
}
catch (Exception $e){
    echo $e->getMessage() . "\n";
}
