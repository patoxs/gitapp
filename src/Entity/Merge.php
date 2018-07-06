<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MergeRepository")
 */
class Merge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="branchmerge")
     */
    private $id_branch_merge;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="branchtask")
     */
    private $id_branch_task;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="merges")
     */
    private $id_project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="merges")
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeBranch", inversedBy="merges")
     */
    private $id_type_branch;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function getIdBranchMerge(): ?Branch
    {
        return $this->id_branch_merge;
    }

    public function setIdBranchMerge(?Branch $id_branch_merge): self
    {
        $this->id_branch_merge = $id_branch_merge;

        return $this;
    }

    public function getIdBranchTask(): ?Branch
    {
        return $this->id_branch_task;
    }

    public function setIdBranchTask(?Branch $id_branch_task): self
    {
        $this->id_branch_task = $id_branch_task;

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

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
