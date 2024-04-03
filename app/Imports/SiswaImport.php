<?php

namespace App\Imports;

use App\Models\Data\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $tanggal_lahir = null;
        if (isset($row['tanggal_lahir'])) {
            $tanggal_lahir = $row['tanggal_lahir'];
            // Validasi apakah tanggal lahir adalah format yang benar, misalnya YYYY-MM-DD
            if (!strtotime($tanggal_lahir)) {
                // Tanggal lahir tidak valid, beri nilai default atau tindakan lainnya
                $tanggal_lahir = null;
            }
        }

        return new Siswa([
            'nisn' => $row['nisn'],
            'nik' => $row['nik'],
            'nama_lengkap' => $row['nama_lengkap'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $row['agama'],
            'email' => $row['email'],
            'hp' => $row['hp'],
            'alamat' => $row['alamat'],
            'provinsi' => $row['provinsi'],
            'kota_kabupaten' => $row['kota_kabupaten'],
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['kelurahan'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function startRow(): int
    {
        return 2; // Mulai dari baris kedua karena baris pertama adalah header
    }
}
