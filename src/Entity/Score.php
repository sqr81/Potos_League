<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
 */
class Score
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $week;

    /**
     * @ORM\Column(type="bigint")
     */

    private $score1;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $score2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Season", inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $season;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="scoresHome")
     * @ORM\JoinColumn(nullable=false)
     */
    private $home;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="scoresAway")
     * @ORM\JoinColumn(nullable=false)
     */
    private $away;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(int $week): self
    {
        $this->week = $week;

        return $this;
    }

    public function getScore1(): ?string
    {
        return $this->score1;
    }

    public function setScore1(string $score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?string
    {
        return $this->score2;
    }

    public function setScore2(string $score2): self
    {
        $this->score2 = $score2;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getHome(): ?Member
    {
        return $this->home;
    }

    public function setHome(?Member $home): self
    {
        $this->home = $home;

        return $this;
    }

    public function getAway(): ?Member
    {
        return $this->away;
    }

    public function setAway(?Member $away): self
    {
        $this->away = $away;

        return $this;
    }
}
