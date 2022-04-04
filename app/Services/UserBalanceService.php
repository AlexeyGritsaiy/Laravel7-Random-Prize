<?php

namespace App\Services;

use App\ExternalIntegrations\FakeApiBank;
use App\Models\UserBalans;
use App\Models\UserBonusBalans;

class UserBalanceService
{
    public function reset(int $userId): void
    {
        $setUserBalans = UserBalans::find($userId);

        $setUserBalans->balans = 0;
        $setUserBalans->paid = true;
        $setUserBalans->save();
    }

    public function calculate(int $userId, float $rate = 0.3): void
    {
        $userBonusBalance = $this->getUserBonusBalance($userId);

        $userBalance = $this->getUserBalance($userId);

        $userBalance += $userBonusBalance * $rate;

        $setUserBalans = UserBalans::find($userId);
        $setUserBalans->balans = $userBalance;
        $setUserBalans->save();

        (new UserBonusBalanceService())->reset($userId);
        app(FakeApiBank::class)->send();
    }

    public function getUserBonusBalance($id)
    {
        return UserBonusBalans::find($id)->balans;
    }

    public function getUserBalance($id)
    {
        return UserBalans::find($id)->balans;
    }
}
