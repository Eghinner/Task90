<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Talky;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function index(){
    	return view('contact.index');
    }

    public function store(Request $request){
    	$request->validate([
    		'titulo' =>	'required',
    		'desc'	=> 'required',
    	]);
        $sendto = $request->input('email');

    	$correo = new Talky($request->all());

    	Mail::to($sendto)->send($correo);

    	return redirect()->route('home')->with('Massage', 'MEnsaje enviado');

    }
}
