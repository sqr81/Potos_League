<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserGroupRepository")
 */
class UserGroup
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserGroupHasUser", mappedBy="userGroup")
     */
    private $userGroupHasUsers;

    public function __construct()
    {
        $this->userGroupHasUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|UserGroupHasUser[]
     */
    public function getUserGroupHasUsers(): Collection
    {
        return $this->userGroupHasUsers;
    }

    public function addUserGroupHasUser(UserGroupHasUser $userGroupHasUser): self
    {
        if (!$this->userGroupHasUsers->contains($userGroupHasUser)) {
            $this->userGroupHasUsers[] = $userGroupHasUser;
            $userGroupHasUser->setUserGroup($this);
        }

        return $this;
    }

    public function removeUserGroupHasUser(UserGroupHasUser $userGroupHasUser): self
    {
        if ($this->userGroupHasUsers->contains($userGroupHasUser)) {
            $this->userGroupHasUsers->removeElement($userGroupHasUser);
            // set the owning side to null (unless already changed)
            if ($userGroupHasUser->getUserGroup() === $this) {
                $userGroupHasUser->setUserGroup(null);
            }
        }

        return $this;
    }
}
