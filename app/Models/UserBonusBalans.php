<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $balans
 */
class UserBonusBalans extends Model
{
    protected $table = 'user_bonus_balans';
    protected $fillable = [
        'user_id', 'balans',
    ];

}
