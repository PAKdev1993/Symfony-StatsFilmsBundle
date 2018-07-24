<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

use Krstic\StatFilmsBundle\FileDatasGetter\FileInterface;
use Symfony\Component\HttpFoundation\FileBag;

/**
 * Classe destinée a s'occuper d'un CSV de type "films" avec ses règles propres de formatage
 *
 * @author PAK
 */
class CSVDattaGetter implements FileInterface{
    
    protected $uploadedFile;
    
    const ERROR_UPLOAD = 1;
    const ERROR_FILE_OPENING = 2;
        
    public function __construct(FileBag $csv){
        $this->uploadedFile = $csv->get('form')['attachment'];
    }
    
    /**
     * Recupère les données du CSV dans un tableau
     * 
     * @return array() : un tableau de tableau representant chaque colonne
     * @return int : code d'erreur
     */
    public function getFileDatas($removeFirstLine = false)
    {
        if($this->uploadedFile->isValid()) {
            $handle = $this->openFile();
            
            if($handle !== self::ERROR_FILE_OPENING) {
                
                return $this->getArrayData($handle);
            }
        }
        else{
            return self::ERROR_UPLOAD;
        }
    }
    
    /**
     * Ouvre le .csv
     * 
     * @return resource : handle de fichier csv
     */
    private function openFile()
    {
        $handle = fopen($this->uploadedFile->getPathname(), "r");
        if($handle !== FALSE){
            return $handle;
        }
        else{
            return self::ERROR_FILE_OPENING;
        }
    }
    
    /**
     * Creer le tableau de données
     * 
     * @param resource  $handle : resource vers le .csv
     * @return array    $arrayData : array(array()) tableau des lignes du .csv
     */
    private function getArrayData($handle)
    {
        $row = 5;
        $arrayData = array();
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            $rowData = array();
            for ($c=0; $c < $num; $c++) {
                 array_push($rowData, $data[$c]);
            }
            array_push($arrayData, $rowData);
        }
        
        fclose($handle);
        
        return $arrayData;
    }
    
}
