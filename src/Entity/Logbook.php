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
 * Entity class for "logbook" table
 */

#[Entity]
#[Table("logbook", options: ["dbId" => "DB"])]
class Logbook extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_logbook", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdLogbook;

    #[Column(name: "id_penempatan", type: "integer", nullable: true)]
    private ?int $IdPenempatan;

    #[Column(name: "tanggal", type: "date", nullable: true)]
    private ?DateTime $Tanggal;

    #[Column(name: "kegiatan", type: "text", nullable: true)]
    private ?string $Kegiatan;

    #[Column(name: "validasi_dosen", type: "boolean", nullable: true)]
    private ?bool $ValidasiDosen;

    public function __construct()
    {
        $this->ValidasiDosen = false;
    }

    public function getIdLogbook(): int
    {
        return $this->IdLogbook;
    }

    public function setIdLogbook(int $value): static
    {
        $this->IdLogbook = $value;
        return $this;
    }

    public function getIdPenempatan(): ?int
    {
        return $this->IdPenempatan;
    }

    public function setIdPenempatan(?int $value): static
    {
        $this->IdPenempatan = $value;
        return $this;
    }

    public function getTanggal(): ?DateTime
    {
        return $this->Tanggal;
    }

    public function setTanggal(?DateTime $value): static
    {
        $this->Tanggal = $value;
        return $this;
    }

    public function getKegiatan(): ?string
    {
        return HtmlDecode($this->Kegiatan);
    }

    public function setKegiatan(?string $value): static
    {
        $this->Kegiatan = RemoveXss($value);
        return $this;
    }

    public function getValidasiDosen(): ?bool
    {
        return $this->ValidasiDosen;
    }

    public function setValidasiDosen(?bool $value): static
    {
        $this->ValidasiDosen = $value;
        return $this;
    }
}
