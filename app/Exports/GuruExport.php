<?php

namespace App\Exports;

use App\Models\Data\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class GuruExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $guru = Guru::all();
        $data = $guru->map(function ($item, $index) {
            // Hapus kolom 'id' dari hasil toArray()
            $itemArray = $item->toArray();
            unset($itemArray['id']);
            unset($itemArray['created_at']);
            unset($itemArray['updated_at']);

            // Menggabungkan nomor urutan dan data siswa
            return array_merge([$index + 1], $itemArray);
        });

        return $data;
    }
    public function headings(): array
    {
        // Definisi header yang ingin Anda tambahkan
        return [
            'no',
            'nip',
            'nik',
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'email',
            'hp',
            'alamat',
            'provinsi',
            'kota_kabupaten',
            'kecamatan',
            'kelurahan',
        ];
    }
}
