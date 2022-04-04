<?php

namespace App\Http\Controllers;

use App\Models\PrizeOption;
use App\Repositories\UserBalanceRepository;
use App\Repositories\UserBonusBalanceRepository;
use App\Services\GiftService;
use App\Services\UserBalanceService;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function index(GiftService $giftService, UserBonusBalanceRepository $userBonusBalance, UserBalanceRepository $userBalance)
    {
        $userId = Auth::user()->id;
        $prizeOptionId = Auth::user()->prize_option_id;

        $getPrizeName = PrizeOption::find($prizeOptionId);
        $bonusBalans = $userBonusBalance->getUserBalance($userId);
        $balans = $userBalance->getUserBalance($userId);

        $giftService->accept($userId, $prizeOptionId);

        return view('cabinet', compact('getPrizeName', 'bonusBalans', 'balans'));
    }

    public function updateBalans(UserBalanceService $service)
    {
        $service->calculate(Auth::user()->id);

        return redirect('/cabinet');
    }

    public function withdrawalOfMoney(UserBalanceService $service)
    {
        $service->reset(Auth::user()->id);

        return redirect('/cabinet');
    }
}
