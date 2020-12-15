<?php

namespace App\Mail;

use App\Models\Productions\Commentaire;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pythie extends Mailable
{
    use Queueable, SerializesModels;

    public $commentaire;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Commentaire $commentaire = null)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('demande d\interprétation')
                    ->view('mails.pythie')
                    ->with([
                      'commentaire' => $this->commentaire,
                    ]);
    }
}
