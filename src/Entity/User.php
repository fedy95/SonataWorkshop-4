<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 * @Assert\Length(
	 *      max = 255,
	 * )
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $firstName;

	/**
	 * @var string
	 * @Assert\Length(
	 *      max = 255,
	 * )
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $lastName;

	/**
	 * @var string
	 * @Assert\Length(
	 *      max = 255,
	 * )
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $middleName;

	/**
	 * @ORM\Column(type="date", length=255, nullable=true)
	 */
	protected $dateOfBirth;

	/**
	 * @var string
	 * @Assert\Length(
	 *      max = 255,
	 * )
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $sex;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $phone;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
	 */
	private $comment;

	public function __construct()
	{
		parent::__construct();
		$this->comment = new ArrayCollection();
	}

	/**
	 * Set firstName
	 *
	 * @param string $firstName
	 *
	 * @return User
	 */
	public function setFirstName($firstName) : User
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * Get firstName
	 * @return string
	 */
	public function getFirstName() : ?string
	{
		return $this->firstName;
	}

	/**
	 * Set middleName
	 *
	 * @param string $middleName
	 *
	 * @return User
	 */
	public function setMiddleName($middleName) : User
	{
		$this->middleName = $middleName;

		return $this;
	}

	/**
	 * Get middleName
	 * @return string
	 */
	public function getMiddleName() : ?string
	{
		return $this->middleName;
	}

	/**
	 * Set lastName
	 *
	 * @param string $lastName
	 *
	 * @return User
	 */
	public function setLastName($lastName) : User
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * Get lastName
	 * @return string
	 */
	public function getLastName() : ?string
	{
		return $this->lastName;
	}

	/**
	 * @return mixed
	 */
	public function getDateOfBirth()
	{
		return $this->dateOfBirth;
	}

	/**
	 * @param mixed $dateOfBirth
	 *
	 * @return User
	 */
	public function setDateOfBirth($dateOfBirth)
	{
		$this->dateOfBirth = $dateOfBirth;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSex() : ?string
	{
		return $this->sex;
	}

	/**
	 * @param string $sex
	 *
	 * @return User
	 */
	public function setSex(string $sex) : User
	{
		$this->sex = $sex;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone() : ?string
	{
		return $this->phone;
	}

	/**
	 * @param string $phone
	 *
	 * @return User
	 */
	public function setPhone(string $phone) : User
	{
		$this->phone = $phone;
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
			$comment->setUser($this);
		}

		return $this;
	}

	public function removeComment(Comment $comment) : self
	{
		if ($this->comment->contains($comment)) {
			$this->comment->removeElement($comment);
			// set the owning side to null (unless already changed)
			if ($comment->getUser() === $this) {
				$comment->setUser(null);
			}
		}

		return $this;
	}
}