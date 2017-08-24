<?php

namespace HZ\raumReservierungBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dozent
 *
 * @ORM\Table(name="dozent")
 * @ORM\Entity(repositoryClass="HZ\raumReservierungBundle\Repository\DozentRepository")
 */
class Dozent
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="raum_nummer", type="integer")
     */
    private $raumNummer;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


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
     * @return Dozent
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
     * @return Dozent
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
     * Set title
     *
     * @param string $title
     *
     * @return Dozent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set raumNummer
     *
     * @param integer $raumNummer
     *
     * @return Dozent
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Dozent
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
}

