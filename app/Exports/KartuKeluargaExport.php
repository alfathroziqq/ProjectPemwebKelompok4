<?php

namespace App\Exports;

use App\Models\KartuKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class KartuKeluargaExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithCustomStartCell, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Load the 'wilayah' relation
        return KartuKeluarga::with('wilayah')->get();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'No',
            'Nomor KK',
            'Kepala Keluarga',
            'Alamat',
            'Provinsi'
        ];
    }

    /**
    * @param mixed $kartuKeluarga
    * @return array
    */
    public function map($kartuKeluarga): array
    {
        static $number = 0;
        $number++;

        return [
            $number,
            $kartuKeluarga->nomor_kk,
            $kartuKeluarga->kepala_keluarga,
            $kartuKeluarga->alamat,
            // Access the 'nama_provinsi' attribute from the related 'Wilayah' model
            $kartuKeluarga->wilayah->nama_provinsi ?? 'N/A',  // 'N/A' if no wilayah is associated
        ];
    }

    /**
    * @return string
    */
    public function title(): string
    {
        return 'Daftar Kartu Keluarga';
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
                $event->sheet->setCellValue('A1', 'Daftar Kartu Keluarga');
                $event->sheet->mergeCells('A1:E1');
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
                $event->sheet->getStyle('A2:E2')->applyFromArray([
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
                $lastColumn = $event->sheet->getHighestColumn();
                for ($col = 'A'; $col <= $lastColumn; $col++) {
                    $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}
