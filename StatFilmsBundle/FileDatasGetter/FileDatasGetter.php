<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

use Krstic\StatFilmsBundle\FileDatasGetter\CSVDattaGetter;

class FileDatasGetter {
       
    public function getDatas(FileInterface $csv){
        return $csv->getDatas();       
    }
    
    /*
     * Factory to get .CSV files DataGetter
     * 
     * @param $csv : $_FILE with .csv extension
     * 
     * @return CSVDattaGetter
     */
    public static function getAlgoCSVFile($csv){
        return new CSVDattaGetter($csv);
    }
}
