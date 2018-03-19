<?php

namespace App;

use PDF;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class License extends Model
{
    protected $guarded = [];

    public function owner() 
    {
        return $this->belongsTo(Customer::class, 'id');
    }

    public function generatePdf() 
    {
        $pdf = PDF::loadView('pdf.license', ['data' => $this]);

        Storage::put("pdf/{$this->key}.pdf", $pdf->output());
    }

}
