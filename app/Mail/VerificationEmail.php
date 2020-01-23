<?php

namespace Equivalencias\Mail;

use Equivalencias\Controllers\Auth\RegisterController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct(RegisterController $data)
    {
        //
        $this->data=$data;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        dd($this->data);
        return $this->view('emails.confimation_code');
    }
}
