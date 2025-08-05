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
 * Entity class for "kegiatan" table
 */

#[Entity]
#[Table("kegiatan", options: ["dbId" => "DB"])]
class Kegiatan extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_kegiatan", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdKegiatan;

    #[Column(name: "nama_kegiatan", type: "string", nullable: true)]
    private ?string $NamaKegiatan;

    #[Column(name: "tahun", type: "smallint", nullable: true)]
    private ?int $Tahun;

    #[Column(name: "semester", type: "string", nullable: true)]
    private ?string $Semester;

    #[Column(name: "tanggal_mulai", type: "date", nullable: true)]
    private ?DateTime $TanggalMulai;

    #[Column(name: "tanggal_selesai", type: "date", nullable: true)]
    private ?DateTime $TanggalSelesai;

    public function getIdKegiatan(): int
    {
        return $this->IdKegiatan;
    }

    public function setIdKegiatan(int $value): static
    {
        $this->IdKegiatan = $value;
        return $this;
    }

    public function getNamaKegiatan(): ?string
    {
        return $this->NamaKegiatan;
    }

    public function setNamaKegiatan(?string $value): static
    {
        if (!in_array($value, ["KKN", "PKL", "Magang"])) {
            throw new \InvalidArgumentException("Invalid 'nama_kegiatan' value");
        }
        $this->NamaKegiatan = $value;
        return $this;
    }

    public function getTahun(): ?int
    {
        return $this->Tahun;
    }

    public function setTahun(?int $value): static
    {
        $this->Tahun = $value;
        return $this;
    }

    public function getSemester(): ?string
    {
        return $this->Semester;
    }

    public function setSemester(?string $value): static
    {
        if (!in_array($value, ["Ganjil", "Genap"])) {
            throw new \InvalidArgumentException("Invalid 'semester' value");
        }
        $this->Semester = $value;
        return $this;
    }

    public function getTanggalMulai(): ?DateTime
    {
        return $this->TanggalMulai;
    }

    public function setTanggalMulai(?DateTime $value): static
    {
        $this->TanggalMulai = $value;
        return $this;
    }

    public function getTanggalSelesai(): ?DateTime
    {
        return $this->TanggalSelesai;
    }

    public function setTanggalSelesai(?DateTime $value): static
    {
        $this->TanggalSelesai = $value;
        return $this;
    }
}
