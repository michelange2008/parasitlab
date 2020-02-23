<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailDemande extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;
    public $demandePdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demande, $demandePdf)
    {
        $this->demande = $demande;
        $this->demande_pdf = $demandePdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      return $this->subject("Nouvelle demande d'analyse")
                  ->view('extranet.formulaireDemande.emailDemande')
                  ->with(['demande' => $this->demande])
                  ->attachData($this->demandePdf, 'demande.pdf');
    }
}
