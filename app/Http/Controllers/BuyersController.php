<?php

namespace App\Http\Controllers;

use App\Buyers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Dnetix;
use GuzzleHttp\Client;


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

    public function init_pay()
    {
        $login = '6dd490faf9cb87a9862245da41170ff2';
        $secretKey = '024h1IlD';
        $seed = date('c');
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceb64 = base64_encode($nonce);
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey));
        $placetopay = new Dnetix\Redirection\PlacetoPay([
            'login' => $login,
            'tranKey' => $tranKey,
            'url' => 'https://test.placetopay.com/redirection',
        ]);
        return $placetopay;
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
      
       $place = $this->init_pay();
       $response = $this->request_place_to_pay($buyer->ref, $data['totalValue'], $place);
       return redirect()->route('buyers.showBuyers');
    }

    public function request_place_to_pay($ref, $data, $place){
        $reference = $ref;
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'USD',
                    'total' => $data,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => 'http://localhost:8000/redirect/' . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $place->request($request);
        if ($response->isSuccessful()) {
            // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
            // Redirect the client to the processUrl or display it on the JS extension
            header('Location: ' . $response->processUrl());
        } else {
            // There was some error so check the message and log it
            $response->status()->message();
        }
    }

    /**
    * Save buyers after they submit with initial status .
    *
    */
    public function request_place_to_pay_guzzle($ref, $totalValue){
        $reference = $ref;
        $login = '6dd490faf9cb87a9862245da41170ff2';
        $secretKey = '024h1IlD';
        $seed = date('c');
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceb64 = base64_encode($nonce);
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey));

        $client = new Client(['base_uri' => 'https://test.placetopay.com/redirection',]);
        $res = $client->post('/api/session', [
            'headers' => [
                'auth' => [
                    'login' => $login,
                    'seed' => $seed,
                    'nonce' => $nonceb64,
                    'tranKey' => $tranKey,
                ],
            ],
            'payment' => [
                'reference' => $login,
                'description' => $seed,
                'amount' => [
                    'currency' => 'USD',
                    'total' => $totalValue,
                ],
                'expiration' => date('c', strtotime('+2 days')),
                'returnUrl' => 'http://localhost:8000/redirect/' . $reference,
                'ipAddress' => '127.0.0.1',
                'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
            ],
        ]);
    }

    public function redirect(Request $request){
       // acá se debería manejar la respuestá del webservice cuando se realiza una petición
    }
    
}
