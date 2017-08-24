<?php

namespace HZ\raumReservierungBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservierung
 *
 * @ORM\Table(name="reservierung")
 * @ORM\Entity(repositoryClass="HZ\raumReservierungBundle\Repository\ReservierungRepository")
 */
class Reservierung
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
     * @ORM\Column(name="startDatum", type="datetime")
     */
    private $startDatum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDatum", type="datetime")
     */
    private $endDatum;


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
     * Set startDatum
     *
     * @param \DateTime $startDatum
     *
     * @return Reservierung
     */
    public function setStartDatum($startDatum)
    {
        $this->startDatum = $startDatum;

        return $this;
    }

    /**
     * Get startDatum
     *
     * @return \DateTime
     */
    public function getStartDatum()
    {
        return $this->startDatum;
    }

    /**
     * Set endDatum
     *
     * @param \DateTime $endDatum
     *
     * @return Reservierung
     */
    public function setEndDatum($endDatum)
    {
        $this->endDatum = $endDatum;

        return $this;
    }

    /**
     * Get endDatum
     *
     * @return \DateTime
     */
    public function getEndDatum()
    {
        return $this->endDatum;
    }
}

