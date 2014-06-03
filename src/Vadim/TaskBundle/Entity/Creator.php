<?php

namespace Vadim\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="creator")
 */
class Creator
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_start_career", type="datetime")
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dateStartCareer;

    /**
     * @var \DateTime
     * @ORM\Column(name="birth_date", type="datetime")
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $birthDate;

    /**
     * @var string
     * @ORM\Column(name="contact_data", type="text")
     * @Assert\NotBlank()
     */
    protected $contactData;

    /**
     * @ORM\Column(name="used_technology", type="text")
     * @Assert\NotBlank()
     */
    protected $usedTechnology;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Project", mappedBy="creators")
     * @ORM\JoinTable(name="creator_project")
     */
    protected $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return string
     */
    public function getContactData()
    {
        return $this->contactData;
    }

    /**
     * @return \DateTime
     */
    public function getDateStartCareer()
    {
        return $this->dateStartCareer;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return ArrayCollection/Project[]
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @return string
     */
    public function getUsedTechnology()
    {
        return $this->usedTechnology;
    }

    /**
     * @param \DateTime $birthDate
     * @return Creator
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @param string $contactData
     * @return Creator
     */
    public function setContactData($contactData)
    {
        $this->contactData = $contactData;

        return $this;
    }

    /**
     * @param \DateTime $dateStartCareer
     * @return Creator
     */
    public function setDateStartCareer($dateStartCareer)
    {
        $this->dateStartCareer = $dateStartCareer;

        return $this;
    }

    /**
     * @param integer $id
     * @return Creator
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     * @return Creator
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Project $projects
     * @return Creator
     */
    public function setProjects($projects)
    {
        $this->projects->add($projects);

        return $this;
    }

    /**
     * @param string $usedTechnology
     * @return Creator
     */
    public function setUsedTechnology($usedTechnology)
    {
        $this->usedTechnology = $usedTechnology;

        return $this;
    }


}
