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
    
    private $uploadedFile;
    
    const ERROR = 1;
    
    private $errorMessage;
        
    public function __construct(FileBag $csv){
        $this->uploadedFile = $csv->get('form')['attachment'];
    }
    
    public function getErrorMessage(){
        return $this->errorMessage;
    }
    
    public function getFileDatas($removeFirstLine = false)
    {
        if(($handle = $this->isValid()) !== FALSE) {
            return $this->getArrayData($handle);
        }
        else {
            return self::ERROR;
        }
    }
    
    private function isValid(){
        if(!$this->uploadedFile->isValid()){
            $this->errorMessage = $this->uploadedFile->getErrorMessage();
            return false;
        }
        
        if($this->uploadedFile->getClientOriginalExtension() !== 'csv'){
            $this->errorMessage = "Le fichier doit etre au formt csv";
            return false;
        }
        
        if($this->uploadedFile->getMimeType() !== "text/plain"){
            $this->errorMessage = "Le fichier doit posseder un contenu text";
            return false;
        }
        
        if(($handle = $this->openFile()) === FALSE){
            $this->errorMessage = "Problème lor de l'ouverture du fichier, reesayez";
            return false;
        }
        
        return $handle;
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
            return false;
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
        $row = 1;
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
