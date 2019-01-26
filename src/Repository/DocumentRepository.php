<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, Document::class);
	}

	/**
	 * @return array
	 */
	public function getAllDocuments()
	{
		$data = $this->findBy([], ['id' => 'DESC']);
		$response = [];
		if (!empty($data))
			foreach ($data as $item) {
				$response[] = [
					'id' => $item->getId(),
					'departmentName' => $item->getDepartment()->getName(),
					'title' => $item->getTitle(),
					'name' => $item->getName(),
					'date' => $item->getDate()->format('Y-m-d'),
				];
			}
		return $response;
	}
}
