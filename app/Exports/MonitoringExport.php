<?php

namespace App\Exports;

use App\Models\Monitoring;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class MonitoringExport implements FromCollection, WithHeadings, WithTitle, WithCustomStartCell, WithMapping, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Monitoring::all();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'No',
            'Provinsi',
            'Latitude',
            'Longitude',
            'Deskripsi',
        ];
    }

    /**
    * @param mixed $monitoring
    * @return array
    */
    public function map($monitoring): array
    {
        return [
            $monitoring->id,
            $monitoring->provinsi,
            $monitoring->latitude,
            $monitoring->longitude,
            $monitoring->deskripsi,
        ];
    }

    /**
    * @return string
    */
    public function title(): string
    {
        return 'Daftar Monitoring';
    }

    /**
    * @return string
    */
    public function startCell(): string
    {
        return 'A2';
    }

    /**
    * @return array
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Title Styling
                $event->sheet->setCellValue('A1', 'Daftar Monitoring');
                $event->sheet->mergeCells('A1:E1');
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF4CAF50'],
                    ],
                ]);

                // Headings Styling
                $event->sheet->getStyle('A2:E2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF2196F3'],
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFFFFFF'],
                        ],
                    ],
                ]);

                // Data Styling
                $event->sheet->getStyle('A3:E' . ($event->sheet->getHighestRow()))->applyFromArray([
                    'font' => [
                        'color' => ['argb' => 'FF000000'],
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);

                // Autofit columns
                $lastColumn = $event->sheet->getHighestColumn();
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
            }
        ];
    }
}
