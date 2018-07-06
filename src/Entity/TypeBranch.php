<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeBranchRepository")
 */
class TypeBranch
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
    private $type_branch;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Branch", mappedBy="id_type_branch")
     */
    private $branches;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Merge", mappedBy="id_type_branch")
     */
    private $merges;

    public function __construct()
    {
        $this->branches = new ArrayCollection();
        $this->merges = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTypeBranch(): ?string
    {
        return $this->type_branch;
    }

    public function setTypeBranch(string $type_branch): self
    {
        $this->type_branch = $type_branch;

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
            $branch->setIdTypeBranch($this);
        }

        return $this;
    }

    public function removeBranch(Branch $branch): self
    {
        if ($this->branches->contains($branch)) {
            $this->branches->removeElement($branch);
            // set the owning side to null (unless already changed)
            if ($branch->getIdTypeBranch() === $this) {
                $branch->setIdTypeBranch(null);
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
            $merge->setIdTypeBranch($this);
        }

        return $this;
    }

    public function removeMerge(Merge $merge): self
    {
        if ($this->merges->contains($merge)) {
            $this->merges->removeElement($merge);
            // set the owning side to null (unless already changed)
            if ($merge->getIdTypeBranch() === $this) {
                $merge->setIdTypeBranch(null);
            }
        }

        return $this;
    }
}
