<?php

namespace App\Entity;

use App\Repository\AlumnosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnosRepository::class)]
class Alumnos
{
    

    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $nif = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechanac = null;

    #[ORM\Column]
    private ?bool $pagado = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $importe = null;

    #[ORM\ManyToOne(inversedBy: 'alumnos')]
    #[ORM\JoinColumn(name: "docentes_nif", referencedColumnName: "nif", nullable: false)]
    private ?Docentes $docentes_nif = null;

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

    public function getfechanac(): ?\DateTimeInterface
    {
        return $this->fechanac;
    }

    public function setfechanac(\DateTimeInterface $fechanac): static
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    public function isPagado(): ?bool
    {
        return $this->pagado;
    }

    public function setPagado(bool $pagado): static
    {
        $this->pagado = $pagado;

        return $this;
    }

    public function getImporte(): ?string
    {
        return $this->importe;
    }

    public function setImporte(string $importe): static
    {
        $this->importe = $importe;

        return $this;
    }

    public function getDocentesNif(): ?Docentes
    {
        return $this->docentes_nif;
    }

    public function setDocentesNif(?Docentes $docentes_nif): static
    {
        $this->docentes_nif = $docentes_nif;

        return $this;
    }
}
