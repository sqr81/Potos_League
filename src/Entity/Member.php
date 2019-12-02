<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */
class Member
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $team;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NflTeam", inversedBy="members")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nflTeam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserGroup", inversedBy="members")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userGroup;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Score", mappedBy="home")
     */
    private $scoresHome;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Score", mappedBy="away")
     */
    private $scoresAway;

    public function __construct()
    {
        $this->scoresHome = new ArrayCollection();
        $this->scoresAway = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(string $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getNflTeam(): ?NflTeam
    {
        return $this->nflTeam;
    }

    public function setNflTeam(?NflTeam $nflTeam): self
    {
        $this->nflTeam = $nflTeam;

        return $this;
    }

    public function getUserGroup(): ?UserGroup
    {
        return $this->userGroup;
    }

    public function setUserGroup(?UserGroup $userGroup): self
    {
        $this->userGroup = $userGroup;

        return $this;
    }

    /**
     * @return Collection|Score[]
     */
    public function getScoresHome(): Collection
    {
        return $this->scoresHome;
    }

    public function addScoresHome(Score $scoresHome): self
    {
        if (!$this->scoresHome->contains($scoresHome)) {
            $this->scoresHome[] = $scoresHome;
            $scoresHome->setHome($this);
        }

        return $this;
    }

    public function removeScoresHome(Score $scoresHome): self
    {
        if ($this->scoresHome->contains($scoresHome)) {
            $this->scoresHome->removeElement($scoresHome);
            // set the owning side to null (unless already changed)
            if ($scoresHome->getHome() === $this) {
                $scoresHome->setHome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Score[]
     */
    public function getScoresAway(): Collection
    {
        return $this->scoresAway;
    }

    public function addScoresAway(Score $scoresAway): self
    {
        if (!$this->scoresAway->contains($scoresAway)) {
            $this->scoresAway[] = $scoresAway;
            $scoresAway->setAway($this);
        }

        return $this;
    }

    public function removeScoresAway(Score $scoresAway): self
    {
        if ($this->scoresAway->contains($scoresAway)) {
            $this->scoresAway->removeElement($scoresAway);
            // set the owning side to null (unless already changed)
            if ($scoresAway->getAway() === $this) {
                $scoresAway->setAway(null);
            }
        }

        return $this;
    }
}
