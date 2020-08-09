<?php

namespace TelegramWorkflow\Service;

trait ParameterTrait
{
    protected array $parameters;

    public function addParameter(string $parameterName, $parameterValue): self
    {
        $this->parameters[$parameterName] = $parameterValue;

        return $this;
    }

    public function getParameter(string $parameterName)
    {
        if (array_key_exists($parameterName, $this->parameters)) {
            return $this->parameters[$parameterName];
        }

        return null;
    }
}