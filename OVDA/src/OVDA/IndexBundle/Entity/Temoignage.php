<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 2014-12-30
 * Time: 12:32
 */

namespace OVDA\IndexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVDA\IndexBundle\Entity\User;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * @ORM\Entity
 * @ORM\Table(name="temoignage")
 */
class Temoignage {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="temoignages")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    protected $content;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    protected $create;

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
     * Set title
     *
     * @param string $title
     * @return Temoignage
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
     * Set content
     *
     * @param string $content
     * @return Temoignage
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set user
     *
     * @param \OVDA\IndexBundle\Entity\User $user
     * @return Temoignage
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

    /**
     * Set create
     *
     * @param \DateTime $create
     * @return Temoignage
     */
    public function setCreate($create)
    {
        $this->create = $create;

        return $this;
    }

    /**
     * Get create
     *
     * @return \DateTime 
     */
    public function getCreate()
    {
        return $this->create;
    }
}
