<?php

namespace App\Entity;

use App\Repository\CpuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Ignore;

#[ORM\Entity(repositoryClass: CpuRepository::class)]
class Cpu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $cores = null;

    /**
     * @var Collection<int, Computers>
     */
    #[ORM\OneToMany(targetEntity: Computers::class, mappedBy: 'cpu')]
    #[Ignore]
    private Collection $computers;

    public function __construct()
    {
        $this->computers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCores(): ?int
    {
        return $this->cores;
    }

    public function setCores(int $cores): static
    {
        $this->cores = $cores;

        return $this;
    }

    /**
     * @return Collection<int, Computers>
     */
    public function getComputers(): Collection
    {
        return $this->computers;
    }

    public function addComputer(Computers $computer): static
    {
        if (!$this->computers->contains($computer)) {
            $this->computers->add($computer);
            $computer->setCpuId($this);
        }

        return $this;
    }

    public function removeComputer(Computers $computer): static
    {
        if ($this->computers->removeElement($computer)) {
            // set the owning side to null (unless already changed)
            if ($computer->getCpuId() === $this) {
                $computer->setCpuId(null);
            }
        }

        return $this;
    }
}
