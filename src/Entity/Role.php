<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 * @ORM\Table(name="public.Role")
 */
class Role
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
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
     * @ORM\OneToMany(targetEntity="App\Entity\TeamUser", mappedBy="id_role")
     */
    private $teamUsers;

    public function __construct()
    {
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
            $teamUser->setIdRole($this);
        }

        return $this;
    }

    public function removeTeamUser(TeamUser $teamUser): self
    {
        if ($this->teamUsers->contains($teamUser)) {
            $this->teamUsers->removeElement($teamUser);
            // set the owning side to null (unless already changed)
            if ($teamUser->getIdRole() === $this) {
                $teamUser->setIdRole(null);
            }
        }

        return $this;
    }
}
