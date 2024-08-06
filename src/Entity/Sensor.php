<?php

namespace App\Entity;

use App\Repository\SensorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SensorRepository::class)]
class Sensor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    /**
     * @var Collection<int, WineMeasurements>
     */
    #[ORM\OneToMany(targetEntity: WineMeasurements::class, mappedBy: 'SensorID')]
    private Collection $GetMeasurements;

    public function __construct()
    {
        $this->GetMeasurements = new ArrayCollection();
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

    /**
     * @return Collection<int, WineMeasurements>
     */
    public function getGetMeasurements(): Collection
    {
        return $this->GetMeasurements;
    }

    public function addGetMeasurement(WineMeasurements $getMeasurement): static
    {
        if (!$this->GetMeasurements->contains($getMeasurement)) {
            $this->GetMeasurements->add($getMeasurement);
            $getMeasurement->setSensorID($this);
        }

        return $this;
    }

    public function removeGetMeasurement(WineMeasurements $getMeasurement): static
    {
        if ($this->GetMeasurements->removeElement($getMeasurement)) {
            // set the owning side to null (unless already changed)
            if ($getMeasurement->getSensorID() === $this) {
                $getMeasurement->setSensorID(null);
            }
        }

        return $this;
    }
}
