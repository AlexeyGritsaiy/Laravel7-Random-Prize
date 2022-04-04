<?php

namespace App\Repositories;

use App\Models\UserBalans;

class UserBalanceRepository
{

    public function getByUserId(int $userId): UserBalans
    {
       return UserBalans::where('user_id', $userId)->firstOrFail();
    }

    public function getUserBalance(int $userId): int
    {
        return $this->getByUserId($userId)->balans;
    }
}
