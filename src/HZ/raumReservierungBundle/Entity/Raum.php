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
     * @ORM\Column(name="nummer", type="integer")
     */
    private $nummer;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;






    /**
     * @ORM\OneToMany(targetEntity="Reservierung", mappedBy="roum")
     */
    protected $reservierung;

    /**
       * @ORM\ManyToOne(targetEntity="HZ\raumReservierungBundle\Entity\Gebaeude")
       * @ORM\JoinColumn(nullable=false)
       */
      private $gebaeude;
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
     * Set nummer
     *
     * @param integer $nummer
     *
     * @return Raum
     */
    public function setNummer($nummer)
    {
        $this->nummer = $nummer;

        return $this;
    }

    /**
     * Get nummer
     *
     * @return int
     */
    public function getNummer()
    {
        return $this->nummer;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Raum
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservierung = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set gebaeude
     *
     * @param \HZ\raumReservierungBundle\Entity\Gebaeude $gebaeude
     *
     * @return Raum
     */
    public function setGebaeude(\HZ\raumReservierungBundle\Entity\Gebaeude $gebaeude)
    {
        $this->gebaeude = $gebaeude;

        return $this;
    }

    /**
     * Get gebaeude
     *
     * @return \HZ\raumReservierungBundle\Entity\Gebaeude
     */
    public function getGebaeude()
    {
        return $this->gebaeude;
    }

    /**
     * Add reservierung
     *
     * @param \HZ\raumReservierungBundle\Entity\Reservierung $reservierung
     *
     * @return Raum
     */
    public function addReservierung(\HZ\raumReservierungBundle\Entity\Reservierung $reservierung)
    {
        $this->reservierung[] = $reservierung;

        return $this;
    }

    /**
     * Remove reservierung
     *
     * @param \HZ\raumReservierungBundle\Entity\Reservierung $reservierung
     */
    public function removeReservierung(\HZ\raumReservierungBundle\Entity\Reservierung $reservierung)
    {
        $this->reservierung->removeElement($reservierung);
    }

    /**
     * Get reservierung
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservierung()
    {
        return $this->reservierung;
    }

    
}
