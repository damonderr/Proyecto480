<?php

namespace App\Entity;

use App\Repository\WineMeasurementsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WineMeasurementsRepository::class)]
class WineMeasurements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $Year = null;

    #[ORM\ManyToOne(inversedBy: 'GetMeasurements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sensor $SensorID = null;

    #[ORM\ManyToOne(inversedBy: 'GetProperties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Wine $WineID = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Color = null;

    #[ORM\Column(nullable: true)]
    private ?int $Temperature = null;

    #[ORM\Column(nullable: true)]
    private ?int $AlcoholContent = null;

    #[ORM\Column(nullable: true)]
    private ?int $PH = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(?int $Year): static
    {
        $this->Year = $Year;

        return $this;
    }

    public function getSensorID(): ?Sensor
    {
        return $this->SensorID;
    }

    public function setSensorID(?Sensor $SensorID): static
    {
        $this->SensorID = $SensorID;

        return $this;
    }

    public function getWineID(): ?Wine
    {
        return $this->WineID;
    }

    public function setWineID(?Wine $WineID): static
    {
        $this->WineID = $WineID;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->Color;
    }

    public function setColor(?string $Color): static
    {
        $this->Color = $Color;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->Temperature;
    }

    public function setTemperature(?int $Temperature): static
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getAlcoholContent(): ?int
    {
        return $this->AlcoholContent;
    }

    public function setAlcoholContent(?int $AlcoholContent): static
    {
        $this->AlcoholContent = $AlcoholContent;

        return $this;
    }

    public function getPH(): ?int
    {
        return $this->PH;
    }

    public function setPH(?int $PH): static
    {
        $this->PH = $PH;

        return $this;
    }
}
