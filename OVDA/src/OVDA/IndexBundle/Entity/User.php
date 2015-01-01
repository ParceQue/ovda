<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 2014-12-25
 * Time: 20:19
 */
namespace OVDA\IndexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Account", inversedBy="user")
     * @ORM\JoinColumn(name="account", referencedColumnName="id")
     */
    protected $account;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nickName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $sex;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $age;

    /**
     * @ORM\OneToOne(targetEntity="City", mappedBy="user")
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $sexuality;

    /**
     * @ORM\Column(type="boolean", length=100, nullable=true)
     */
    protected $enfant;

    /**
     * @ORM\Column(type="boolean", length=100, nullable=true)
     */
    protected $fumeur;

    /**
     * @ORM\Column(type="boolean", length=100, nullable=true)
     */
    protected $alcool;
 
    /**
     * @ORM\ManyToMany(targetEntity="Interest", inversedBy="users")
     * @ORM\JoinTable(name="user_interests")
     */
    protected $interests;

    /**
     * @ORM\ManyToMany(targetEntity="ActivityType", inversedBy="users")
     * @ORM\JoinTable(name="users_activities")
     */
    protected $activities;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="from")
     */
    protected $messagesOut;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="to")
     */
    protected $messagesIn;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     **/
    private $friendsWithMe;

    /**
     * @ORM\OneToMany(targetEntity="Temoignage", mappedBy="user")
     */
    protected $temoignages;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     **/
    private $myFriends;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="user")
     */
    protected $photos;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    protected $create;

    public function __toString()
    {
        return $this->firstName;
    }


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
     * Set name
     *
     * @param string $name
     * @return User
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
        $this->interests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->friends = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set nickName
     *
     * @param string $nickName
     * @return User
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * Get nickName
     *
     * @return string 
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set age
     *
     * @param string $age
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sexuality
     *
     * @param string $sexuality
     * @return User
     */
    public function setSexuality($sexuality)
    {
        $this->sexuality = $sexuality;

        return $this;
    }

    /**
     * Get sexuality
     *
     * @return string 
     */
    public function getSexuality()
    {
        return $this->sexuality;
    }

    /**
     * Set enfant
     *
     * @param boolean $enfant
     * @return User
     */
    public function setEnfant($enfant)
    {
        $this->enfant = $enfant;

        return $this;
    }

    /**
     * Get enfant
     *
     * @return boolean 
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set fumeur
     *
     * @param boolean $fumeur
     * @return User
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;

        return $this;
    }

    /**
     * Get fumeur
     *
     * @return boolean 
     */
    public function getFumeur()
    {
        return $this->fumeur;
    }

    /**
     * Set alcool
     *
     * @param boolean $alcool
     * @return User
     */
    public function setAlcool($alcool)
    {
        $this->alcool = $alcool;

        return $this;
    }

    /**
     * Get alcool
     *
     * @return boolean 
     */
    public function getAlcool()
    {
        return $this->alcool;
    }

    /**
     * Set city
     *
     * @param \OVDA\IndexBundle\Entity\City $city
     * @return User
     */
    public function setCity(\OVDA\IndexBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \OVDA\IndexBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set account
     *
     * @param \OVDA\IndexBundle\Entity\Account $account
     * @return User
     */
    public function setAccount(\OVDA\IndexBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \OVDA\IndexBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Add interests
     *
     * @param \OVDA\IndexBundle\Entity\Interest $interests
     * @return User
     */
    public function addInterest(\OVDA\IndexBundle\Entity\Interest $interests)
    {
        $this->interests[] = $interests;

        return $this;
    }

    /**
     * Remove interests
     *
     * @param \OVDA\IndexBundle\Entity\Interest $interests
     */
    public function removeInterest(\OVDA\IndexBundle\Entity\Interest $interests)
    {
        $this->interests->removeElement($interests);
    }

    /**
     * Get interests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * Add activities
     *
     * @param \OVDA\IndexBundle\Entity\ActivityType $activities
     * @return User
     */
    public function addActivity(\OVDA\IndexBundle\Entity\ActivityType $activities)
    {
        $this->activities[] = $activities;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \OVDA\IndexBundle\Entity\ActivityType $activities
     */
    public function removeActivity(\OVDA\IndexBundle\Entity\ActivityType $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set messages
     *
     * @param \OVDA\IndexBundle\Entity\Message $messages
     * @return User
     */
    public function setMessages(\OVDA\IndexBundle\Entity\Message $messages = null)
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * Get messages
     *
     * @return \OVDA\IndexBundle\Entity\Message 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add friends
     *
     * @param \OVDA\IndexBundle\Entity\User $friends
     * @return User
     */
    public function addFriend(\OVDA\IndexBundle\Entity\User $friends)
    {
        $this->friends[] = $friends;

        return $this;
    }

    /**
     * Remove friends
     *
     * @param \OVDA\IndexBundle\Entity\User $friends
     */
    public function removeFriend(\OVDA\IndexBundle\Entity\User $friends)
    {
        $this->friends->removeElement($friends);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * Add photos
     *
     * @param \OVDA\IndexBundle\Entity\Photo $photos
     * @return User
     */
    public function addPhoto(\OVDA\IndexBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \OVDA\IndexBundle\Entity\Photo $photos
     */
    public function removePhoto(\OVDA\IndexBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add messagesOut
     *
     * @param \OVDA\IndexBundle\Entity\Message $messagesOut
     * @return User
     */
    public function addMessagesOut(\OVDA\IndexBundle\Entity\Message $messagesOut)
    {
        $this->messagesOut[] = $messagesOut;

        return $this;
    }

    /**
     * Remove messagesOut
     *
     * @param \OVDA\IndexBundle\Entity\Message $messagesOut
     */
    public function removeMessagesOut(\OVDA\IndexBundle\Entity\Message $messagesOut)
    {
        $this->messagesOut->removeElement($messagesOut);
    }

    /**
     * Get messagesOut
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesOut()
    {
        return $this->messagesOut;
    }

    /**
     * Add messagesIn
     *
     * @param \OVDA\IndexBundle\Entity\Message $messagesIn
     * @return User
     */
    public function addMessagesIn(\OVDA\IndexBundle\Entity\Message $messagesIn)
    {
        $this->messagesIn[] = $messagesIn;

        return $this;
    }

    /**
     * Remove messagesIn
     *
     * @param \OVDA\IndexBundle\Entity\Message $messagesIn
     */
    public function removeMessagesIn(\OVDA\IndexBundle\Entity\Message $messagesIn)
    {
        $this->messagesIn->removeElement($messagesIn);
    }

    /**
     * Get messagesIn
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesIn()
    {
        return $this->messagesIn;
    }

    /**
     * Add friendsWithMe
     *
     * @param \OVDA\IndexBundle\Entity\User $friendsWithMe
     * @return User
     */
    public function addFriendsWithMe(\OVDA\IndexBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \OVDA\IndexBundle\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\OVDA\IndexBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe->removeElement($friendsWithMe);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriends
     *
     * @param \OVDA\IndexBundle\Entity\User $myFriends
     * @return User
     */
    public function addMyFriend(\OVDA\IndexBundle\Entity\User $myFriends)
    {
        $this->myFriends[] = $myFriends;

        return $this;
    }

    /**
     * Remove myFriends
     *
     * @param \OVDA\IndexBundle\Entity\User $myFriends
     */
    public function removeMyFriend(\OVDA\IndexBundle\Entity\User $myFriends)
    {
        $this->myFriends->removeElement($myFriends);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }

    /**
     * Add temoignages
     *
     * @param \OVDA\IndexBundle\Entity\Temoignage $temoignages
     * @return User
     */
    public function addTemoignage(\OVDA\IndexBundle\Entity\Temoignage $temoignages)
    {
        $this->temoignages[] = $temoignages;

        return $this;
    }

    /**
     * Remove temoignages
     *
     * @param \OVDA\IndexBundle\Entity\Temoignage $temoignages
     */
    public function removeTemoignage(\OVDA\IndexBundle\Entity\Temoignage $temoignages)
    {
        $this->temoignages->removeElement($temoignages);
    }

    /**
     * Get temoignages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTemoignages()
    {
        return $this->temoignages;
    }

    /**
     * Set create
     *
     * @param \DateTime $create
     * @return User
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
