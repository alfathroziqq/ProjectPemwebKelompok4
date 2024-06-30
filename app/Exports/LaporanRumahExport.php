<?php

namespace App\Exports;

use App\Models\LaporanRumah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanRumahExport implements FromCollection, WithHeadings, WithTitle, WithCustomStartCell, WithMapping, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LaporanRumah::all();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'No',
            'Alamat Rumah',
            'Deskripsi',
            'Tanggal Laporan'
        ];
    }

    /**
    * @param mixed $laporanRumah
    * @return array
    */
    public function map($laporanRumah): array
    {
        static $number = 0;
        $number++;

        return [
            $number,
            $laporanRumah->rumah->alamat,
            $laporanRumah->deskripsi,
            $laporanRumah->tanggal_laporan,
        ];
    }

    /**
    * @return string
    */
    public function title(): string
    {
        return 'Daftar Laporan Rumah';
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
                $event->sheet->setCellValue('A1', 'Daftar Laporan Rumah');
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF4CAF50'],
                    ],
                ]);

                // Headings Styling
                $event->sheet->getStyle('A2:D2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF2196F3'],
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFFFFFF'],
                        ],
                    ],
                ]);

                // Data Styling
                $event->sheet->getStyle('A3:D' . ($event->sheet->getHighestRow()))->applyFromArray([
                    'font' => [
                        'color' => ['argb' => 'FF000000'],
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
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
                $event->sheet->getDelegate()->getColumnDimension($lastColumn)->setAutoSize(true);
            }
        ];
    }
}
