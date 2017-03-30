<?php

namespace ImiecarBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table(name="trajet")
 * @ORM\Entity(repositoryClass="ImiecarBundle\Repository\TrajetRepository")
 */
class Trajet
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

//    /**
//     * @var string
//     *
//     * @ORM\OneToMany(targetEntity="ImiecarBundle\Entity\Ville", mappedBy="ville")
//     */
//    private $villeDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_depart", type="string", length=255)
     */
    private $villeDepart;

//    /**
//     * @var string
//     *
//     * @ORM\OneToMany(targetEntity="ImiecarBundle\Entity\Ville", mappedBy="ImiecarBundle\Entity\Trajet")
//     */
//    private $villeIntermediaire;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_intermediaire", type="string", length=255, nullable=true)
     */
    private $villeIntermediaire;

//    /**
//     * @var string
//     *
//     * @ORM\OneToMany(targetEntity="ImiecarBundle\Entity\Ville", mappedBy="ImiecarBundle\Entity\Trajet")
//     */
//    private $villeArrivee;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_arrivee", type="string", length=255)
     */
    private $villeArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_depart", type="time")
     */
    private $heureDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_intermediaire", type="time", nullable=true)
     */
    private $heureIntermediaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_arrivee", type="time")
     */
    private $heureArrivee;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_places", type="integer")
     */
    private $nbPlaces;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", fetch="EAGER")
     */
    private $idUtilisateur;

//    public function __construct()
//    {
//        $this->villeDepart = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->villeArrivee = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->villeIntermediaire = new \Doctrine\Common\Collections\ArrayCollection();
//    }

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Trajet
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * @param string $villeDepart
     */
    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;
    }

    /**
     * @return string
     */
    public function getVilleIntermediaire()
    {
        return $this->villeIntermediaire;
    }

    /**
     * @param string $villeIntermediaire
     */
    public function setVilleIntermediaire($villeIntermediaire)
    {
        $this->villeIntermediaire = $villeIntermediaire;
    }

    /**
     * @return string
     */
    public function getVilleArrivee()
    {
        return $this->villeArrivee;
    }

    /**
     * @param string $villeArrivee
     */
    public function setVilleArrivee($villeArrivee)
    {
        $this->villeArrivee = $villeArrivee;
    }





//    /**
//     * Get villeDepart
//     *
//     * @return ArrayCollection|\ImiecarBundle\Entity\Ville[]
//     */
//    public function getVilleDepart()
//    {
//        return $this->villeDepart;
//    }
//
//    /**
//     * Get villeIntermediaire
//     *
//     * @return ArrayCollection|\ImiecarBundle\Entity\Ville[]
//     */
//    public function getVilleIntermediaire()
//    {
//        return $this->villeIntermediaire;
//    }
//
//
//    /**
//     * Get villeArrivee
//     *
//     * @return ArrayCollection|\ImiecarBundle\Entity\Ville[]
//     */
//    public function getVilleArrivee()
//    {
//        return $this->villeArrivee;
//    }

    /**
     * Set heureDepart
     *
     * @param \DateTime $heureDepart
     *
     * @return Trajet
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return \DateTime
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * Set heureIntermediaire
     *
     * @param string $heureIntermediaire
     *
     * @return Trajet
     */
    public function setHeureIntermediaire($heureIntermediaire)
    {
        $this->heureIntermediaire = $heureIntermediaire;

        return $this;
    }

    /**
     * Get heureIntermediaire
     *
     * @return string
     */
    public function getHeureIntermediaire()
    {
        return $this->heureIntermediaire;
    }

    /**
     * Set heureArrivee
     *
     * @param \DateTime $heureArrivee
     *
     * @return Trajet
     */
    public function setHeureArrivee($heureArrivee)
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    /**
     * Get heureArrivee
     *
     * @return \DateTime
     */
    public function getHeureArrivee()
    {
        return $this->heureArrivee;
    }

    /**
     * Set nbPlaces
     *
     * @param integer $nbPlaces
     *
     * @return Trajet
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return int
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * Set idUtilisateur
     *
     * @param integer $idUtilisateur
     *
     * @return Trajet
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return int
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}

