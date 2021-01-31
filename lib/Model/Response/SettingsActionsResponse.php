<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class SettingsActionsResponse extends AbstractDefaultResponse
{
    private UrlActions $urlActions;

    public function getUrlActions(): UrlActions
    {
        return $this->urlActions;
    }

    public function setUrlActions(UrlActions $urlActions): void
    {
        $this->urlActions = $urlActions;
    }
}