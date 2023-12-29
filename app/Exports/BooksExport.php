<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BooksExport implements FromQuery, WithTitle, WithHeadings, WithStyles, ShouldAutoSize, WithEvents, WithMapping

{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        if (Auth::user()->role_id == 2) {
            return Book::query()->orderBy('updated_at', 'DESC');;
        }
        return Book::where('user_id', Auth::user()->id);
    }
    public function title(): string
    {
        return 'Data Buku';
    }

    public function map($item): array
    {
        return [
            $item->title,
            $item->category->name,
            $item->user->name,
            $item->description,
            $item->quantity,
            $item->created_at,
            $item->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Judul Buku *',
            'Kategori *',
            'Pengunggah *',
            'Deskripsi *',
            'Jumlah *',
            'Disimpan Pada *',
            'Diperbarui Pada *',
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
        ];
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function (AfterSheet $event) {
                $highestRow = $event->sheet->getHighestRow();
                $highestColumn = $event->sheet->getHighestColumn();
                $lastCell = $highestColumn . $highestRow;
                $rangeCell = 'A1:' . $lastCell;
                $event->sheet->getDelegate()->getStyle($rangeCell)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            },
        ];
    }
}
