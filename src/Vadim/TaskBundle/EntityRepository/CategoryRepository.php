<?php

namespace Vadim\TaskBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;
use Vadim\TaskBundle\Entity\Project;
Use Vadim\TaskBundle\Entity\Creator;


class CategoryRepository extends EntityRepository
{
//    public function findByNameForCreateTree()
//    {
//        return $this->getEntityManager()
//            ->createQuery('SELECT a FROM VadimTaskBundle:Category a ORDER BY a.id ASC ')
//            ->getResult()
//            ;
//    }

    public function findByNameForCreateTree()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a.id, a.name, b.id, b.name, d.id, d.name FROM VadimTaskBundle:Category a
                          JOIN a.projects b JOIN b.creators d ORDER BY d.id ASC ')
            ->getResult()
            ;
    }
}