<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HouseRepository")
 */
class House
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="house")
	 */
	private $comment;

	public function __construct()
	{
		$this->comment = new ArrayCollection();
	}

	public function getId() : ?int
	{
		return $this->id;
	}

	public function getName() : ?string
	{
		return $this->name;
	}

	public function setName(string $name) : self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return Collection|Comment[]
	 */
	public function getComment() : Collection
	{
		return $this->comment;
	}

	public function addComment(Comment $comment) : self
	{
		if (!$this->comment->contains($comment)) {
			$this->comment[] = $comment;
			$comment->setHouse($this);
		}

		return $this;
	}

	public function removeComment(Comment $comment) : self
	{
		if ($this->comment->contains($comment)) {
			$this->comment->removeElement($comment);
			// set the owning side to null (unless already changed)
			if ($comment->getHouse() === $this) {
				$comment->setHouse(null);
			}
		}

		return $this;
	}
}
