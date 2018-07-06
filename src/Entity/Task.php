<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Incidence", inversedBy="tasks")
     */
    private $id_incidence;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tasktype", inversedBy="tasks")
     */
    private $id_tasktype;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Priority", inversedBy="tasks")
     */
    private $id_priority;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="tasks")
     */
    private $id_project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tasks")
     */
    private $id_user_creator;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="tasks")
     */
    private $id_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_create;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_end;

    /**
     * @ORM\Column(type="integer")
     */
    private $estimated_hours;

    /**
     * @ORM\Column(type="boolean")
     */
    private $email_notify_user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $email_notify_team;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="tasks")
     */
    private $id_branch;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="tasksfather")
     */
    private $id_task_father;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commit", inversedBy="tasks")
     */
    private $id_commit;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="tasks")
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\File", mappedBy="id_task")
     */
    private $files;

    public function __construct()
    {
        $this->id_user = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getIdIncidence(): ?Incidence
    {
        return $this->id_incidence;
    }

    public function setIdIncidence(?Incidence $id_incidence): self
    {
        $this->id_incidence = $id_incidence;

        return $this;
    }

    public function getIdTasktype(): ?Tasktype
    {
        return $this->id_tasktype;
    }

    public function setIdTasktype(?Tasktype $id_tasktype): self
    {
        $this->id_tasktype = $id_tasktype;

        return $this;
    }

    public function getIdPriority(): ?Priority
    {
        return $this->id_priority;
    }

    public function setIdPriority(?Priority $id_priority): self
    {
        $this->id_priority = $id_priority;

        return $this;
    }

    public function getIdProject(): ?Project
    {
        return $this->id_project;
    }

    public function setIdProject(?Project $id_project): self
    {
        $this->id_project = $id_project;

        return $this;
    }

    public function getIdUserCreator(): ?User
    {
        return $this->id_user_creator;
    }

    public function setIdUserCreator(?User $id_user_creator): self
    {
        $this->id_user_creator = $id_user_creator;

        return $this;
    }

    public function getIdStatus(): ?Status
    {
        return $this->id_status;
    }

    public function setIdStatus(?Status $id_status): self
    {
        $this->id_status = $id_status;

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

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getEstimatedHours(): ?int
    {
        return $this->estimated_hours;
    }

    public function setEstimatedHours(int $estimated_hours): self
    {
        $this->estimated_hours = $estimated_hours;

        return $this;
    }

    public function getEmailNotifyUser(): ?bool
    {
        return $this->email_notify_user;
    }

    public function setEmailNotifyUser(bool $email_notify_user): self
    {
        $this->email_notify_user = $email_notify_user;

        return $this;
    }

    public function getEmailNotifyTeam(): ?bool
    {
        return $this->email_notify_team;
    }

    public function setEmailNotifyTeam(bool $email_notify_team): self
    {
        $this->email_notify_team = $email_notify_team;

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

    public function getIdBranch(): ?Branch
    {
        return $this->id_branch;
    }

    public function setIdBranch(?Branch $id_branch): self
    {
        $this->id_branch = $id_branch;

        return $this;
    }

    public function getIdTaskFather(): ?self
    {
        return $this->id_task_father;
    }

    public function setIdTaskFather(?self $id_task_father): self
    {
        $this->id_task_father = $id_task_father;

        return $this;
    }

    public function getIdCommit(): ?Commit
    {
        return $this->id_commit;
    }

    public function setIdCommit(?Commit $id_commit): self
    {
        $this->id_commit = $id_commit;

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
            $file->setIdTask($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->contains($file)) {
            $this->files->removeElement($file);
            // set the owning side to null (unless already changed)
            if ($file->getIdTask() === $this) {
                $file->setIdTask(null);
            }
        }

        return $this;
    }
}
