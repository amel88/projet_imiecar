<?php

namespace ImiecarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campus
 *
 * @ORM\Table(name="campus")
 * @ORM\Entity(repositoryClass="ImiecarBundle\Repository\CampusRepository")
 */
class Campus
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
     * @ORM\Column(name="adresseCampus", type="string", length=255)
     */
    private $adresseCampus;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCampus", type="string", length=255)
     */
    private $nomCampus;


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
     * Set adresseCampus
     *
     * @param string $adresseCampus
     *
     * @return Campus
     */
    public function setAdresseCampus($adresseCampus)
    {
        $this->adresseCampus = $adresseCampus;

        return $this;
    }

    /**
     * Get adresseCampus
     *
     * @return string
     */
    public function getAdresseCampus()
    {
        return $this->adresseCampus;
    }

    /**
     * Set nomCampus
     *
     * @param string $nomCampus
     *
     * @return Campus
     */
    public function setNomCampus($nomCampus)
    {
        $this->nomCampus = $nomCampus;

        return $this;
    }

    /**
     * Get nomCampus
     *
     * @return string
     */
    public function getNomCampus()
    {
        return $this->nomCampus;
    }
}

