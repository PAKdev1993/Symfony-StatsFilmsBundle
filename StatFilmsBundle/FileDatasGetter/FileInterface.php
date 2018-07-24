<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

/*
 * Strategy Interface
 */
interface FileInterface {
    
    /*
     * recupère les données du CSV dans un tableau
     * 
     * @return array() : un tableau de tableau representant chaque colonne
     * @return int : code d'erreur
     */
    public function getDatas();
}
