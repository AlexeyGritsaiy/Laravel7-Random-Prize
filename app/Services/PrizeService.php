<?php

namespace App\Services;

use App\Models\DeliveryPrize;
use App\Models\Prize;
use App\Models\UserPrize;
use Illuminate\Support\Facades\Auth;

class PrizeService
{
    public function approve(int $id): void
    {
        Prize::find($id)->decrement('in_stock', 1);
    }

    public function clear():void
    {
        $user = Auth::user();
        $user->prize_option_id = 0;
        $user->is_approve = 0;
        $user->save();
    }

    public function approveOption($optionId)
    {
        $user = Auth::user();
        $user->prize_option_id = $optionId->id;
        $user->save();
    }

    public function accept():void
    {
        $user = Auth::user();
        $user->is_approve = 1;

        $physicalPrize = 3;

        if ($physicalPrize == 3) {
            if (!isset($userPrizeId)){
                UserPrize::create([
                    'user_id' => $user->id,
                    'prize_id' =>  $physicalPrize,
                ]);
            }
            $userPrizeId = UserPrize::firstWhere('user_id', $user->id);

            $prizeList = Prize::where('in_stock', '!=', 0)->get();
            $countPrizeList = count($prizeList);

            $setPrizeId = mt_rand(1, $countPrizeList);

            $userPrizeId->prize_id = $setPrizeId;
            $userPrizeId->save();
        }

        $user->save();

    }
}
