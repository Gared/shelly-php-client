<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

class SettingsActionsRequest extends RequestAbstract implements RequestInterface
{
    private ?int $index = null;
    private ?string $name = null;
    private ?bool $enabled = null;
    private ?array $actions = null;

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(?int $index): SettingsActionsRequest
    {
        $this->index = $index;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): SettingsActionsRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): SettingsActionsRequest
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * @param array|null $actions
     * @return SettingsActionsRequest
     */
    public function setActions(?array $actions): SettingsActionsRequest
    {
        $this->actions = $actions;
        return $this;
    }

    public function getQueryParameters(): array
    {
        return $this->convertQueryParameters(get_object_vars($this));
    }

    public function getUrlPath(): string
    {
        return 'settings/actions';
    }

    public function getResponseClass(): string
    {
        return SettingsLightResponse::class;
    }
}