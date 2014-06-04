<?php

namespace Vadim\TaskBundle\Model;

use Doctrine\ORM\EntityRepository;

class GenerateTree
{
    /**
     * @var EntityRepository
     */
    protected $repository;

    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTree()
    {
        return $this->repository->findByNameForCreateTree();
    }

}
