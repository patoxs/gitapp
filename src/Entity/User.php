<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="public.user")
 */
class User
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_create;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $gravatar;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commit", mappedBy="id_user")
     */
    private $commits;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Branch", mappedBy="id_user")
     */
    private $branches;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="id_user_creator")
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Merge", mappedBy="id_user")
     */
    private $merges;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamUser", mappedBy="id_user")
     */
    private $teamUsers;

    public function __construct()
    {
        $this->commits = new ArrayCollection();
        $this->branches = new ArrayCollection();
        $this->tasks = new ArrayCollection();
        $this->merges = new ArrayCollection();
        $this->teamUsers = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getGravatar(): ?string
    {
        return $this->gravatar;
    }

    public function setGravatar(string $gravatar): self
    {
        $this->gravatar = $gravatar;

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
     * @return Collection|Commit[]
     */
    public function getCommits(): Collection
    {
        return $this->commits;
    }

    public function addCommit(Commit $commit): self
    {
        if (!$this->commits->contains($commit)) {
            $this->commits[] = $commit;
            $commit->setIdUser($this);
        }

        return $this;
    }

    public function removeCommit(Commit $commit): self
    {
        if ($this->commits->contains($commit)) {
            $this->commits->removeElement($commit);
            // set the owning side to null (unless already changed)
            if ($commit->getIdUser() === $this) {
                $commit->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Branch[]
     */
    public function getBranches(): Collection
    {
        return $this->branches;
    }

    public function addBranch(Branch $branch): self
    {
        if (!$this->branches->contains($branch)) {
            $this->branches[] = $branch;
            $branch->addIdUser($this);
        }

        return $this;
    }

    public function removeBranch(Branch $branch): self
    {
        if ($this->branches->contains($branch)) {
            $this->branches->removeElement($branch);
            $branch->removeIdUser($this);
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
            $task->setIdUserCreator($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getIdUserCreator() === $this) {
                $task->setIdUserCreator(null);
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
            $merge->setIdUser($this);
        }

        return $this;
    }

    public function removeMerge(Merge $merge): self
    {
        if ($this->merges->contains($merge)) {
            $this->merges->removeElement($merge);
            // set the owning side to null (unless already changed)
            if ($merge->getIdUser() === $this) {
                $merge->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TeamUser[]
     */
    public function getTeamUsers(): Collection
    {
        return $this->teamUsers;
    }

    public function addTeamUser(TeamUser $teamUser): self
    {
        if (!$this->teamUsers->contains($teamUser)) {
            $this->teamUsers[] = $teamUser;
            $teamUser->setIdUser($this);
        }

        return $this;
    }

    public function removeTeamUser(TeamUser $teamUser): self
    {
        if ($this->teamUsers->contains($teamUser)) {
            $this->teamUsers->removeElement($teamUser);
            // set the owning side to null (unless already changed)
            if ($teamUser->getIdUser() === $this) {
                $teamUser->setIdUser(null);
            }
        }

        return $this;
    }
}
