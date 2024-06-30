<?php

namespace App\Exports;

use App\Models\RiwayatPerubahanRumah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class RiwayatPerubahanRumahExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithCustomStartCell, WithEvents
{
    protected $startIndex = 1; // Start index for numbering

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RiwayatPerubahanRumah::with('rumah')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Alamat Rumah',
            'Perubahan',
            'Tanggal Perubahan',
        ];
    }

    /**
     * @param mixed $riwayat
     * @return array
     */
    public function map($riwayat): array
    {
        return [
            $this->startIndex++, // Incremental numbering starting from 1
            $riwayat->rumah->alamat ?? 'N/A',
            $riwayat->perubahan,
            $riwayat->tanggal_perubahan,
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Daftar Riwayat Perubahan Rumah';
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
                $event->sheet->setCellValue('A1', 'Daftar Riwayat Perubahan Rumah');
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

                // Autofit columns
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
            }
        ];
    }
}
