<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class LinkExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $personas;

    public function __construct($personas)
    {
        $this->personas = $personas;
    }

    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => $this->personas
        ]);
    }
}
