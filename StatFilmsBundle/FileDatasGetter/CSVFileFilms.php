<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

use Krstic\StatFilmsBundle\FileDatasGetter\FileInterface;

/*
 * Classe destinée a s'occuper d'un CSV de type "films" avec ses règles propres de formatage
 *
 * @author PAK
 */
class CSVFileFilms implements FileInterface{
    
    protected $csv;
    
    public function __construct($csv){
        $this->csv = $csv;
    }
    
    /*
     * recupère les données du CSV dans un tableau
     * 
     * @return array() : un tableau de tableau representant chaque colonne
     */
    public function getDatas(){
        //save csv in DB
        //return infos
    }
}
