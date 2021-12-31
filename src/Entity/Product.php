<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Any offered product or service. For example: a pair of shoes; a concert ticket; the rental of a car; a haircut; or an episode of a TV show streamed online.
 *
 * @see https://schema.org/Product
 */
#[ORM\Entity]
#[ApiResource(iri: 'https://schema.org/Product')]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * The name of the item.
     *
     * @see https://schema.org/name
     */
    #[ORM\Column(type: 'text')]
    #[ApiProperty(iri: 'https://schema.org/name')]
    #[Assert\NotNull]
    private string $name;

    /**
     * A description of the item.
     *
     * @see https://schema.org/description
     */
    #[ORM\Column(type: 'text')]
    #[ApiProperty(iri: 'https://schema.org/description')]
    #[Assert\NotNull]
    private string $description;

    /**
     * @var Text|null An image of the item. This can be a \[\[URL\]\] or a fully described \[\[ImageObject\]\].
     *
     * @see https://schema.org/image
     */
    #[ApiProperty(iri: 'https://schema.org/image')]
    private $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param Text|null $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return Text|null
     */
    public function getImage()
    {
        return $this->image;
    }
}
