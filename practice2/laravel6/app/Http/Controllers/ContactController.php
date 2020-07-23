<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function show()
    {
        return view('contact');

    }

    public function store()
    {
        /**
        //@42 #raw #mail #email
        Mail::raw('bla', function($message){
           $message->to('example@ex.com');
        });
         */

        // @43 - #mail #email #mailableclass
        Mail::to('foo@example.com')->send(new ContactMe("A topic"));
        return redirect('/contact')->with('message', 'Email sent!'); //@42 #flashmessage
    }
}
