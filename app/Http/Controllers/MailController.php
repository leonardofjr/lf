<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendMail;
use Mail;

class MailController extends Controller
{
    /**
     * Send Mail.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendMail(Request $request)
    {
        $email = 'leonardo.f.jr@gmail.com';

        Mail::to($email)->send(new sendMail($request));

        return response()->json([
            'message' => 'The request was successful.',
        ]);
    }
}
