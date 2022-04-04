<?php

namespace App\Repositories;

use App\Models\UserBonusBalans;

class UserBonusBalanceRepository
{
    public function getByUserId(int $userId): UserBonusBalans
    {

        return UserBonusBalans::where('user_id', $userId)->firstOrFail();
    }

    public function getUserBalance(int $userId): int
    {
        return $this->getByUserId($userId)->balans;
    }
}
