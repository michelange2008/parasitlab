<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Http\Controllers\PdfController;

class Resultats extends Mailable
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

        $pdfController = new PdfController();

        $pdf = $pdfController->attachPdfResultats($this->demande->id);

        $name = $this->demande->user->name."_".$this->demande->anaacte->anatype->nom."_".$this->demande->date_resultat.".pdf";

        return $this->subject("Résultats d'analyse")
                    ->view('mails.resultats', ['demande' => $this->demande])
                    ->with(['demande' => $this->demande])
                    ->attachData($pdf->output(), $name);
    }
}
