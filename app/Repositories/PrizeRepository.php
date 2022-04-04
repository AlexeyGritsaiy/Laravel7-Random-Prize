<?php

namespace App\Repositories;

use App\Models\Prize;

class PrizeRepository
{
    public function findRandom(): Prize
    {
        $prizeId = mt_rand(1, 4);

        return Prize::find($prizeId);
    }
}
