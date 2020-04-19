<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
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

    private $link_intereses = 'http://localhost:4200/#/test-intereses';

    // private $link_intereses = 'http://gaf.com.pe/front-encuesta/#/test-intereses';

    public function __construct($personas,$id)
    {
        $this->personas = $personas;
        $this->encuesta_id = $id;

        foreach($this->personas as $p)
        {
            // $p->link_intereses = $this->link_intereses.'?encuesta_id='.$this->encuesta_id.'&persona_id='.$p->id;

            $p->link_intereses = $this->link_intereses.'/'.$this->encuesta_id.'/'.$p->id;
        }
    }

    public function view(): View
    {
        return view('links', [
            'personas' => $this->personas,
            'encuesta_id' => $this->encuesta_id
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
