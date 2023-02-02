<p>
	Gelieve het factuurbedrag voor {{ $invoice['invoice_date']->addDays($invoice['pay_within_days'])->format('d-m-Y') }} over te maken naar
    {{$sender['bank_account_number']}} t.n.v. {{$sender['bank_account_name']}}
    onder vermelding van het factuur nummer; {{$invoice['series']}}{{$invoice['number']}}. 
</p>