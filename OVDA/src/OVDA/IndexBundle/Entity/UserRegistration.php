<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 2015-01-03
 * Time: 15:29
 */

namespace OVDA\IndexBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use OVDA\IndexBundle\Entity\User;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity
 * @ORM\Table(name="user_registration")
 * @UniqueEntity("user")
 */
class UserRegistration {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="registration")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="boolean", length=100, nullable=true)
     */
    protected $active;

    /**
     * @ORM\Column(name="endDate", type="datetime")
     */
    protected $endDate;

    /**
     * @ORM\Column(name="subDate", type="datetime")
     */
    protected $subDate;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return UserRegistration
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return UserRegistration
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set subDate
     *
     * @param \DateTime $subDate
     * @return UserRegistration
     */
    public function setSubDate($subDate)
    {
        $this->subDate = $subDate;

        return $this;
    }

    /**
     * Get subDate
     *
     * @return \DateTime 
     */
    public function getSubDate()
    {
        return $this->subDate;
    }

    /**
     * Set user
     *
     * @param \OVDA\IndexBundle\Entity\User $user
     * @return UserRegistration
     */
    public function setUser(\OVDA\IndexBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \OVDA\IndexBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
