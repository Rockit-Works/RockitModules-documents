<?php

namespace Rockitworks\Documents;

use Illuminate\Database\Eloquent\Model;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

use Rockitworks\Documents\Models\Document as DocumentModel;

class DocumentGenerator extends Pdf {


    public $model;
    public $view;
    public $view_data;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->view = 'rockitworks-documents::example';
        $this->view_data = [
            'person' => [
                'first_name' => 'Sjoerd'
            ]
        ];

        $docs_config = config('documents');

        $this->options = [
            'enable_modelEntry' => $docs_config['enable_modelEntry'],
        ];

        $this->file_name = null;
        $this->file_path = null;
    }

    public function init($view_data = null, $view = null) {

        if ($view_data) $this->view_data = $view_data;
        if ($view) $this->view = $view;

        // validate view_data

        return $this;
    }


    public function createDocumentEntry() {

        $this->model = DocumentModel::create([
            'receiver_mail' => $this->getReceiverDetails()['email'],
            'document_data' => json_encode($this->view_data),
        ]);

        return $this;
    }

    public function attachToModel($class, $id) {

        // if (!($class instanceof Model)) dd('class is no');
        if (!$this->model || !($this->model instanceof Model))
            $this->createDocumentEntry();

        $this->model->documentable_type = $class;
        $this->model->documentable_id = $id;
        $this->model->save();

        return $this;
    }


    /************************************************
     *  SETTERS
     ***********************************************/

    public function setView($view) {
        $this->view = $view;
        return $this;
    }
    public function setViewData($view_data) {
        $this->view_data = $view_data;
        return $this;
    }

    /************************************************
     *  GETTERS
     ***********************************************/

    public function getViewData() {
        return $this->view_data;
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
        dd($this->view, $this->view_data);
        $pdf = PDF::loadView($this->view, $this->view_data);
        $pdf->setPaper('A4', 'portrait');

        // if($output) return $pdf->output();

        return $pdf->stream($name);
    }

}