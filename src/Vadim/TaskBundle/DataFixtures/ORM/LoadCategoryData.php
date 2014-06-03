<?php

namespace Vadim\TaskBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vadim\TaskBundle\Entity\Category;
use Symfony\Component\Yaml\Yaml;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        $data = $this->getData();

        foreach ($data as $categoryData) {
            $category = new Category();

            $category->setName($categoryData['name']);
            $this->addReference($categoryData['reference'], $category);

            $manager->persist($category);
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
        return 10;
    }

    protected function getData()
    {
        return Yaml::parse(__DIR__ . '/data/category.yml');
    }
}
