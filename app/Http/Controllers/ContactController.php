<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function storeemail(Request $request)
    {
        $email = request()->validate(['email' => 'required|email']);

        Mail::to(request('email'))
            ->send(new Contact('items'));
        
        return redirect('/')
            ->with('message', 'Email Sent');
    }
}
