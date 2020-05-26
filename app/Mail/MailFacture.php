<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Http\Controllers\PdfController;

class MailFacture extends Mailable
{
    use Queueable, SerializesModels;

    protected $facture;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($facture)
    {
        $this->facture = $facture;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $pdfController = new PdfController();

      $pdf = $pdfController->attachPdfFacture($this->facture->id);

      return $this->subject("Facture d'analyse")
                  ->view('mails.mail_facture', ['facture' => $this->facture])
                  ->with(['facture' => $this->facture])
                  ->attachData($pdf->output(), 'facture.pdf');
    }
}
