<?php
namespace Users\Repository;

use Doctrine\ORM\EntityRepository;
use Users\Entity\User;

/**
 * This is the custom repository class for User entity.
 */
class UserRepository extends EntityRepository
{

    /**
     * Retrieves all users in descending dateCreated order.
     *
     * @return \Doctrine\ORM\Query
     */
    public function findAllUsers()
    {
        $entityManager = $this->getEntityManager();

        $queryBuilder = $entityManager->createQueryBuilder();

        $queryBuilder->select('u')
            ->from(User::class, 'u')
            ->orderBy('u.dateCreated', 'DESC');

        return $queryBuilder->getQuery();
    }
}