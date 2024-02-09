<?php

namespace App\Entity;

use App\Repository\DocentesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocentesRepository::class)]
class Docentes
{

    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $nif = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $edad = null;

    #[ORM\OneToMany(targetEntity: Alumnos::class, mappedBy: 'docentes_nif')]
    private Collection $alumnos;

    public function __construct()
    {
        $this->alumnos = new ArrayCollection();
    }


    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): static
    {
        $this->nif = $nif;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(?int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * @return Collection<int, Alumnos>
     */
    public function getAlumnos(): Collection
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumnos $alumno): static
    {
        if (!$this->alumnos->contains($alumno)) {
            $this->alumnos->add($alumno);
            $alumno->setDocentesNif($this);
        }

        return $this;
    }

    public function removeAlumno(Alumnos $alumno): static
    {
        if ($this->alumnos->removeElement($alumno)) {
            // set the owning side to null (unless already changed)
            if ($alumno->getDocentesNif() === $this) {
                $alumno->setDocentesNif(null);
            }
        }

        return $this;
    }
}
