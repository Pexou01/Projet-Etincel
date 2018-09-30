<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * villes
 *
 * @ORM\Table(name="villes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\villesRepository")
 */
class villes
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
     * @ORM\Column(name="ville_departement", type="string", length=5)
     */
    private $villeDepartement;

    /**
     * @var string
     * 
     * @ORM\Column(name="ville_nom", type="string", length=45)
     * 
     */
    private $villeNom;
    /**
     *@ORM\OneToMany(targetEntity="Contact", mappedBy="ville")
     * @var type 
     */
    private $contacts;
    
    /**
     *@ORM\OneToMany(targetEntity="User", mappedBy="ville")
     * @var type 
     */
    private $user;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ville_code_postal", type="string", length=5)
     */
    private $villeCodePostal;


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
     * Set villeDepartement
     *
     * @param string $villeDepartement
     *
     * @return villes
     */
    public function setVilleDepartement($villeDepartement)
    {
        $this->villeDepartement = $villeDepartement;

        return $this;
    }

    /**
     * Get villeDepartement
     *
     * @return string
     */
    public function getVilleDepartement()
    {
        return $this->villeDepartement;
    }

    /**
     * Set villeNom
     *
     * @param string $villeNom
     *
     * @return villes
     */
    public function setVilleNom($villeNom)
    {
        $this->villeNom = $villeNom;

        return $this;
    }

    /**
     * Get villeNom
     *
     * @return string
     */
    public function getVilleNom()
    {
        return $this->villeNom;
    }

    /**
     * Set villeCodePostal
     *
     * @param string $villeCodePostal
     *
     * @return villes
     */
    public function setVilleCodePostal($villeCodePostal)
    {
        $this->villeCodePostal = $villeCodePostal;

        return $this;
    }

    /**
     * Get villeCodePostal
     *
     * @return string
     */
    public function getVilleCodePostal()
    {
        return $this->villeCodePostal;
    }
    

    /**
     * Set nomVille
     *
     * @param \AppBundle\Entity\Contact $nomVille
     *
     * @return villes
     */
    public function setNomVille(\AppBundle\Entity\Contact $nomVille = null)
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    /**
     * Get nomVille
     *
     * @return \AppBundle\Entity\Contact
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nomVille = new \Doctrine\Common\Collections\ArrayCollection();
    }
    function getContacts() {
        return $this->contacts;
    }

    function setContacts($contacts) {
        $this->contacts = $contacts;
    }
   


 
  

    /**
     * Add contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return villes
     */
    public function addContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \AppBundle\Entity\Contact $contact
     */
    public function removeContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return villes
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
