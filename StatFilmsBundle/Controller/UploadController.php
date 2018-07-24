<?php

namespace Krstic\StatFilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Krstic\StatFilmsBundle\Entity\Films;

class UploadController extends Controller
{
    /**
     * Affiche la vue des statistiques
     */
    public function indexAction()
    {
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
    
    
    /**
     * Upload les données du fichier, affiche la vue des stats
     */
    public function addFileAction(Request $request)
    {
        if($request->isMethod('POST')){
            
            //Get DataGetter service
            $FileDataGetter = $this->container->get('krstic_stat_films.filedatagetter');
            $DattaGetter = $FileDataGetter::getAlgoCSVFile($request->files); //for CSV Files
            $datas = $FileDataGetter->getFileDatas($DattaGetter);
            
            //Si erreur set flash message
            if($datas == $DattaGetter::ERROR){
                $request->getSession()->getFlashBag()->add('error', $DattaGetter->getErrorMessage());
                return $this->redirectToRoute('krstic_stat_films_uploadpage');
            }
            
            //Persist Datas
            $em = $this->getDoctrine()->getManager();
            $length = count($datas);
            for($row = 1; $row < $length; $row++) {
                $Film = (new Films())
                        ->setTitre($datas[$row][0])
                        ->setRealisateur($datas[$row][1])
                        ->setAnnee($datas[$row][2])
                        ->setPaysorigine($datas[$row][3])
                        ->setNbdiffucions($datas[$row][4])
                        ->setAnneedernierediffusion($datas[$row][5]);
                $em->persist($Film);
            }
            
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Fichier importé avec succès !');            
            
            return $this->redirectToRoute('krstic_stat_films_homepage');            
        }       
    }
}
