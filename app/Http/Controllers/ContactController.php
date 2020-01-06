<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeemail(Request $request)
    {
        $email = request()->validate(['email' => 'required|email']);

        Mail::raw('It Works', function ($message) {
            $message->to(request('email'))
                ->subject('Hello There');
        });
        
        return redirect('/')
            ->with('message', 'Email Sent');
    }
}
