<?php

namespace App\Services;

use App\Models\DeliveryPrize;
use App\Models\User;
use App\Models\UserPrize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryService
{
    public function aproveDelivery(int $userId, array $data): void
    {
        $getUserPrize =  UserPrize::where('user_id','=',$userId)->first('prize_id');

        DeliveryPrize::create([
            'user_id' => $userId,
            'prize_id' =>  $getUserPrize->prize_id,
            'address' => $data['address'],
            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'status' => DeliveryPrize::STATUS_WAIT,
        ]);
    }
}
