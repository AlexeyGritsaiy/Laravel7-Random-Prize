<?php

namespace App\Http\Controllers;

use App\Models\PrizeOption;
use App\Repositories\PrizeOptionRepository;
use App\Services\PrizeService;
use App\Services\UserService;

class PrizeController extends Controller
{

    public function index(PrizeOptionRepository $optionRepository, UserService $service)
    {
        $getOptionsPrize = $optionRepository->findActives();

        $options = array(0 => '');
        foreach ($getOptionsPrize as $value) {
            $options[] .= $value->name;
        }

        unset($options[0]);

        $setRandomPrize = array_rand($options, 1);

        $findPrizeById = PrizeOption::find($setRandomPrize);

        $checkUserPrize = $service->check();
        if ($checkUserPrize == 0) {
            $getPrizeName = $findPrizeById->name;
            $this->approvePrizeOption($findPrizeById);
        } else {
            $getPrizeName = 'Вы уже получили подарок';
        }

        return view('prize', compact('getPrizeName'));
    }

    public function approvePrizeOption($optionId)
    {
        app(PrizeService::class)->approveOption($optionId);
    }

    public function clearPrize()
    {
        app(PrizeService::class)->clear();
        return redirect('/home');
    }

    public function accept()
    {
        app(PrizeService::class)->accept();
        return redirect('/cabinet');
    }

}
