<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function reset(int $userId): void
    {
        $user = User::where('id', $userId)->firstOrFail();
        $user->prize_option_id = 0;
        $user->save();
    }

    public function check()
    {
        $user = Auth::user();
        return $user->prize_option_id;

    }

}
