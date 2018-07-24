<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

use Krstic\StatFilmsBundle\FileDatasGetter\FileInterface;

/*
 * Classe destinée a s'occuper d'un CSV de type "films" avec ses règles propres de formatage
 *
 * @author PAK
 */
class CSVDattaGetter implements FileInterface{
    
    protected $csv;
    
    const ERROR_FILE_OPENING = 1;
    
    public function __construct($csv){
        $this->csv = $csv;
    }
    
    /*
     * recupère les données du CSV dans un tableau
     * 
     * @return array() : un tableau de tableau representant chaque colonne
     * @return int : code d'erreur
     */
    public function getDatas(){
        $row = 1;
        if (($handle = fopen($this->file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num champs à la ligne $row: <br /></p>\n";
                $row++;
                for ($c=0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($handle);
        }
        else{
            return self::ERROR_FILE_OPENING;
        }
    }
}
