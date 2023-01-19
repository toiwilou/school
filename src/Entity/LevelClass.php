<?php

namespace App\Entity;

use App\Repository\LevelClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LevelClassRepository::class)]
class LevelClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    #[ORM\ManyToOne(inversedBy: 'levelClasses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Discipline $discipline = null;

    #[ORM\OneToMany(mappedBy: 'levelClass', targetEntity: Module::class, orphanRemoval: true)]
    private Collection $modules;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'levelClasses')]
    private Collection $teacher;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->teacher = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(?Discipline $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules->add($module);
            $module->setLevelClass($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->modules->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getLevelClass() === $this) {
                $module->setLevelClass(null);
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
