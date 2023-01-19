<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'departments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Faculty $faculty = null;

    #[ORM\OneToMany(mappedBy: 'department', targetEntity: Discipline::class, orphanRemoval: true)]
    private Collection $disciplines;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $head_department = null;

    public function __construct()
    {
        $this->disciplines = new ArrayCollection();
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

    public function getFaculty(): ?Faculty
    {
        return $this->faculty;
    }

    public function setFaculty(?Faculty $faculty): self
    {
        $this->faculty = $faculty;

        return $this;
    }

    /**
     * @return Collection<int, Discipline>
     */
    public function getDisciplines(): Collection
    {
        return $this->disciplines;
    }

    public function addDiscipline(Discipline $discipline): self
    {
        if (!$this->disciplines->contains($discipline)) {
            $this->disciplines->add($discipline);
            $discipline->setDepartment($this);
        }

        return $this;
    }

    public function removeDiscipline(Discipline $discipline): self
    {
        if ($this->disciplines->removeElement($discipline)) {
            // set the owning side to null (unless already changed)
            if ($discipline->getDepartment() === $this) {
                $discipline->setDepartment(null);
            }
        }

        return $this;
    }

    public function getHeadDepartment(): ?User
    {
        return $this->head_department;
    }

    public function setHeadDepartment(User $head_department): self
    {
        $this->head_department = $head_department;

        return $this;
    }
}
