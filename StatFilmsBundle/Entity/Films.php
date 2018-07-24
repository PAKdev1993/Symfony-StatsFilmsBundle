<?php

namespace Krstic\StatFilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Films
 *
 * @ORM\Table(name="films")
 * @ORM\Entity(repositoryClass="Krstic\StatFilmsBundle\Repository\FilmsRepository")
 */
class Films
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=60)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="realisateur", type="string", length=150)
     */
    private $realisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="paysorigine", type="string", length=30)
     */
    private $paysorigine;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nbdiffusions", type="integer")
     */
    private $nbdiffucions;
    
    /**
     * @var string
     *
     * @ORM\Column(name="annee_derniere_diffusion", type="integer")
     */
    private $anneedernierediffusion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Films
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set realisateur
     *
     * @param string $realisateur
     *
     * @return Films
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return string
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return Films
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return int
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set paysorigine
     *
     * @param string $paysorigine
     *
     * @return Films
     */
    public function setPaysorigine($paysorigine)
    {
        $this->paysorigine = $paysorigine;

        return $this;
    }

    /**
     * Get paysorigine
     *
     * @return string
     */
    public function getPaysorigine()
    {
        return $this->paysorigine;
    }

    /**
     * Set nbdiffucions
     *
     * @param integer $nbdiffucions
     *
     * @return Films
     */
    public function setNbdiffucions($nbdiffucions)
    {
        $this->nbdiffucions = $nbdiffucions;

        return $this;
    }

    /**
     * Get nbdiffucions
     *
     * @return integer
     */
    public function getNbdiffucions()
    {
        return $this->nbdiffucions;
    }

    /**
     * Set anneedernierediffusion
     *
     * @param integer $anneedernierediffusion
     *
     * @return Films
     */
    public function setAnneedernierediffusion($anneedernierediffusion)
    {
        $this->anneedernierediffusion = $anneedernierediffusion;

        return $this;
    }

    /**
     * Get anneedernierediffusion
     *
     * @return integer
     */
    public function getAnneedernierediffusion()
    {
        return $this->anneedernierediffusion;
    }
}
