<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class ActionInfo
{
    private bool $active;

    /**
     * @var string[]
     */
    private array $names;

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getNames(): array
    {
        return $this->names;
    }

    public function setNames(array $names): void
    {
        $this->names = $names;
    }
}