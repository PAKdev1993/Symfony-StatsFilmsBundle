<?php

namespace Krstic\StatFilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /*
     * Affiche la vue des statistiques
     */
    public function indexAction()
    {
        if($infosDispo){
            return $this->render('@KrsticStatFilms/Home/index.html.twig');
        }
        else{
            return $this->redirectToRoute('oc_platform_upload');
        }
        //sinon redirect vers updateCSV
    }
    
    /*
     * Affiche la vue d'upload de CSV
     */
    public function uploadCsvAction(){
        return $this->render('@KrsticStatFilms/Home/update.html.twig');
    }
}
