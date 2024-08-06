<?php

namespace App\Entity;

use App\Repository\WineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WineRepository::class)]
class Wine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $Year = null;

    /**
     * @var Collection<int, WineMeasurements>
     */
    #[ORM\OneToMany(targetEntity: WineMeasurements::class, mappedBy: 'WineID')]
    private Collection $GetProperties;

    public function __construct()
    {
        $this->GetProperties = new ArrayCollection();
    }

    
  


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): static
    {
        $this->Year = $Year;

        return $this;
    }

    /**
     * @return Collection<int, WineMeasurements>
     */
    public function getGetProperties(): Collection
    {
        return $this->GetProperties;
    }

    public function addGetProperty(WineMeasurements $getProperty): static
    {
        if (!$this->GetProperties->contains($getProperty)) {
            $this->GetProperties->add($getProperty);
            $getProperty->setWineID($this);
        }

        return $this;
    }

    public function removeGetProperty(WineMeasurements $getProperty): static
    {
        if ($this->GetProperties->removeElement($getProperty)) {
            // set the owning side to null (unless already changed)
            if ($getProperty->getWineID() === $this) {
                $getProperty->setWineID(null);
            }
        }

        return $this;
    }


}
