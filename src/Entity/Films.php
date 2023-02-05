<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FilmsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
#[ApiResource]
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $episode_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): ?int
    {
        return $this->episode_id;
    }

    public function setEpisodeId(int $episode_id): self
    {
        $this->episode_id = $episode_id;

        return $this;
    }
}
