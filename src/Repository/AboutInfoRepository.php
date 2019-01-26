<?php

namespace App\Repository;

use App\Entity\AboutInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AboutInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method AboutInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method AboutInfo[]    findAll()
 * @method AboutInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutInfoRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, AboutInfo::class);
	}

	/**
	 * @return array
	 */
	public function getAllAboutInfo()
	{
		$data = $this->findBy([], ['pos' => 'ASC']);
		$response = [];
		if (!empty($data))
			foreach ($data as $item) {
				$response[] = [
					'id' => $item->getId(),
					'title' => $item->getTitle(),
					'text' => $item->getText(),
					'pos' => $item->getPos(),
				];
			}
		return $response;
	}
}
