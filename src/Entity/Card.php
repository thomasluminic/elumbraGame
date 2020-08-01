<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $attack;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $retaliation;

    /**
     * @ORM\Column(type="integer")
     */
    private $lifePoint;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $extension;

    /**
     * @ORM\ManyToOne(targetEntity=CardType::class, inversedBy="cards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $card_type;

    /**
     * @ORM\ManyToOne(targetEntity=Faction::class, inversedBy="cards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $faction;

    /**
     * @ORM\ManyToOne(targetEntity=Placement::class, inversedBy="cards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $placement;

    /**
     * @ORM\ManyToOne(targetEntity=Rarity::class, inversedBy="cards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rarity;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="cards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

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

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(?int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getRetaliation(): ?int
    {
        return $this->retaliation;
    }

    public function setRetaliation(?int $retaliation): self
    {
        $this->retaliation = $retaliation;

        return $this;
    }

    public function getLifePoint(): ?int
    {
        return $this->lifePoint;
    }

    public function setLifePoint(int $lifePoint): self
    {
        $this->lifePoint = $lifePoint;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getCardType(): ?CardType
    {
        return $this->card_type;
    }

    public function setCardType(?CardType $card_type): self
    {
        $this->card_type = $card_type;

        return $this;
    }

    public function getFaction(): ?Faction
    {
        return $this->faction;
    }

    public function setFaction(?Faction $faction): self
    {
        $this->faction = $faction;

        return $this;
    }

    public function getPlacement(): ?Placement
    {
        return $this->placement;
    }

    public function setPlacement(?Placement $placement): self
    {
        $this->placement = $placement;

        return $this;
    }

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(?Rarity $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
