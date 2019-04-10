<?php

namespace App\Http\Controllers;

use App\Buyers;
use Illuminate\Http\Request;
use Session;

class BuyersController extends Controller
{
    /**
    * Show all the buyers with status.
    *
    */
    public function showBuyers()
    {
        $buyers = Buyers::all();
        return view('buyer.show', ['buyers' => $buyers]);
    }

    /**
    * Save buyers after they submit with initial status .
    *
    * @return \Illuminate\Http\Response
    */
    public function saveBuyers(Request $request)
   {
       $this->validate($request, [
        'fullName' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'status' => 'required',
        'ref' => 'required'
        ]);
        
       Buyers::create($request->all());

    }
}
