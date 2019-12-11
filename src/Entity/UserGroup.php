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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\News", mappedBy="user_group")
     */
    private $news;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Member", mappedBy="userGroup")
     */
    private $members;

    public function __construct()
    {
        $this->userGroupHasUsers = new ArrayCollection();
        $this->news = new ArrayCollection();
        $this->members = new ArrayCollection();
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

    /**
     * @return Collection|News[]
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): self
    {
        if (!$this->news->contains($news)) {
            $this->news[] = $news;
            $news->setUserGroup($this);
        }

        return $this;
    }

    public function removeNews(News $news): self
    {
        if ($this->news->contains($news)) {
            $this->news->removeElement($news);
            // set the owning side to null (unless already changed)
            if ($news->getUserGroup() === $this) {
                $news->setUserGroup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setUserGroup($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getUserGroup() === $this) {
                $member->setUserGroup(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getName();
    }
}
