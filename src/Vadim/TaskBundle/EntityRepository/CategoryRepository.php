<?php

namespace Vadim\TaskBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{

    public function findByNameForCreateTree()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a FROM VadimTaskBundle:Category a ORDER BY a.id ASC ')
            ->getResult()
            ;
    }
}