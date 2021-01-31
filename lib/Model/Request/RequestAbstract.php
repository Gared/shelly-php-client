<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

abstract class RequestAbstract
{
    protected function convertQueryParameters(array $variables, array $blacklistVariables = []): array
    {
        $result = [];

        foreach ($variables as $variable => $value) {
            if ($value !== null && !in_array($variable, $blacklistVariables, true)) {
                $result[strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $variable))] = $value;
            }
        }

        return $result;
    }
}