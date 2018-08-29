<?php

namespace application;

class FileReader
{
    private $fileLocation;
    private static $delimiters = [
        " ", ",", ".", "\u0020", "\u000D", "\r", "\n", "\r\n"
    ];

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
            if(in_array($data, self::$delimiters)){
                // начинается новое слово
                yield trim($word);
                $word = '';
            }
            else{
                // накапливаем старое
                $word .= $data;
            }
        }

        if(strlen(trim($word)) > 0 && !in_array(trim($word), self::$delimiters))
            yield trim($word);

        fclose($handler);
    }
}