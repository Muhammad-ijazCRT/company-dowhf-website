<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ContactUsMail;
use App\Mail\EmailCompaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailCompaignController extends Controller
{
    public function emailCompaignIndex(){
        $emails = User::all();

        return view('email-compaign.index', compact('emails'));
    }

    public function runCompaign(Request $request){
        
        $details = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        
        
        Mail::to($request->email)->send(new EmailCompaign($details));

        return "sent successfully";
    }
}
