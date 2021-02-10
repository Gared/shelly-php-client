<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class SettingsResponse extends AbstractDefaultResponse
{
    private int $maxPower;

    private ?string $name;

    private string $timezone;

    private float $lat;

    private float $lng;

    private string $time;

    private bool $tzautodetect;

    private int $tzUtcOffset;

    private bool $tzDst;

    private bool $tzDstAuto;

    private int $unixtime;

    private bool $ledStatusDisable;

    private bool $ledPowerDisable;

    private ActionInfo $actions;

    private Device $device;

    /**
     * @var LightResponse[]
     */
    private array $lights;

    /**
     * @var RelayResponse[]
     */
    private array $relays;

    public function getMaxPower(): int
    {
        return $this->maxPower;
    }

    public function setMaxPower(int $max_power): void
    {
        $this->maxPower = $max_power;
    }

    public function isLedStatusDisable(): bool
    {
        return $this->ledStatusDisable;
    }

    public function setLedStatusDisable(bool $ledStatusDisable): void
    {
        $this->ledStatusDisable = $ledStatusDisable;
    }

    public function isLedPowerDisable(): bool
    {
        return $this->ledPowerDisable;
    }

    public function setLedPowerDisable(bool $ledPowerDisable): void
    {
        $this->ledPowerDisable = $ledPowerDisable;
    }

    /**
     * @return RelayResponse[]
     */
    public function getRelays(): array
    {
        return $this->relays;
    }

    /**
     * @param RelayResponse[] $relays
     */
    public function setRelays(array $relays): void
    {
        $this->relays = $relays;
    }

    /**
     * @return LightResponse[]
     */
    public function getLights(): array
    {
        return $this->lights;
    }

    public function getLight(int $index = 0): LightResponse
    {
        return $this->lights[$index];
    }

    /**
     * @param LightResponse[] $lights
     */
    public function setLights(array $lights): void
    {
        $this->lights = $lights;
    }

    /**
     * @return ActionInfo
     */
    public function getActions(): ActionInfo
    {
        return $this->actions;
    }

    /**
     * @param ActionInfo $actions
     */
    public function setActions(ActionInfo $actions): void
    {
        $this->actions = $actions;
    }

    /**
     * @return Device
     */
    public function getDevice(): Device
    {
        return $this->device;
    }

    /**
     * @param Device $device
     */
    public function setDevice(Device $device): void
    {
        $this->device = $device;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }

    public function getSunsetUnixTime(): int
    {
        return date_sunset($this->getUnixtime(), SUNFUNCS_RET_TIMESTAMP, $this->getLat(), $this->getLng());
    }

    public function getSecondsToSunset(): int
    {
        return $this->getSunsetUnixTime() - $this->getUnixtime();
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    public function isTzautodetect(): bool
    {
        return $this->tzautodetect;
    }

    public function setTzautodetect(bool $tzautodetect): void
    {
        $this->tzautodetect = $tzautodetect;
    }

    public function getTzUtcOffset(): int
    {
        return $this->tzUtcOffset;
    }

    public function setTzUtcOffset(int $tzUtcOffset): void
    {
        $this->tzUtcOffset = $tzUtcOffset;
    }

    public function isTzDst(): bool
    {
        return $this->tzDst;
    }

    public function setTzDst(bool $tzDst): void
    {
        $this->tzDst = $tzDst;
    }

    public function isTzDstAuto(): bool
    {
        return $this->tzDstAuto;
    }

    public function setTzDstAuto(bool $tzDstAuto): void
    {
        $this->tzDstAuto = $tzDstAuto;
    }

    public function getUnixtime(): int
    {
        return $this->unixtime;
    }

    public function setUnixtime(int $unixtime): void
    {
        $this->unixtime = $unixtime;
    }
}