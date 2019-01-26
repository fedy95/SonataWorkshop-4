<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 * @Vich\Uploadable
 */
class Document
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
	private $title;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * NOTE: This is not a mapped field of entity metadata, just a simple property.
	 *
	 * @Vich\UploadableField(mapping="uploads_file", fileNameProperty="name")
	 * @var File
	 */
	private $file;

	/**
	 * @ORM\Column(type="date")
	 */
	private $date;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="document")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $department;

	public function getId() : ?int
	{
		return $this->id;
	}

	public function getTitle() : ?string
	{
		return $this->title;
	}

	/**
	 * @param string|null $title
	 *
	 * @return Document
	 */
	public function setTitle(string $title = null) : self
	{
		$this->title = $title;

		return $this;
	}

	public function getName() : ?string
	{
		return $this->name;
	}

	/**
	 * @param string|null $name
	 *
	 * @return Document
	 */
	public function setName(string $name = null) : self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return File|null
	 */
	public function getFile() : ?File
	{
		return $this->file;
	}

	/**
	 * @param File $file
	 *
	 * @return Document
	 * @throws \Exception
	 */
	public function setFile(File $file) : self
	{
		$this->file = $file;

		// It is required that at least one field changes if you are using Doctrine,
		// otherwise the event listeners won't be called and the file is lost
		if ($file) {
			// if 'date' is not defined in your entity, use another property
			$this->date = new \DateTime('now');
		}
		return $this;
	}

	public function getDate() : ?\DateTimeInterface
	{
		return $this->date;
	}

	public function setDate(\DateTimeInterface $date) : self
	{
		$this->date = $date;

		return $this;
	}

	public function getDepartment() : ?Department
	{
		return $this->department;
	}

	public function setDepartment(?Department $department) : self
	{
		$this->department = $department;

		return $this;
	}
}
