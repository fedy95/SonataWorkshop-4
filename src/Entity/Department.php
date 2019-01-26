<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentRepository")
 */
class Department
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
	 * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="department")
	 */
	private $document;

	public function __construct()
	{
		$this->document = new ArrayCollection();
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
	 * @return Collection|Document[]
	 */
	public function getDocument() : Collection
	{
		return $this->document;
	}

	public function addDocument(Document $document) : self
	{
		if (!$this->document->contains($document)) {
			$this->document[] = $document;
			$document->setDepartment($this);
		}

		return $this;
	}

	public function removeDocument(Document $document) : self
	{
		if ($this->document->contains($document)) {
			$this->document->removeElement($document);
			// set the owning side to null (unless already changed)
			if ($document->getDepartment() === $this) {
				$document->setDepartment(null);
			}
		}

		return $this;
	}
}
