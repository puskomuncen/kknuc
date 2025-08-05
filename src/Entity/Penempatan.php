<?php

namespace PHPMaker2025\kkndanpkl\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2025\kkndanpkl\AdvancedUserInterface;
use PHPMaker2025\kkndanpkl\AbstractEntity;
use PHPMaker2025\kkndanpkl\AdvancedSecurity;
use PHPMaker2025\kkndanpkl\UserProfile;
use PHPMaker2025\kkndanpkl\UserRepository;
use function PHPMaker2025\kkndanpkl\Config;
use function PHPMaker2025\kkndanpkl\EntityManager;
use function PHPMaker2025\kkndanpkl\RemoveXss;
use function PHPMaker2025\kkndanpkl\HtmlDecode;
use function PHPMaker2025\kkndanpkl\HashPassword;
use function PHPMaker2025\kkndanpkl\Security;

/**
 * Entity class for "penempatan" table
 */

#[Entity]
#[Table("penempatan", options: ["dbId" => "DB"])]
class Penempatan extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_penempatan", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdPenempatan;

    #[Column(name: "id_pendaftaran", type: "integer", nullable: true)]
    private ?int $IdPendaftaran;

    #[Column(name: "id_instansi", type: "integer", nullable: true)]
    private ?int $IdInstansi;

    #[Column(name: "dosen_pembimbing", type: "string", nullable: true)]
    private ?string $DosenPembimbing;

    #[Column(name: "status", type: "string", nullable: true)]
    private ?string $Status;

    public function getIdPenempatan(): int
    {
        return $this->IdPenempatan;
    }

    public function setIdPenempatan(int $value): static
    {
        $this->IdPenempatan = $value;
        return $this;
    }

    public function getIdPendaftaran(): ?int
    {
        return $this->IdPendaftaran;
    }

    public function setIdPendaftaran(?int $value): static
    {
        $this->IdPendaftaran = $value;
        return $this;
    }

    public function getIdInstansi(): ?int
    {
        return $this->IdInstansi;
    }

    public function setIdInstansi(?int $value): static
    {
        $this->IdInstansi = $value;
        return $this;
    }

    public function getDosenPembimbing(): ?string
    {
        return HtmlDecode($this->DosenPembimbing);
    }

    public function setDosenPembimbing(?string $value): static
    {
        $this->DosenPembimbing = RemoveXss($value);
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(?string $value): static
    {
        if (!in_array($value, ["Aktif", "Selesai"])) {
            throw new \InvalidArgumentException("Invalid 'status' value");
        }
        $this->Status = $value;
        return $this;
    }
}
