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
    		'email'	=> 'required|email',
    		'desc'	=> 'required',
    	]);

    	$correo = new Talky($request->all());
    	Mail::to('eghinner@gmail.com')->send($correo);

    	return redirect()->route('contact.index')->with('info', 'MEnsaje enviado');
    }
}
