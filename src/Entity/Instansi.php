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
 * Entity class for "instansi" table
 */

#[Entity]
#[Table("instansi", options: ["dbId" => "DB"])]
class Instansi extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_instansi", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdInstansi;

    #[Column(name: "nama_instansi", type: "string", nullable: true)]
    private ?string $NamaInstansi;

    #[Column(name: "alamat", type: "text", nullable: true)]
    private ?string $Alamat;

    #[Column(name: "kontak_person", type: "string", nullable: true)]
    private ?string $KontakPerson;

    #[Column(name: "no_hp", type: "string", nullable: true)]
    private ?string $NoHp;

    #[Column(name: "email", type: "string", nullable: true)]
    private ?string $Email;

    public function getIdInstansi(): int
    {
        return $this->IdInstansi;
    }

    public function setIdInstansi(int $value): static
    {
        $this->IdInstansi = $value;
        return $this;
    }

    public function getNamaInstansi(): ?string
    {
        return HtmlDecode($this->NamaInstansi);
    }

    public function setNamaInstansi(?string $value): static
    {
        $this->NamaInstansi = RemoveXss($value);
        return $this;
    }

    public function getAlamat(): ?string
    {
        return HtmlDecode($this->Alamat);
    }

    public function setAlamat(?string $value): static
    {
        $this->Alamat = RemoveXss($value);
        return $this;
    }

    public function getKontakPerson(): ?string
    {
        return HtmlDecode($this->KontakPerson);
    }

    public function setKontakPerson(?string $value): static
    {
        $this->KontakPerson = RemoveXss($value);
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

    public function getEmail(): ?string
    {
        return HtmlDecode($this->Email);
    }

    public function setEmail(?string $value): static
    {
        $this->Email = RemoveXss($value);
        return $this;
    }
}
