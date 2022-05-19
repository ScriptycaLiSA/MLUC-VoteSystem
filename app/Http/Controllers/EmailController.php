<?php

namespace App\Http\Controllers;

use App\Mail\AlflorenceMailShit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $receiverEmailAddress = "alflorence.abuan23@gmail.com";

        Mail::to($receiverEmailAddress)->send(new AlflorenceMailShit());

        if (Mail::failures() != 0) {
            return "Email has been sent successfully.";
        }
        return "Oops! There was some error sending the email.";
    }
}
