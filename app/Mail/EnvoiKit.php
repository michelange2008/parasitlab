<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvoiKit extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demande)
    {
        $this->demande = $demande;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->demande['email'])
          ->subject("Demande de kit d'envoi")
          ->view('mails.envoiKitMail')
          ->with(['demande' => $this->demande]);
    }
}
