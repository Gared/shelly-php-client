<?php
declare(strict_types=1);

namespace ShellyClient\Model;

class UrlActions extends AbstractDefaultResponse
{
    private Action $btnOnUrl;

    private Action $outOnUrl;

    private Action $outOffUrl;

    public function getBtnOnUrl(): Action
    {
        return $this->btnOnUrl;
    }

    public function setBtnOnUrl(Action $btnOnUrl): void
    {
        $this->btnOnUrl = $btnOnUrl;
    }

    public function getOutOnUrl(): Action
    {
        return $this->outOnUrl;
    }

    public function setOutOnUrl(Action $outOnUrl): void
    {
        $this->outOnUrl = $outOnUrl;
    }

    public function getOutOffUrl(): Action
    {
        return $this->outOffUrl;
    }

    public function setOutOffUrl(Action $outOffUrl): void
    {
        $this->outOffUrl = $outOffUrl;
    }
}