<?php

namespace Rdotti\Contatti\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Rdotti\Contatti\Contatti;
use Mail;
use Rdotti\Contatti\Mail\MessageSent;


class ContattiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contatti::index');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = $this->validate(request(), [
          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'message' => ''
        ]);
        
        Contatti::create($contact);

        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $email = $request->get('email');
        $text = $request->get('message');
        //SendMail
        Mail::to(config('contatti.email'))->send(new MessageSent($firstname, $lastname, $email, $text));
        //Everything OK
        
        return back()->with('success', 'TNX for your Contact!');;
    }
}
