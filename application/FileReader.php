<?php

namespace application;

class FileReader
{
    private $fileLocation;

    public function __construct(string $fileAddress)
    {
        if(file_exists($fileAddress))
            $this->fileLocation = $fileAddress;
        else
            throw new \Exception("Specified file doesn't exist");
    }

    public function readFile(){
        $handler = fopen($this->fileLocation, "r");

        $word = '';
        while($data = fread($handler, 1)){
            if(preg_match("/\W/", $data)){
                if(strlen(trim($word)) > 0 && !preg_match("/\W/", trim($word)))
                    yield trim($word);

                $word = '';
            }
            else{
                $word .= $data;
            }
        }

        if(strlen(trim($word)) > 0 && !preg_match("/\W/", trim($word)))
            yield trim($word);

        fclose($handler);
    }
}