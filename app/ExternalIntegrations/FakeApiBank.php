<?php

namespace App\ExternalIntegrations;

use App\ExternalIntegrations\Contracts\BankInterface;

class FakeApiBank implements BankInterface
{
    public function send(): bool
    {
        return true;
    }

    public function check(): bool
    {
        return true;
    }
}
