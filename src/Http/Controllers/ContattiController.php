<?php

namespace Rdotti\Contatti\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Rdotti\Contatti\Contatti;
use Mail;


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

        Mail::send('email',
        array(
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'textmessage' => $request->get('message')
        ), function($message)
        {
            $message->from('riccardodotti.web@gmail.com');
            $message->to('riccardodotti.web@gmail.com', 'Admin')->subject('Cloudways Feedback');
        });

        return back()->with('success', 'TNX for your Contact!');;
    }
}
