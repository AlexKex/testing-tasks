<?php

namespace application;

class WordsCount
{
    private $wordsChart;
    private $reader;

    public function __construct($fileAddress)
    {
        $this->reader = new FileReader($fileAddress);
        $this->wordsChart = [];
    }

    public function countWords()
    {
        $iterator = $this->reader->readFile();

        foreach ($iterator as $item){
            // кладём слово в массив
            $count = 1;

            if(array_key_exists($item, $this->wordsChart)){
                $count = $this->wordsChart[$item] + 1;
            }

            $this->wordsChart[$item] = $count;
        }
    }

    public function getTopFive(){
        arsort($this->wordsChart);
        return array_slice($this->wordsChart, 0, 5);
    }
}