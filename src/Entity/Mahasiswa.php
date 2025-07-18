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
 * Entity class for "mahasiswa" table
 */

#[Entity]
#[Table("mahasiswa", options: ["dbId" => "DB"])]
class Mahasiswa extends AbstractEntity
{
    #[Id]
    #[Column(name: "nim", type: "string", unique: true)]
    private string $Nim;

    #[Column(name: "nama", type: "string", nullable: true)]
    private ?string $Nama;

    #[Column(name: "prodi", type: "string", nullable: true)]
    private ?string $Prodi;

    #[Column(name: "fakultas", type: "string", nullable: true)]
    private ?string $Fakultas;

    #[Column(name: "angkatan", type: "smallint", nullable: true)]
    private ?int $Angkatan;

    #[Column(name: "email", type: "string", nullable: true)]
    private ?string $Email;

    #[Column(name: "no_hp", type: "string", nullable: true)]
    private ?string $NoHp;

    public function getNim(): string
    {
        return $this->Nim;
    }

    public function setNim(string $value): static
    {
        $this->Nim = $value;
        return $this;
    }

    public function getNama(): ?string
    {
        return HtmlDecode($this->Nama);
    }

    public function setNama(?string $value): static
    {
        $this->Nama = RemoveXss($value);
        return $this;
    }

    public function getProdi(): ?string
    {
        return HtmlDecode($this->Prodi);
    }

    public function setProdi(?string $value): static
    {
        $this->Prodi = RemoveXss($value);
        return $this;
    }

    public function getFakultas(): ?string
    {
        return HtmlDecode($this->Fakultas);
    }

    public function setFakultas(?string $value): static
    {
        $this->Fakultas = RemoveXss($value);
        return $this;
    }

    public function getAngkatan(): ?int
    {
        return $this->Angkatan;
    }

    public function setAngkatan(?int $value): static
    {
        $this->Angkatan = $value;
        return $this;
    }

    public function getEmail(): ?string
    {
        return HtmlDecode($this->Email);
    }

    public function setEmail(?string $value): static
    {
        $this->Email = RemoveXss($value);
        return $this;
    }

    public function getNoHp(): ?string
    {
        return HtmlDecode($this->NoHp);
    }

    public function setNoHp(?string $value): static
    {
        $this->NoHp = RemoveXss($value);
        return $this;
    }
}
