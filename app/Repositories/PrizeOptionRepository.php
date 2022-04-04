<?php

namespace App\Repositories;

use App\Models\PrizeOption;
use Illuminate\Database\Eloquent\Collection;

class PrizeOptionRepository
{
    public function findActives(): Collection
    {
        return PrizeOption::where('is_active', '=', 1)->get();
    }
}
