<?php

namespace HZ\raumReservierungBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gebaeude
 *
 * @ORM\Table(name="gebaeude")
 * @ORM\Entity(repositoryClass="HZ\raumReservierungBundle\Repository\GebaeudeRepository")
 */
class Gebaeude
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
     * @ORM\OneToMany(targetEntity="Raum", mappedBy="gebaeude")
     */
    protected $raum;
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
     * @return Gebaeude
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
     * @return Gebaeude
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
        $this->raum = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add raum
     *
     * @param \HZ\raumReservierungBundle\Entity\Raum $raum
     *
     * @return Gebaeude
     */
    public function addRaum(\HZ\raumReservierungBundle\Entity\Raum $raum)
    {
        $this->raum[] = $raum;

        return $this;
    }

    /**
     * Remove raum
     *
     * @param \HZ\raumReservierungBundle\Entity\Raum $raum
     */
    public function removeRaum(\HZ\raumReservierungBundle\Entity\Raum $raum)
    {
        $this->raum->removeElement($raum);
    }

    /**
     * Get raum
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRaum()
    {
        return $this->raum;
    }

}
