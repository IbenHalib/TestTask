<?php

namespace Vadim\TaskBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;

class CreatorRepository extends EntityRepository
{
    public function findByEqualDateStartCareerQuery($dateStartCareer)
    {
        return $this
            ->createQueryBuilder('Creator')
            ->where('Creator.dateStartCareer = :dateStartCareer')
            ->orderBy('Creator.dateStartCareer', 'DESC')
            ->setParameter(':dateStartCareer', $dateStartCareer)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByBeforeDateStartCareerQuery($dateStartCareer)
    {
        return $this
            ->createQueryBuilder('Creator')
            ->where('Creator.dateStartCareer <= :dateStartCareer')
            ->orderBy('Creator.dateStartCareer', 'DESC')
            ->setParameter(':dateStartCareer', $dateStartCareer)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByAfterDateStartCareerQuery($dateStartCareer)
    {
        return $this
            ->createQueryBuilder('Creator')
            ->where('Creator.dateStartCareer >= :dateStartCareer')
            ->orderBy('Creator.dateStartCareer', 'DESC')
            ->setParameter(':dateStartCareer', $dateStartCareer)
            ->getQuery()
            ->getResult()
            ;
    }

}
