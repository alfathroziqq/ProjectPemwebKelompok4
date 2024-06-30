<?php

namespace App\Exports;

use App\Models\Rumah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class RumahExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithCustomStartCell, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Load Rumah with KartuKeluarga relationship
        return Rumah::with('kartuKeluarga')->get();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'No',
            'Nomor KK',
            'Alamat',
            'Luas Rumah',
            'Jumlah Kamar',
            'Spesifikasi Rumah'
        ];
    }

    /**
    * @param mixed $rumah
    * @return array
    */
    public function map($rumah): array
    {
        static $number = 0;
        $number++;

        return [
            $number,
            $rumah->kartuKeluarga->nomor_kk ?? 'N/A', // Access nomor_kk from kartuKeluarga relationship
            $rumah->alamat,
            $rumah->luas_rumah,
            $rumah->jumlah_kamar,
            $rumah->spesifikasi_rumah,
        ];
    }

    /**
    * @return string
    */
    public function title(): string
    {
        return 'Daftar Rumah';
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
                $event->sheet->setCellValue('A1', 'Daftar Rumah');
                $event->sheet->mergeCells('A1:F1');
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
                $event->sheet->getStyle('A2:F2')->applyFromArray([
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

                // Autofit columns
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);
            }
        ];
    }
}
