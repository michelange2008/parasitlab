<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Traits\UserTypeOutil;

class EnvoiInfosConnexion extends Mailable
{
    use Queueable, SerializesModels, UserTypeOutil;

    protected $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $estVeto = $this->estVeto($this->user->usertype_id);

      $estEleveur = $this->estEleveur($this->user->usertype_id);

        return $this->from(config('app.mail'))
                    ->subject('Informations de connexion')
                    ->view('mails.envoiInfosConnexion')
                    ->with(['user' => $this->user, 'estVeto' => $estVeto, 'estEleveur' => $estEleveur]);
    }
}
