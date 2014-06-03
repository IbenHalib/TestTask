<?php

namespace Vadim\TaskBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vadim\TaskBundle\Entity\Project;
use Symfony\Component\Yaml\Yaml;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        $data = $this->getData();

        foreach ($data as $projectData) {
            $project = new Project();

            $project->setName($projectData['name'])
                ->setClientName($projectData['clientName'])
                ->setDateStart(new \DateTime($projectData['dateStart']));

            foreach ($projectData['referenceCreator'] as $referenceCreator) {
                $project->getCreators()->add($this->getReference($referenceCreator));
                $this->getReference($referenceCreator)->getProjects()->add($project);
            }

            $project->setCategory($this->getReference($projectData['referenceCategory']));

            $manager->persist($project);
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
        return 30;
    }

    protected function getData()
    {
        return Yaml::parse(__DIR__ . '/data/project.yml');
    }
}
