<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPrize extends Model
{
    protected $table = 'delivery_prize';

    const STATUS_WAIT = 'Подготовка к отправке';
    const STATUS_APPROVE = 'Отправлено';


    protected $fillable = [
      'user_id','prize_id', 'address', 'FirstName', 'LastName','status'
    ];

}
