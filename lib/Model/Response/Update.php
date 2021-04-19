<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class Update
{
    private string $status;

    private bool $hasUpdate;

    private string $newVersion;

    private string $oldVersion;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function isHasUpdate(): bool
    {
        return $this->hasUpdate;
    }

    public function setHasUpdate(bool $hasUpdate): void
    {
        $this->hasUpdate = $hasUpdate;
    }

    public function getNewVersion(): string
    {
        return $this->newVersion;
    }

    public function setNewVersion(string $newVersion): void
    {
        $this->newVersion = $newVersion;
    }

    public function getOldVersion(): string
    {
        return $this->oldVersion;
    }

    public function setOldVersion(string $oldVersion): void
    {
        $this->oldVersion = $oldVersion;
    }
}