<?php

namespace App\Services;

use App\Models\Prize;
use App\Models\UserBalans;
use App\Models\UserBonusBalans;
use App\Models\UserPrize;
use App\Repositories\PrizeRepository;
use App\Repositories\UserBalanceRepository;
use App\Repositories\UserBonusBalanceRepository;

class GiftService
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var UserBalanceRepository
     */
    private $userBalance;
    /**
     * @var UserBonusBalanceRepository
     */
    private $userBonusBalance;

    public function __construct(UserService $userService, UserBalanceRepository $userBalance, UserBonusBalanceRepository $userBonusBalance)
    {

        $this->userService = $userService;

        $this->userBalance = $userBalance;

        $this->userBonusBalance = $userBonusBalance;

    }

    public function accept(int $userId, int $userPrize)
    {
        switch ($userPrize) {
            case UserPrize::MONEY:
                $checkBalans = UserBalans::find($userId);
                $userBalans = $this->userBalance->getUserBalance($userId);
                $generateBalans = mt_rand(1, 500);
                $newUserBalsns = $userBalans + $generateBalans;
                $checkBalans->balans = $newUserBalsns;
                $checkBalans->paid = false;

                $checkBalans->save();

                $this->userService->reset($userId);

                break;
            case UserPrize::BONUSES:

                $checkBonusBalans = UserBonusBalans::find($userId);

                $userBonusBalans = $this->userBonusBalance->getUserBalance($userId);
                $generateBonusBalans = mt_rand(1, 500);
                $newUserBalsns = $userBonusBalans + $generateBonusBalans;
                $checkBonusBalans->balans = $newUserBalsns;

                $checkBonusBalans->save();

                $this->userService->reset($userId);
                break;
            case UserPrize::ITEM:

                $setPrize = $this->initPrize();
                $userPrize = UserPrize::find($userId);
                $userPrize->prize_id = $setPrize->id;

                $userPrize->save();

                (new PrizeService())->approve($setPrize->id);
                $this->userService->reset($userId);
                break;

            default:
                return redirect('/cabinet');
        }
    }

    public function initPrize(): Prize
    {
        return (new PrizeRepository())->findRandom();
    }
}
