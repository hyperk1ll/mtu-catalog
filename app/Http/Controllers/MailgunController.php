<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailgun\Mailgun;
use Illuminate\Support\Facades\Mail;
use Mailgun\HttpClient\HttpClientConfigurator;

    class MailgunController extends Controller
    {
        public function sendEmail(Request $request)
        {
            $name = $request->input('name');
            $email = $request->input('email');
            $subject = $request->input('subject');
            $message = $request->input('message');
    
            // Instantiate the Mailgun client
            $configurator = new HttpClientConfigurator();
            $configurator->setApiKey(env('MAILGUN_SECRET'));
            $mgClient = new Mailgun($configurator);
            $domain = env('MAILGUN_DOMAIN');
    
            // Make the call to the client
            $result = $mgClient->messages()->send($domain, [
                'from'    => "PKL Hyperkill <mailgun@{$domain}>",
                'to'      => "oby.aubrey@gmail.com",
                'subject' => $subject,
                'text'    => "
                Hi,

                You've received a message from {$name}:
                
                -------------------------
                {$message}
                -------------------------
                
                Sent by: {$email}",
            ]);
    
            // // Display the data
            // dd($result);

            // return redirect()->back();

    
            // The script will exit here, and the view won't be returned.
        }
    }
