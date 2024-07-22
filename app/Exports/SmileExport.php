<?php

namespace App\Exports;

use App\Models\Form;
use App\Models\Pendaftaran\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SmileExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $guru = Pendaftaran::all();
        $data = $guru->map(function ($item, $index) {
            // Hapus kolom 'id' dari hasil toArray()
            $itemArray = $item->toArray();
            unset($itemArray['id']);
            unset($itemArray['created_at']);
            unset($itemArray['updated_at']);
            unset($itemArray['user_id']);
            unset($itemArray['nama_pendamping']);
            unset($itemArray['no_pendamping']);
            unset($itemArray['kta']);

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
            'nama_lengkap',
            'kelas',
            'asal_sekolah',
            'alamat_asal_sekolah',
            'hp',
            'email',
            'nik',
            'no_kk',
            'tanggal_lahir',
            'nama_ibu_kandung',
            'alamat',
            'jurusan1',
            'jurusan2',
        ];
    }
}
