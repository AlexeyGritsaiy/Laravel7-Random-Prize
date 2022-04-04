<?php

namespace App\Services;

use App\Models\UserBonusBalans;

class UserBonusBalanceService
{
    public function reset(int $userId): void
    {
        $userBonusBalance = UserBonusBalans::find($userId);
        $userBonusBalance->balans = 0;
        $userBonusBalance->save();
    }
}
