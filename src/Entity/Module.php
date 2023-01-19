<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LevelClass $levelClass = null;

    #[ORM\OneToMany(mappedBy: 'module', targetEntity: Course::class)]
    private Collection $courses;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'modules')]
    private Collection $teacher;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->teacher = new ArrayCollection();
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

    public function getLevelClass(): ?LevelClass
    {
        return $this->levelClass;
    }

    public function setLevelClass(?LevelClass $levelClass): self
    {
        $this->levelClass = $levelClass;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
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
     * @return Collection<int, User>
     */
    public function getTeacher(): Collection
    {
        return $this->teacher;
    }

    public function addTeacher(User $teacher): self
    {
        if (!$this->teacher->contains($teacher)) {
            $this->teacher->add($teacher);
        }

        return $this;
    }

    public function removeTeacher(User $teacher): self
    {
        $this->teacher->removeElement($teacher);

        return $this;
    }
}
