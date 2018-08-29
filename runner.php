<?php
require_once ('vendor/autoload.php');

try{
    $reader = new application\WordsCount($argv[1]);
    $reader->countWords();

    echo "Words chart \n";
    foreach ($reader->getTopFive() as $key => $item){
        echo "Word \"" . $key . "\" has " . $item . " entry(s) \n";
    }
}
catch (Exception $e){
    echo $e->getMessage() . "\n";
}

print "Memory usage " . memory_get_peak_usage() / 1024 / 1024 . " MB \n";
