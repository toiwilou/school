<?php

namespace App\Entity;

use App\Repository\DisciplineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplineRepository::class)]
class Discipline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'disciplines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Department $department = null;

    #[ORM\OneToMany(mappedBy: 'discipline', targetEntity: LevelClass::class, orphanRemoval: true)]
    private Collection $levelClasses;

    public function __construct()
    {
        $this->levelClasses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return Collection<int, LevelClass>
     */
    public function getLevelClasses(): Collection
    {
        return $this->levelClasses;
    }

    public function addLevelClass(LevelClass $levelClass): self
    {
        if (!$this->levelClasses->contains($levelClass)) {
            $this->levelClasses->add($levelClass);
            $levelClass->setDiscipline($this);
        }

        return $this;
    }

    public function removeLevelClass(LevelClass $levelClass): self
    {
        if ($this->levelClasses->removeElement($levelClass)) {
            // set the owning side to null (unless already changed)
            if ($levelClass->getDiscipline() === $this) {
                $levelClass->setDiscipline(null);
            }
        }

        return $this;
    }
}
