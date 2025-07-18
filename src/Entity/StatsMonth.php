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
 * Entity class for "stats_month" table
 */

#[Entity]
#[Table("stats_month", options: ["dbId" => "DB"])]
class StatsMonth extends AbstractEntity
{
    #[Id]
    #[Column(type: "smallint")]
    private int $Year;

    #[Id]
    #[Column(type: "integer")]
    private int $Month;

    #[Column(type: "bigint")]
    private string $Hits;

    public function __construct(int $Year, int $Month)
    {
        $this->Year = $Year;
        $this->Month = $Month;
        $this->Year = 0;
        $this->Month = 0;
        $this->Hits = "0";
    }

    public function getYear(): int
    {
        return $this->Year;
    }

    public function setYear(int $value): static
    {
        $this->Year = $value;
        return $this;
    }

    public function getMonth(): int
    {
        return $this->Month;
    }

    public function setMonth(int $value): static
    {
        $this->Month = $value;
        return $this;
    }

    public function getHits(): string
    {
        return $this->Hits;
    }

    public function setHits(string $value): static
    {
        $this->Hits = $value;
        return $this;
    }
}
