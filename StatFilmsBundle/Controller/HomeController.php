<?php

namespace Krstic\StatFilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    const NBREAL_TO_DISLAY = 10;
    const NBPAYS_TO_DISLAY = 5;
    
    /*
     * Affiche la vue des statistiques
     */
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('KrsticStatFilmsBundle:Films');

        $bestsReals = $repository->getBestReal(self::NBREAL_TO_DISLAY);                  
                
        $bestsPays = $repository->getBestPays(self::NBPAYS_TO_DISLAY);                  
                                  
        if(true){
            return $this->render('@KrsticStatFilms/Home/index.html.twig', array(
                "arrBestReals" => $bestsReals,
                "arrBestPays" => $bestsPays
            ));
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
    
    private function getStats(){
        
    }
    
}
