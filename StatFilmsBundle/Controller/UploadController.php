<?php

namespace Krstic\StatFilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UploadController extends Controller
{
    /*
     * Affiche la vue des statistiques
     */
    public function indexAction()
    {
        //get le service
        //get la classe representant le CSV
        //creer le form builder
        //render la vue avec form
        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
            ->setAction($this->generateUrl('krstic_stat_films_addfile'))
            ->setMethod('POST')
            ->add('attachment', FileType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        return $this->render('@KrsticStatFilms/Upload/index.html.twig', array(
            'form' => $form->createView()
        ));

    }
    
    
    /*
     * Upload les données du fichier, affiche la vue des stats
     */
    public function addFileAction(Request $request)
    {
        if($request->isMethod('POST')){
            $file = $request->files;
            //verifier le type .csv du fichier
            $FileDataGetter = $this->container->get('krstic_stat_films.filedatagetter');
            $CSVDataGetter = $FileDataGetter::getAlgoCSVFile($file);
            
            /////REPRENDRE ICI//////
            
            //implementer la methode getData du CSV
            //$FileDataGetter getDatas
            //redirect vers la vu Home en envoyant les datas au controler
            
        }
        //get le service
        //get la classe representant le CSV
        //get les datas
        //render la vue Home avec les datas en paramètre
        return $this->render('@KrsticStatFilms/Upload/index.html.twig');
       
    }
    /*
     * Upload les données du fichier, affiche la vue des stats
     */
    public function uploadAction()
    {
        //get le service
        //get la classe representant le CSV
        //get les datas
        //render la vue Home avec les datas en paramètre
        return $this->render('@KrsticStatFilms/Upload/index.html.twig');
       
    }
}
