<?php

namespace App\Http\Controllers;

use App\Buyers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    */
    public function saveBuyers(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
        'document' => 'required',
        'documentType' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'totalValue' => 'required',
        'address' => 'required'
        ]);
        
       $data = $request->all();
       $buyer = new Buyers();
       $buyer->name = $data['name'];
       $buyer->lastname = $data['name'];
       $buyer->document = $data['document'];
       $buyer->documentType = $data['documentType'];
       $buyer->email = $data['email'];
       $buyer->phone = $data['phone'];
       $buyer->totalValue = $data['totalValue'];
       $buyer->address = $data['address'];
       $buyer->status = 'FAILED';
       $buyer->ref = Str::random(6);
       $buyer->save();
      
       return redirect()->route('buyers.showBuyers');
    }
}
