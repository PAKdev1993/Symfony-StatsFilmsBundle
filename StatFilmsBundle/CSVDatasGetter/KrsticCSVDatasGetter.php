<?php

namespace Krstic\StatFilmsBundle\CSVDatasGetter;

class KrsticCSVDatasGetter {
       
    public function getCSVDatas(CSVFormater $csv){
        return $csv->getDatas();       
    }
}
