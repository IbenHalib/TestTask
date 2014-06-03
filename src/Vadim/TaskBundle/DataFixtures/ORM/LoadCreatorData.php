<?php

namespace Vadim\TaskBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vadim\TaskBundle\Entity\Creator;
use Symfony\Component\Yaml\Yaml;
use Vadim\TaskBundle\Form\Type\SiteType;

class LoadCreatorData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        $data = $this->getData();

        foreach ($data as $creatorData) {
            $creator = new Creator();

            $creator->setName($creatorData['name'])
                ->setContactData($creatorData['contactData'])
                ->setBirthDate(new \DateTime($creatorData['birthDate']))
                ->setContactData($creatorData['contactData'])
                ->setDateStartCareer(new \DateTime($creatorData['startCareer']))
                ->setUsedTechnology($creatorData['usedTechnology']);

            $this->addReference($creatorData['reference'], $creator);

            $manager->persist($creator);
            $manager->flush();
        }

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 20;
    }

    protected function getData()
    {
        return Yaml::parse(__DIR__ . '/data/creator.yml');
    }
}
