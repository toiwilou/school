<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $coefficient;

    /**
     * @ORM\Column(type="integer")
     */
    private $ects;

    /**
     * @ORM\ManyToOne(targetEntity=TeachingUnit::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teachingUnit;

    /**
     * @ORM\ManyToOne(targetEntity=Subject::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subject;

    /**
     * @ORM\OneToMany(targetEntity=Course::class, mappedBy="module", orphanRemoval=true)
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="module")
     */
    private $notes;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoefficient(): ?int
    {
        return $this->coefficient;
    }

    public function setCoefficient(int $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getEcts(): ?int
    {
        return $this->ects;
    }

    public function setEcts(int $ects): self
    {
        $this->ects = $ects;

        return $this;
    }

    public function getTeachingUnit(): ?TeachingUnit
    {
        return $this->teachingUnit;
    }

    public function setTeachingUnit(?TeachingUnit $teachingUnit): self
    {
        $this->teachingUnit = $teachingUnit;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setModule($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getModule() === $this) {
                $course->setModule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setModule($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getModule() === $this) {
                $note->setModule(null);
            }
        }

        return $this;
    }
}
