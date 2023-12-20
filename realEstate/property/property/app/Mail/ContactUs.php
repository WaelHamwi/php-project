<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $request;
    public function __construct($request)
    {
        //
        $this->request=$request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

//        dd($this->request->phone);
        return $this->view('email.contact')->from($this->request->email)
            ->subject($this->request->contact_subject)
            ->with(['name' => $this->request->contact_name ,'text' => $this->request->contact_message ]);



//        return $this->view('view.name');
    }
}
