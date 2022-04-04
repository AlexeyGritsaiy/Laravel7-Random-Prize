<?php

namespace App\Http\Controllers;

use App\Services\DeliveryService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('deliveryForm');
    }

    public function save(DeliveryService $aproveDelivery,Request $request)
    {
        $data = $this->validate($request, [
            'address' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
        ]);

        $aproveDelivery->aproveDelivery(Auth::user()->id,$data);

        return redirect('/');
    }

}
