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
 * Entity class for "laporan_akhir" table
 */

#[Entity]
#[Table("laporan_akhir", options: ["dbId" => "DB"])]
class LaporanAkhir extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_laporan", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdLaporan;

    #[Column(name: "id_penempatan", type: "integer", nullable: true)]
    private ?int $IdPenempatan;

    #[Column(name: "file_laporan", type: "string", nullable: true)]
    private ?string $FileLaporan;

    #[Column(name: "nilai_dosen", type: "integer", nullable: true)]
    private ?int $NilaiDosen;

    #[Column(name: "nilai_instansi", type: "integer", nullable: true)]
    private ?int $NilaiInstansi;

    public function getIdLaporan(): int
    {
        return $this->IdLaporan;
    }

    public function setIdLaporan(int $value): static
    {
        $this->IdLaporan = $value;
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

    public function getFileLaporan(): ?string
    {
        return HtmlDecode($this->FileLaporan);
    }

    public function setFileLaporan(?string $value): static
    {
        $this->FileLaporan = RemoveXss($value);
        return $this;
    }

    public function getNilaiDosen(): ?int
    {
        return $this->NilaiDosen;
    }

    public function setNilaiDosen(?int $value): static
    {
        $this->NilaiDosen = $value;
        return $this;
    }

    public function getNilaiInstansi(): ?int
    {
        return $this->NilaiInstansi;
    }

    public function setNilaiInstansi(?int $value): static
    {
        $this->NilaiInstansi = $value;
        return $this;
    }
}
