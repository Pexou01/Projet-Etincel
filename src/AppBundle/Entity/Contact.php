<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="suject", type="string", length=100)
     */
    private $suject;

    
    /**
     *@ORM\ManyToMany(targetEntity="telephone", inversedBy="contact")
     * @var type 
     */
    private $num;
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=500)
     */
    private $message;
    /**
     *
     * @ORM\ManyToOne(targetEntity="villes", inversedBy="contacts")
     */
    private $ville;
   
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
     * @return Contact
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
     * Set email
     *
     * @param string $email
     *
     * @return Contact
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Contact
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set suject
     *
     * @param string $suject
     *
     * @return Contact
     */
    public function setSuject($suject)
    {
        $this->suject = $suject;

        return $this;
    }

    /**
     * Get suject
     *
     * @return string
     */
    public function getSuject()
    {
        return $this->suject;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->villeNom = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set ville
     *
     * @param \AppBundle\Entity\villes $ville
     *
     * @return Contact
     */
    public function setVille(\AppBundle\Entity\villes $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\villes
     */
    public function getVille()
    {
        return $this->ville;
    }
    
   
     


    /**
     * Add num
     *
     * @param \AppBundle\Entity\telephone $num
     *
     * @return Contact
     */
    public function addNum(\AppBundle\Entity\telephone $num)
    {
        $this->num[] = $num;

        return $this;
    }

    /**
     * Remove num
     *
     * @param \AppBundle\Entity\telephone $num
     */
    public function removeNum(\AppBundle\Entity\telephone $num)
    {
        $this->num->removeElement($num);
    }

    /**
     * Get num
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNum()
    {
        return $this->num;
    }
}
