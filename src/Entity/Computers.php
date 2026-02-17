<?php

namespace App\Entity;

use App\Repository\ComputersRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Cpu as cpu;

#[ORM\Entity(repositoryClass: ComputersRepository::class)]
class Computers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\ManyToOne(inversedBy: 'computers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?cpu $cpu = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpu(): ?cpu
    {
        return $this->cpu;
    }

    public function setCpu(?cpu $cpu): static
    {
        $this->cpu = $cpu;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }
}
