<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminDonationReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $data;
     public function __construct($data)
     {
         $this->data = $data;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->markdown('mails.adminDonationReceived') 
        ->with([
            'data' => $this->data,
        ])
        ->from('team@superschool.org', 'superschool.org')
        ->subject("New Donation Received on Super School");
        
    }
}
