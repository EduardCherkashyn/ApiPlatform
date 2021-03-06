<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\CreateList;

/**
 *
 * Secured resource
 * @ORM\Entity(repositoryClass="App\Repository\CheckListRepository")
 * @ApiResource(routePrefix="/api",denormalizationContext={"groups"={"write"}},
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *      "get"={"method"="GET"},
 *       "post"={"access_control"="is_granted('ROLE_USER')", "controller"=CreateList::class, "access_control_message"="Only admins can add list."}},
 *     itemOperations={
 *         "get"={"access_control"="is_granted('ROLE_USER') and object.user == user", "access_control_message"="Sorry, but you are not the list owner."},
 *          "put"={"method"="PUT"},
 *          "delete"={"method"="DELETE"}
 *     }
 * )
 */
class CheckList implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @var User The user
     *
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="checkLists")
     * @ORM\JoinColumn(nullable=false)
     */
    public $user;

    /**
     * @Groups("write")
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="15" )
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="checkList", cascade={"persist"})
     */
    private $items;

    /**
     * @Groups("write")
     * @Assert\Date()
     * @ORM\Column(type="string")
     */
    private $expire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Label", mappedBy="checklists")
     */
    private $labels;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->labels = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'items'=> $this->getItems(),
            'expire' => $this->getExpire()
        ];
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

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setCheckList($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            // set the owning side to null (unless already changed)
            if ($item->getCheckList() === $this) {
                $item->setCheckList(null);
            }
        }

        return $this;
    }

    public function getExpire(): string
    {
        return $this->expire;
    }

    public function setExpire(string $expire): self
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * @return Collection|Label[]
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): self
    {
        if (!$this->labels->contains($label)) {
            $this->labels[] = $label;
            $label->addChecklist($this);
        }

        return $this;
    }

    public function removeLabel(Label $label): self
    {
        if ($this->labels->contains($label)) {
            $this->labels->removeElement($label);
            $label->removeChecklist($this);
        }

        return $this;
    }
}
