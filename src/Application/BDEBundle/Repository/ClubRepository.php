<?php

namespace Application\BDEBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClubRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClubRepository extends EntityRepository
{
	public function findAllClubsWithPoint()
	{
		return $this->_em->createQuery(
			'SELECT c, COALESCE(SUM(p.value), 0) AS points
			FROM ApplicationBDEBundle:Club c
			LEFT JOIN ApplicationESIEEGamesBundle:Points p
			WHERE p.club = c.id
			GROUP BY c.id
			ORDER BY points DESC'
		)->getResult();
	}
}
