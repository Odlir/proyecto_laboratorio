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

    private $interes_id;

    private $temperamento_id;

    private $api;

    private $show = true;

    public function __construct($personas, $interes_id, $temperamento_id)
    {
        $this->personas = $personas;
        $this->interes_id = $interes_id;
        $this->temperamento_id = $temperamento_id;

        $this->api = config('constants.front_end');

        if ($this->temperamento_id == "") {
            $this->show = false;
        }

        foreach ($this->personas as $p) {
            $p->link_intereses = $this->api . '/test-intereses/' . $this->interes_id . '/' . $p->id;
            $p->link_temperamentos = $this->api . '/test-temperamentos/' . $this->temperamento_id . '/' . $p->id;
        }
    }

    public function view(): View
    {
        return view('links', [
            'personas' => $this->personas,
            'show' => $this->show,
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
