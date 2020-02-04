<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendMail;
use Mail;
use Validator;

class MailController extends Controller
{
    /**
     * Send Mail.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'errors',
                'message' =>'The request was succesful but returned back with validation errors.',
                'errors' =>$validator->errors(),
            ]);
        } else {

            $email = 'leonardo.f.jr@gmail.com';

            Mail::to($email)->send(new sendMail($request));
            return response()->json([
                'status' => 'success',
                'message' => 'The request was successful and your message was sent..',
            ]);
        }


    }
}
