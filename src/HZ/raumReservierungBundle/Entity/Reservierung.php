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
       * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="reservierung")
       * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
       */
      protected $dozent;
      /**
         * @ORM\ManyToOne(targetEntity="HZ\raumReservierungBundle\Entity\Student")
         * @ORM\JoinColumn(nullable=false)
         */
        private $student;
        /**
           * @ORM\ManyToOne(targetEntity="HZ\raumReservierungBundle\Entity\Raum")
           * @ORM\JoinColumn(nullable=false)
           */
          private $raum;

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

    /**
     * Set dozent
     *
     * @param \HZ\raumReservierungBundle\Entity\Dozent $dozent
     *
     * @return Reservierung
     */
    public function setDozent(\HZ\raumReservierungBundle\Entity\Dozent $dozent)
    {
        $this->dozent = $dozent;

        return $this;
    }

    /**
     * Get dozent
     *
     * @return \HZ\raumReservierungBundle\Entity\Dozent
     */
    public function getDozent()
    {
        return $this->dozent;
    }

    /**
     * Set student
     *
     * @param \HZ\raumReservierungBundle\Entity\Student $student
     *
     * @return Reservierung
     */
    public function setStudent(\HZ\raumReservierungBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \HZ\raumReservierungBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set raum
     *
     * @param \HZ\raumReservierungBundle\Entity\Raum $raum
     *
     * @return Reservierung
     */
    public function setRaum(\HZ\raumReservierungBundle\Entity\Raum $raum)
    {
        $this->raum = $raum;

        return $this;
    }

    /**
     * Get raum
     *
     * @return \HZ\raumReservierungBundle\Entity\Raum
     */
    public function getRaum()
    {
        return $this->raum;
    }
}
