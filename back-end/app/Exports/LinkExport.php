<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LinkExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    private $personas;

    private $encuesta_id;

    private $url;

    private $tipo;

    private $api;

    public function __construct($personas, $id, $tipo)
    {
        $this->personas = $personas;
        $this->encuesta_id = $id;
        $this->api = config('constants.front_end');

        if ($tipo == 'int') {
            $this->url = '/test-intereses/';
            $this->tipo = 'INTERESES';
        } else {
            $this->url = '/test-temperamentos/';
            $this->tipo = 'TEMPERAMENTOS';
        }

        foreach ($this->personas as $p) {
            $p->link = $this->api . $this->url . $this->encuesta_id . '/' . $p->id;
        }
    }

    public function view(): View
    {
        return view('links', [
            'personas' => $this->personas,
            'encuesta_id' => $this->encuesta_id,
            'tipo' => $this->tipo
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('007DD5');

                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getFont()->getColor()->setARGB('FFFFFF');

                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13)
                    ->setBold(true);
            }
        ];
    }
}
