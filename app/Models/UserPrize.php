<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrize extends Model
{
    public const MONEY = 1;
    public const BONUSES = 2;
    public const ITEM = 3;

    protected $table = 'user_prize';

    protected $fillable = [
        'user_id','prize_id',
    ];
}
