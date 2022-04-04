<?php

namespace App\ExternalIntegrations\Contracts;

interface BankInterface
{
    /**
     * send request to bank
     * @return bool
     */
    public function send(): bool;

    /**
     * Check bank request
     * @return bool
     */
    public function check(): bool;
}
