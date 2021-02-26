<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
    	$client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.quotable.io/random');
        $response = $request->getBody();
       
        
        dd($response);

        return view('home', $response);
    }
}
