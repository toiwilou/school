<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevelRepository::class)
 */
class Level
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="levels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="level")
     */
    private $students;

    /**
     * @ORM\OneToMany(targetEntity=TeachingUnit::class, mappedBy="level", orphanRemoval=true)
     */
    private $teachingUnits;

    /**
     * @ORM\OneToMany(targetEntity=StudentTemporary::class, mappedBy="level")
     */
    private $studentTemporaries;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->teachingUnits = new ArrayCollection();
        $this->studentTemporaries = new ArrayCollection();
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

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setLevel($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getLevel() === $this) {
                $student->setLevel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TeachingUnit[]
     */
    public function getTeachingUnits(): Collection
    {
        return $this->teachingUnits;
    }

    public function addTeachingUnit(TeachingUnit $teachingUnit): self
    {
        if (!$this->teachingUnits->contains($teachingUnit)) {
            $this->teachingUnits[] = $teachingUnit;
            $teachingUnit->setLevel($this);
        }

        return $this;
    }

    public function removeTeachingUnit(TeachingUnit $teachingUnit): self
    {
        if ($this->teachingUnits->removeElement($teachingUnit)) {
            // set the owning side to null (unless already changed)
            if ($teachingUnit->getLevel() === $this) {
                $teachingUnit->setLevel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StudentTemporary[]
     */
    public function getStudentTemporaries(): Collection
    {
        return $this->studentTemporaries;
    }

    public function addStudentTemporary(StudentTemporary $studentTemporary): self
    {
        if (!$this->studentTemporaries->contains($studentTemporary)) {
            $this->studentTemporaries[] = $studentTemporary;
            $studentTemporary->setLevel($this);
        }

        return $this;
    }

    public function removeStudentTemporary(StudentTemporary $studentTemporary): self
    {
        if ($this->studentTemporaries->removeElement($studentTemporary)) {
            // set the owning side to null (unless already changed)
            if ($studentTemporary->getLevel() === $this) {
                $studentTemporary->setLevel(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
