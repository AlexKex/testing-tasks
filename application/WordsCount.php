<?php

namespace application;

class WordsCount
{
    private $wordsChart = [];
    private $reader;

    public function __construct($fileAddress)
    {
        $this->reader = new FileReader($fileAddress);
    }

    public function countWords() : array
    {
        $iterator = $this->reader->readFile();

        foreach ($iterator as $item){
            // кладём слово в массив 
        }
    }
}