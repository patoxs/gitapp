<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BranchRepository")
 */
class Branch
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeBranch", inversedBy="branches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_type_branch;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="branches")
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="id_branch")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="id_branch")
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Merge", mappedBy="id_branch_merge")
     */
    private $branchmerge;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Merge", mappedBy="id_branch_task")
     */
    private $branchtask;

    public function __construct()
    {
        $this->id_user = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->tasks = new ArrayCollection();
        $this->branchmerge = new ArrayCollection();
        $this->branchtask = new ArrayCollection();
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

    public function getIdTypeBranch(): ?TypeBranch
    {
        return $this->id_type_branch;
    }

    public function setIdTypeBranch(?TypeBranch $id_type_branch): self
    {
        $this->id_type_branch = $id_type_branch;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUser(): Collection
    {
        return $this->id_user;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->id_user->contains($idUser)) {
            $this->id_user[] = $idUser;
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->id_user->contains($idUser)) {
            $this->id_user->removeElement($idUser);
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setIdBranch($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getIdBranch() === $this) {
                $project->setIdBranch(null);
            }
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
            $task->setIdBranch($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getIdBranch() === $this) {
                $task->setIdBranch(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Merge[]
     */
    public function getBranchmerge(): Collection
    {
        return $this->branchmerge;
    }

    public function addBranchmerge(Merge $branchmerge): self
    {
        if (!$this->branchmerge->contains($branchmerge)) {
            $this->branchmerge[] = $branchmerge;
            $branchmerge->setIdBranchMerge($this);
        }

        return $this;
    }

    public function removeBranchmerge(Merge $branchmerge): self
    {
        if ($this->branchmerge->contains($branchmerge)) {
            $this->branchmerge->removeElement($branchmerge);
            // set the owning side to null (unless already changed)
            if ($branchmerge->getIdBranchMerge() === $this) {
                $branchmerge->setIdBranchMerge(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Merge[]
     */
    public function getBranchtask(): Collection
    {
        return $this->branchtask;
    }

    public function addBranchtask(Merge $branchtask): self
    {
        if (!$this->branchtask->contains($branchtask)) {
            $this->branchtask[] = $branchtask;
            $branchtask->setIdBranchTask($this);
        }

        return $this;
    }

    public function removeBranchtask(Merge $branchtask): self
    {
        if ($this->branchtask->contains($branchtask)) {
            $this->branchtask->removeElement($branchtask);
            // set the owning side to null (unless already changed)
            if ($branchtask->getIdBranchTask() === $this) {
                $branchtask->setIdBranchTask(null);
            }
        }

        return $this;
    }
}
