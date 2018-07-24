<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

use Krstic\StatFilmsBundle\CSVDatasGetter\CSVFileFilms;

class FileDatasGetter {
       
    public function getDatas(FileInterface $csv){
        return $csv->getDatas();       
    }
    
    public static function getAlgoCSVFile($csv){
        return new CSVFileFilms($csv);
    }
}
