<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMessage extends Mailable
{
    use Queueable, SerializesModels;



    protected  $item;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        //
        $this->text = $text;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.investmentrequest.replayMessage')
            ->subject(trans('admin.Replay For your message on 5dmat-web'))
            ->with(['text' => $this->text]);    }
}
