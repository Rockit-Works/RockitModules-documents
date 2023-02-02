<?php 

namespace Rockitworks\Documents;

use Illuminate\Database\Eloquent\Model;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

use Rockitworks\Documents\Models\Invoice as InvoiceModel;
use Rockitworks\Documents\Mail\InvoiceConfirmationMail;
use Rockitworks\Documents\Mail\InvoiceAdminMail;

class InvoiceGenerator extends Pdf {


    public $model;
    public $view;
    public $view_data;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->view = 'rockitworks-invoice::default';
        $this->view_data = [
            'sender' => config('invoice.sender_details'),
            'receiver' => config('invoice.receiver_details'),
            'invoice' => [
                'number' => 0001,
                'series' => now()->year . '-',
                'invoice_date' => now(),
                'pay_within_days' => config('invoice.invoice_details.pay_within_days')
            ],
            'products' => [
                'columns' => ['Product', 'Aantal', 'Stukprijs', 'Prijs'],
                'items' => [
                    ['Test product', 1, '&euro;125,50', '&euro;125,50'],
                    ['Demo product', 4, '&euro;12,25', '&euro;49,00'],
                ],
                'discounts' => [
                ],
            ],
            'totals' => [
                'excl' => 144.21,
                'vat' => 30.29,
                'incl' => 174.50,
            ]
        ];

        $invoice_config = config('invoice');

        $this->options = [
            'enable_modelEntry' => $invoice_config['enable_modelEntry'],
            'enable_confirmationMail' => $invoice_config['confirmation_mail']['enabled'],
            'enable_adminMail' => $invoice_config['admin_mail']['enabled'],
        ];

        $this->file_name = null;
        $this->file_path = null;
    }

    public function init($view_data = null) {
        
        if ($view_data) $this->view_data = $view_data;

        // validate view_data
        
        return $this;
    }


    public function createInvoiceEntry() {

        $this->model = InvoiceModel::create([
            'receiver_mail' => $this->getReceiverDetails()['email'],
            'invoice_data' => json_encode($this->view_data),
            'invoice_number' => $this->view_data['invoice']['series'] . $this->view_data['invoice']['number'],
        ]);

        return $this;
    }

    public function attachToModel($class, $id) {

        // if (!($class instanceof Model)) dd('class is no');
        if (!$this->model || !($this->model instanceof Model)) 
            $this->createInvoiceEntry();
        
        $this->model->invoiceable_type = $class;
        $this->model->invoiceable_id = $id;
        $this->model->save();

        return $this;
    }

    /************************************************
     *  EMAIL
     ***********************************************/

    public function sendConfirmationMail() {
        
        if (!$this->options['enable_confirmationMail']) return;
        $mail = \Mail::to($this->getReceiverDetails()['email']);        
        $mail = $this->mailConfig($mail, 'confirmation_mail');
        $mail->send(new InvoiceConfirmationMail($this->model));

        return $this;
    }

    public function sendAdminMail() {
        if (!$this->options['enable_adminMail']) return;

        $mail = \Mail::to($this->getSenderDetails()['email']);
        $mail = $this->mailConfig($mail, 'admin_mail');
        $mail->send(new InvoiceAdminMail($this->model));

        return $this;
    }    

    /**
     * [mailConfig description]
     * 
     * @return $mail
     */
    public function mailConfig($mail, $mail_type) {
        if (config('invoice.'. $mail_type .'.cc')) 
            $mail->cc(config('invoice.'. $mail_type .'.cc'));
        if (config('invoice.'. $mail_type .'.bcc')) 
            $mail->bcc(config('invoice.'. $mail_type .'.bcc'));  
        return $mail;        
    }

    /************************************************
     *  SETTERS
     ***********************************************/

    public function setView($view) {
        $this->view = $view;
        return $this;
    }
    public function setFileName($fileName) {
        $this->file_name = $fileName;
        return $this;
    }
    public function setFilePath($filePath){
        $this->file_path = $filePath;
        return $this;
    }
    public function setSenderDetails($sender) {
        $this->view_data['sender'] = $sender;
        return $this;
    }
    public function setReceiverDetails($receiver) {
        $this->view_data['receiver'] = $receiver;
        return $this;
    }
    public function setInvoiceNumber($invoiceNumber) {
        $this->view_data['invoice']['number'] = $invoiceNumber;
        return $this;
    }
    public function setInvoiceSeries($invoiceSeries) {
        $this->view_data['invoice']['series'] = $invoiceSeries;
        return $this;
    }
    public function setInvoiceDate($date) {
        $this->view_data['invoice']['invoice_date'] = $date;
        return $this;
    }
    public function setPayWithinDays($days) {
        $this->view_data['invoice']['pay_within_days'] = $days;
    }

    /************************************************
     *  GETTERS
     ***********************************************/    

    public function getSenderDetails() {
        return $this->view_data['sender'];
    }   
     public function getReceiverDetails() {
        return $this->view_data['receiver'];
    }   

    /************************************************
     *  PDF
     ***********************************************/

    /**
     * createPDF
     *
     * @return void
     */
    public function createPDF()
    {
        // $view_data = $this->getViewData();
        $name = \Str::slug($this->file_name).'.pdf';

        $pdf = PDF::loadView($this->view, $this->view_data);
        $pdf->setPaper('A4', 'portrait');

        // if($output) return $pdf->output();

        return $pdf->stream($name);     
    }

}