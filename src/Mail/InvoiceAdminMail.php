<?php
// 'src/Mail/WelcomeMail.php'

namespace Rockitworks\Invoice\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Rockitworks\Invoice\Models\Invoice;

class InvoiceAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->markdown('rockitworks-invoice::emails.adminMail', [
                'url' => $invoice->file_path ?? ''
            ]);
    }
}