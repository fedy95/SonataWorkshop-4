<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AboutInfoRepository")
 */
class AboutInfo
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
	 * @ORM\Column(type="text")
	 */
	private $text;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $pos;

	public function getId() : ?int
	{
		return $this->id;
	}

	public function getTitle() : ?string
	{
		return $this->title;
	}

	public function setTitle(string $title) : self
	{
		$this->title = $title;

		return $this;
	}

	public function getText() : ?string
	{
		return $this->text;
	}

	public function setText(string $text) : self
	{
		$this->text = $text;

		return $this;
	}

	public function getPos() : ?int
	{
		return $this->pos;
	}

	public function setPos(int $pos) : self
	{
		$this->pos = $pos;

		return $this;
	}
}
