<?php

namespace HZ\raumReservierungBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Raum
 *
 * @ORM\Table(name="raum")
 * @ORM\Entity(repositoryClass="HZ\raumReservierungBundle\Repository\RaumRepository")
 */
class Raum
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
     * @var int
     *
     * @ORM\Column(name="raum_nummer", type="integer")
     */
    private $raumNummer;


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
     * Set raumNummer
     *
     * @param integer $raumNummer
     *
     * @return Raum
     */
    public function setRaumNummer($raumNummer)
    {
        $this->raumNummer = $raumNummer;

        return $this;
    }

    /**
     * Get raumNummer
     *
     * @return int
     */
    public function getRaumNummer()
    {
        return $this->raumNummer;
    }
}

