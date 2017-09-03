<?php

namespace HZ\raumReservierungBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="HZ\raumReservierungBundle\Repository\StudentRepository")
 */
class Student
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="vorname", type="string", length=255)
     */
    private $vorname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Reservierung", mappedBy="student")
     */
    protected $reservierung;


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
     * Set name
     *
     * @param string $name
     *
     * @return Student
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
     * Set vorname
     *
     * @param string $vorname
     *
     * @return Student
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get vorname
     *
     * @return string
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservierung = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reservierung
     *
     * @param \HZ\raumReservierungBundle\Entity\Reservierung $reservierung
     *
     * @return Student
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
