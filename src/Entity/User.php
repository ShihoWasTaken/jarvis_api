<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class User
{
    /**
     * @var int $id L'id de l'utilisateur
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $firstname Le prénom de l'utilisateur
     *
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank
     */
    public $firstname;

    /**
     * @var string $lastname Le nom de l'utilisateur
     *
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank
     */
    public $lastname;

    /**
     * @var \DateTime $creationdate La date d'inscription de l'utilisateur - Générée automatiquement à l'insert en BDD
     *
     * @ORM\Column(type="datetime", nullable=false)
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *             "readOnly"=true,
     *             "required"=false
     *         }
     *     })
     */
    public $creationdate;

    /**
     * @var \DateTime $updatedate La date de mise à jour de l'utilisateur - Mise à jour automatiquement lors d'un update et à la création
     *
     * @ORM\Column(type="datetime", nullable=false)
     *
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *             "readOnly"=true,
     *             "required"=false
     *         }
     *     })
     */
    public $updatedate;

    /**
     * @ORM\PrePersist
     */
    public function setCreationDate(): void
    {
        $this->creationdate = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate()
     */
    public function setUpdateDate(): void
    {
        $this->updatedate = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
