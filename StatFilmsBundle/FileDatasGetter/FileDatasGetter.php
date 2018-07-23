<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

class FileDatasGetter {
       
    public function getDatas(FileFormat $csv){
        return $csv->getDatas();       
    }
}
