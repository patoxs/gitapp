<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $short_name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="projects")
     */
    private $id_branch;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $color;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", inversedBy="projects")
     */
    private $id_team;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="id_project")
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Merge", mappedBy="id_project")
     */
    private $merges;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\File", mappedBy="id_project")
     */
    private $files;

    public function __construct()
    {
        $this->id_team = new ArrayCollection();
        $this->tasks = new ArrayCollection();
        $this->merges = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId()
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

    public function getShortName(): ?string
    {
        return $this->short_name;
    }

    public function setShortName(string $short_name): self
    {
        $this->short_name = $short_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdBranch(): ?Branch
    {
        return $this->id_branch;
    }

    public function setIdBranch(?Branch $id_branch): self
    {
        $this->id_branch = $id_branch;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getIdTeam(): Collection
    {
        return $this->id_team;
    }

    public function addIdTeam(Team $idTeam): self
    {
        if (!$this->id_team->contains($idTeam)) {
            $this->id_team[] = $idTeam;
        }

        return $this;
    }

    public function removeIdTeam(Team $idTeam): self
    {
        if ($this->id_team->contains($idTeam)) {
            $this->id_team->removeElement($idTeam);
        }

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setIdProject($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getIdProject() === $this) {
                $task->setIdProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Merge[]
     */
    public function getMerges(): Collection
    {
        return $this->merges;
    }

    public function addMerge(Merge $merge): self
    {
        if (!$this->merges->contains($merge)) {
            $this->merges[] = $merge;
            $merge->setIdProject($this);
        }

        return $this;
    }

    public function removeMerge(Merge $merge): self
    {
        if ($this->merges->contains($merge)) {
            $this->merges->removeElement($merge);
            // set the owning side to null (unless already changed)
            if ($merge->getIdProject() === $this) {
                $merge->setIdProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setIdProject($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->contains($file)) {
            $this->files->removeElement($file);
            // set the owning side to null (unless already changed)
            if ($file->getIdProject() === $this) {
                $file->setIdProject(null);
            }
        }

        return $this;
    }
}
