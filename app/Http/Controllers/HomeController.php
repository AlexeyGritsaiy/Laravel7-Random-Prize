<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\UserBalans;
use App\Models\UserBonusBalans;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $balans = UserBalans::find(Auth::user()->id);
        if (!isset($balans)){
            UserBalans::create([
                'paid' => 0,
                'user_id' => Auth::user()->id,
                'balans' => 0,
            ]);
        }

        $bonus = UserBonusBalans::find(Auth::user()->id);
        if (!isset($bonus)){
            UserBonusBalans::create([
                'user_id' => Auth::user()->id,
                'balans' => 0,
            ]);
        }
        return view('home');
    }
}
