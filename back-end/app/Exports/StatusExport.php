<?php

namespace App\Exports;

use App\EncuestaPuntaje;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StatusExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $personas;
    private $interes_id;
    private $temperamento_id;

    private $front;
    private $back;

    public function __construct($personas, $interes_id, $temperamento_id)
    {
        $this->personas = $personas;
        $this->interes_id = $interes_id;
        $this->temperamento_id = $temperamento_id;

        $this->front = config('constants.front_end');
        $this->back = config('constants.back_end');

        foreach ($this->personas as $p) {

            $data_interes = EncuestaPuntaje::where('encuesta_id', $this->interes_id)
                ->where('persona_id', $p->id)
                ->get();

            $data_temperamento = EncuestaPuntaje::where('encuesta_id', $this->temperamento_id)
                ->where('persona_id', $p->id)
                ->get();

            if (!$data_interes->isEmpty()) {
                $p->link_intereses = $this->back . 'exportar' . '/' . $this->interes_id . '/' . $p->id;
            } else {
                $p->link_intereses = $this->front . '/test-intereses/' . $this->interes_id . '/' . $p->id;
            }

            if (!$data_temperamento->isEmpty()) {
                $p->link_temperamentos = "";
            } else {
                $p->link_temperamentos = $this->front . '/test-temperamentos/' . $this->temperamento_id . '/' . $p->id;;
            }

            if (!$data_interes->isEmpty() && !$data_temperamento->isEmpty()) {
                $p->status = "Completado";
            } else {
                $p->status = "Pendiente";
            }
        }
    }

    public function view(): View
    {
        return view('status', [
            'personas' => $this->personas
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
