<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $balans
 */
class UserBalans extends Model
{
    protected $table = 'user_balans';

    protected $fillable = [
        'paid','user_id','balans',
    ];
}
