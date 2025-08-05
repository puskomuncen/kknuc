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
 * Entity class for "pendaftaran" table
 */

#[Entity]
#[Table("pendaftaran", options: ["dbId" => "DB"])]
class Pendaftaran extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_pendaftaran", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdPendaftaran;

    #[Column(name: "nim", type: "string", nullable: true)]
    private ?string $Nim;

    #[Column(name: "id_kegiatan", type: "integer", nullable: true)]
    private ?int $IdKegiatan;

    #[Column(name: "status", type: "string", nullable: true)]
    private ?string $Status;

    #[Column(name: "tanggal_daftar", type: "date", nullable: true)]
    private ?DateTime $TanggalDaftar;

    public function getIdPendaftaran(): int
    {
        return $this->IdPendaftaran;
    }

    public function setIdPendaftaran(int $value): static
    {
        $this->IdPendaftaran = $value;
        return $this;
    }

    public function getNim(): ?string
    {
        return HtmlDecode($this->Nim);
    }

    public function setNim(?string $value): static
    {
        $this->Nim = RemoveXss($value);
        return $this;
    }

    public function getIdKegiatan(): ?int
    {
        return $this->IdKegiatan;
    }

    public function setIdKegiatan(?int $value): static
    {
        $this->IdKegiatan = $value;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(?string $value): static
    {
        if (!in_array($value, ["Diajukan", "Disetujui", "Ditolak"])) {
            throw new \InvalidArgumentException("Invalid 'status' value");
        }
        $this->Status = $value;
        return $this;
    }

    public function getTanggalDaftar(): ?DateTime
    {
        return $this->TanggalDaftar;
    }

    public function setTanggalDaftar(?DateTime $value): static
    {
        $this->TanggalDaftar = $value;
        return $this;
    }
}
