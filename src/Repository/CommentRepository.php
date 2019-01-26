<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }

	/**
	 * @return array
	 */
	public function getAllComments()
	{
		$data = $this->findBy([], ['date' => 'DESC']);
		$response = [];
		if (!empty($data))
			foreach ($data as $item) {
				$response[] = [
					'id' => $item->getId(),
					'house' => $item->getHouse()->getName(),
					'user' => $item->getUser()->getEmail(),
					'title' => $item->getTitle(),
					'description' => $item->getDescription(),
					'date' => $item->getDate()->format('Y-m-d'),
				];
			}
		return $response;
	}
}
