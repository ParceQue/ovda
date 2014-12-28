<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 2014-12-26
 * Time: 18:12
 */

namespace OVDA\IndexBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Message {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages")
     * @ORM\JoinColumn(name="from", referencedColumnName="id")
     */
    protected $from;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages")
     * @ORM\JoinColumn(name="to", referencedColumnName="id")
     */
    protected $to;

    /**
     * @ORM\Column(type="datetime", length=100)
     */
    protected $time;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    protected $content;

    /**
     * @ORM\OneToOne(targetEntity="Message")
     * @ORM\JoinColumn(name="parentMsg_id", referencedColumnName="id")
     **/
    protected $parentMsg;


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
     * Set time
     *
     * @param \DateTime $time
     * @return Message
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
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
     * Set from
     *
     * @param \OVDA\IndexBundle\Entity\User $from
     * @return Message
     */
    public function setFrom(\OVDA\IndexBundle\Entity\User $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \OVDA\IndexBundle\Entity\User 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \OVDA\IndexBundle\Entity\User $to
     * @return Message
     */
    public function setTo(\OVDA\IndexBundle\Entity\User $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \OVDA\IndexBundle\Entity\User 
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set parentMsg
     *
     * @param \OVDA\IndexBundle\Entity\Message $parentMsg
     * @return Message
     */
    public function setParentMsg(\OVDA\IndexBundle\Entity\Message $parentMsg = null)
    {
        $this->parentMsg = $parentMsg;

        return $this;
    }

    /**
     * Get parentMsg
     *
     * @return \OVDA\IndexBundle\Entity\Message 
     */
    public function getParentMsg()
    {
        return $this->parentMsg;
    }
}
