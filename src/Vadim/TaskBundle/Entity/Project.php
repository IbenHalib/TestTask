<?php

namespace Vadim\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 */
class Project
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
     * @ORM\Column(name="client_name", type="string")
     */
    protected $clientName;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=100)
     */
    protected $name;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_start", type="date")
     */
    protected $dateStart;

    /**
     * @var Project
     * @ORM\JoinColumn(name="category_id", nullable=false)
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="projects")
     */
    protected $category;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Creator", inversedBy="projects")
     */
    protected $creators;

    public function __construct(){
        $this->creators = new ArrayCollection();
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @return ArrayCollection/Creator[]
     */
    public function getCreators()
    {
        return $this->creators;
    }

    /**
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
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
     * @param mixed $category
     * @return Project
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @param string $clientName
     * @return Project
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
        return $this;
    }

    /**
     * @param Creator $creators
     * @return Project
     */
    public function setCreators($creators)
    {
        $this->creators->add($creators);

        return $this;
    }

    /**
     * @param \DateTime $dateStart
     * @return Project
     */
    public function setDateStart(\DateTime $dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @param integer $id
     * @return Project
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


}