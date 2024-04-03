@extends('landing.layouts.Layout')

@section('content')
    <div>
        <div class="h-[300px] rounded-br-[200px]" style="background-image: url('assets/img/bg-profile.jpg');">
            <div class="flex items-center h-full lg:w-5/12 justify-center">
                <h1 class="font-bold text-4xl text-white">Pendaftaran</h1>
            </div>
        </div>
    </div>
    <div class="py-[80px]">
        <div class="flex flex-col md:flex-row justify-center items-center gap-2">
            <h1 class="text-center font-bold text-2xl text-[#176B87]">Form Pendaftaran</h1>
            <div class="w-20 md:w-0 md:h-10 bg-[#176B87] p-[2px]"></div>
            <p class="font-medium md:text-xl">SMK Bandung Timur</p>
        </div>
    </div>
    @if ($jadwal)
        @if (strtotime('now') >= strtotime($jadwal->date_start) && strtotime('now') <= strtotime($jadwal->date_end))
            {{ $errors }}
            <section>
                <form action="{{ url('/pendaftaran/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5">
                        <div class="bg-[#176B87] p-4">
                            <h1 class="font-medium text-white">Program Keahlian</h1>
                        </div>
                        <div class="border border-[#176B87] rounded-b-md p-2 grid grid-cols-1 lg:grid-cols-3 gap-2">
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pilihan 1</label>
                                <select name="pilih_jurusan" id=""
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('pilih_jurusan') }}">
                                    <option value="">Pilih</option>
                                    <option @if (old('pilih_jurusan') == 'Teknik Kendaraan Ringan Otomotif') selected @endif
                                        value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif
                                    </option>
                                    <option @if (old('pilih_jurusan') == 'Teknik Komputer dan Jaringan') selected @endif
                                        value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan
                                    </option>
                                    <option @if (old('pilih_jurusan') == 'Teknik Bisnis dan Sepeda Motor') selected @endif
                                        value="Teknik Bisnis dan Sepeda Motor">Teknik Bisnis dan Sepeda Motor</option>
                                    <option @if (old('pilih_jurusan') == 'Akuntansi dan Keuangan Lembaga') selected @endif
                                        value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                                    <option @if (old('pilih_jurusan') == 'Perhotelan') selected @endif value="Perhotelan">Perhotelan
                                    </option>
                                </select>
                                @error('pilih_jurusan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pilihan 2</label>
                                <select name="pilih_jurusan1" id=""
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('pilih_jurusan1') }}">
                                    <option value="">Pilih</option>
                                    <option @if (old('pilih_jurusan1') == 'Teknik Kendaraan Ringan Otomotif') selected @endif
                                        value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif
                                    </option>
                                    <option @if (old('pilih_jurusan1') == 'Teknik Komputer dan Jaringan') selected @endif
                                        value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan
                                    </option>
                                    <option @if (old('pilih_jurusan1') == 'Teknik Bisnis dan Sepeda Motor') selected @endif
                                        value="Teknik Bisnis dan Sepeda Motor">Teknik Bisnis dan Sepeda Motor</option>
                                    <option @if (old('pilih_jurusan1') == 'Akuntansi dan Keuangan Lembaga') selected @endif
                                        value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                                    <option @if (old('pilih_jurusan1') == 'Perhotelan') selected @endif value="Perhotelan">Perhotelan
                                    </option>
                                </select>
                                @error('pilih_jurusan1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="bg-[#176B87] p-4">
                            <h1 class="font-medium text-white">Data Diri</h1>
                        </div>
                        <div class="border border-[#176B87] rounded-b-md p-2 grid grid-cols-1 lg:grid-cols-3 gap-2">
                            <div class="flex flex-col  lg:col-span-2">
                                <label for="" class="p-2">Nama Lengkap</label>
                                <input name="nama_siswa" type="text" placeholder="Nama lengkap"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nama_siswa') }}">
                                @error('nama_siswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">No NIK</label>
                                <input name="nik" type="text" placeholder="No nik"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" placeholder="Tempat lahir"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" placeholder="Tanggal lahir"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">jenis Kelamin</label>
                                <select name="jenis_kelamin" id=""
                                    class="p-2 shadow-md border outline-none bg-white">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki
                                    </option>
                                    <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Agama</label>
                                <select name="agama" id="" class="p-2 shadow-md border outline-none bg-white">
                                    <option value="">Pilih</option>
                                    <option value="Islam" @if (old('agama') == 'Islam') selected @endif>Islam
                                    </option>
                                    <option value="Kristen Khatolik" @if (old('agama') == 'Kristen Khatolik') selected @endif>
                                        Kristen Khatolik
                                    </option>
                                    <option value="Kristen Protestan" @if (old('agama') == 'Kristen Protestan') selected @endif>
                                        Kristen Protestan
                                    </option>
                                    <option value="Budha" @if (old('agama') == 'Budha') selected @endif>Budha
                                    </option>
                                    <option value="Hindu" @if (old('agama') == 'Hindu') selected @endif>Hindu
                                    </option>
                                </select>
                                @error('agama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Alat Transportasi ke Sekolah</label>
                                <input name="transportasi" type="text" placeholder="Alat Transportasi ke Sekolah"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('transportasi') }}">
                                @error('transportasi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Anak ke</label>
                                <input name="anak_ke" type="text" placeholder="Anak ke"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('anak_ke') }}">
                                @error('anak_ke')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Tinggi badan</label>
                                <input name="t_badan" type="number" placeholder="Tinggi badan"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('t_badan') }}">
                                @error('t_badan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Berat badan</label>
                                <input name="b_badan" type="number" placeholder="Berat badan"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('b_badan') }}">
                                @error('b_badan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Ukuran Baju</label>
                                <input name="ukuran_baju" type="text" placeholder="Ukuran baju"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('ukuran_baju') }}">
                                @error('ukuran_baju')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">KIP/PKH/KPS</label>
                                <select name="kip" id="" class="p-2 shadow-md border outline-none bg-white">
                                    <option value="">Pilih</option>
                                    <option value="Ya" @if (old('kip') == 'Ya') selected @endif>Ya
                                    </option>
                                    <option value="Tidak" @if (old('kip') == 'Tidak') selected @endif>Tidak
                                    </option>
                                </select>
                                @error('kip')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Bahasa sehari-hari</label>
                                <input name="bahasa" type="text" placeholder="Bahasa sehari-hari"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('bahasa') }}">
                                @error('bahasa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Hobi</label>
                                <input name="hobi" type="text" placeholder="Hobi"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('hobi') }}">
                                @error('hobi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Cita - cita</label>
                                <input name="cita_cita" type="text" placeholder="Cita - cita"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('cita_cita') }}">
                                @error('cita_cita')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Email</label>
                                <input name="email" type="text" placeholder="Email"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">No Wa / Telepon</label>
                                <input name="hp" type="text" placeholder="No telepon"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('hp') }}">
                                @error('hp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Jenis pendaftaran</label>
                                <select name="jenis_pendaftaran" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('jenis_pendaftaran') }}">
                                    <option value="">Pilih</option>
                                    <option @if (old('jenis_pendaftaran') == 'Baru') selected @endif value="Baru">Baru
                                    </option>
                                    <option @if (old('jenis_pendaftaran') == 'Pindah') selected @endif value="Pindah">Pindah
                                    </option>
                                </select>
                                @error('jenis_pendaftaran')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="bg-[#176B87] p-4">
                            <h1 class="font-medium text-white">Data Alamat</h1>
                        </div>
                        <div class="border border-[#176B87] rounded-b-md p-2 grid grid-cols-1 lg:grid-cols-3 gap-2">
                            <div class="flex flex-col  lg:col-span-2">
                                <label for="" class="p-2">Alamat Lengkap</label>
                                <textarea name="alamat" id="" cols="5" rows="5" class="bg-white">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Kode Pos</label>
                                <input name="kode_pos" type="text" placeholder="Kode pos"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('kode_pos') }}">
                                @error('kode_pos')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Provinsi</label>
                                <select name="provinsi" id="provinsi"
                                    class="p-2 shadow-md border outline-none bg-white">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                @error('provinsi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Kab/Kota</label>
                                <select name="kota_kabupaten" id="kota"
                                    class="p-2 shadow-md border outline-none bg-white">
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                                @error('kota_kabupaten')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Kecamatan</label>
                                <select name="kecamatan" id="kecamatan"
                                    class="p-2 shadow-md border outline-none bg-white">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('kecamatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Kelurahan</label>
                                <select name="kelurahan" id="kelurahan" class="p-2 shadow-md border outline-none">
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                                @error('kelurahan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="bg-[#176B87] p-4">
                            <h1 class="font-medium text-white">Data Pendidikan</h1>
                        </div>
                        <div class="border border-[#176B87] rounded-b-md p-2 grid grid-cols-1 lg:grid-cols-3 gap-2">
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Asal Sekolah</label>
                                <input name="nama_sekolah" type="text" placeholder="Asal sekolah"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nama_sekolah') }}">
                                @error('nama_sekolah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col  lg:col-span-2">
                                <label for="" class="p-2">Alamat sekolah</label>
                                <textarea name="alamat_sekolah_asal" id="" cols="5" rows="5">{{ old('alamat_sekolah_asal') }}</textarea>
                                @error('alamat_sekolah_asal')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Kota/Kabupaten</label>
                                <input name="kota_sekolah_asal" type="text" placeholder="Kota Asal sekolah"
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('kota_sekolah_asal') }}">
                                @error('kota_sekolah_asal')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Tahun lulus</label>
                                <input name="tahun_lulus" type="number" placeholder="Tahun Lulus"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('tahun_lulus') }}">
                                @error('tahun_lulus')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Tanggal ijazah</label>
                                <input name="tanggal_ijazah" type="date" placeholder="Tanggal ijazah"
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('tanggal_ijazah') }}">
                                @error('tanggal_ijazah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Nomor peserta UN</label>
                                <input name="nomor_peserta_un" type="text" placeholder="Nomor peserta UN"
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('nomor_peserta_un') }}">
                                @error('nomor_peserta_un')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">NISN</label>
                                <input name="nisn" type="text" placeholder="NISN"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nisn') }}">
                                @error('nisn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Nomor seri SKHUN</label>
                                <input name="nomor_skhun" type="text" placeholder="Nomor Seri SKHUN"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nomor_skhun') }}">
                                @error('nomor_skhun')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <label for="" class="p-2">Nomor seri Ijazah</label>
                                <input name="nomor_ijazah" type="text" placeholder="Nomor Seri Ijazah"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nomor_ijazah') }}">
                                @error('nomor_ijazah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="bg-[#176B87] p-4">
                            <h1 class="font-medium text-white">Data Orang Tua</h1>
                        </div>
                        <div class="border border-[#176B87] rounded-b-md p-2 grid grid-cols-1 lg:grid-cols-3 gap-2">
                            <div class="flex flex-col lg:col-span-2">
                                <label for="" class="p-2">Nama Lengkap Ayah</label>
                                <input name="nama_ayah" type="text" placeholder="Nama lengkap ayah"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nama_ayah') }}">
                                @error('nama_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">No KTP</label>
                                <input name="no_ktp_ayah" type="text" placeholder="Pekerjaan ayah"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('no_ktp_ayah') }}">
                                @error('no_ktp_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Tempat Lahir</label>
                                <input name="tempat_lahir_ayah" type="text" placeholder="Tempat Lahir"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('tempat_lahir_ayah') }}">
                                @error('tempat_lahir_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Tanggal Lahir</label>
                                <input name="tanggal_lahir_ayah" type="date" placeholder="Tanggal Lahir"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('tanggal_lahir_ayah') }}">
                                @error('tanggal_lahir_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Gol Darah</label>
                                <input name="gol_darah_ayah" type="text" placeholder="Tanggal Lahir"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('gol_darah_ayah') }}">
                                @error('gol_darah_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pekerjaan Ayah</label>
                                <select name="pekerjaan_ayah" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('pekerjaan_ayah') }}">
                                    <option value="">pilih</option>
                                    <option @if (old('pekerjaan_ayah') == 'PNS') selected @endif value="PNS">PNS</option>
                                    <option @if (old('pekerjaan_ayah') == 'BUMN/D') selected @endif value="BUMN/D">BUMN/D
                                    </option>
                                    <option @if (old('pekerjaan_ayah') == 'Swasta') selected @endif value="Swasta">Swasta
                                    </option>
                                    <option @if (old('pekerjaan_ayah') == 'Polri') selected @endif value="Polri">Polri
                                    </option>
                                    <option @if (old('pekerjaan_ayah') == 'TNI') selected @endif value="TNI">TNI</option>
                                </select>
                                @error('pekerjaan_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Alamat Tempat Kerja</label>
                                <textarea name="alamat_pekerjaan_ayah" type="text" placeholder="Pekerjaan ayah"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('alamat_pekerjaan_ayah') }}">{{ old('alamat_pekerjaan_ayah') }}</textarea>
                                @error('alamat_pekerjaan_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pendidikan Ayah</label>
                                <select name="pendidikan_ayah" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('pendidikan_ayah') }}">
                                    <option value="">pilih
                                    </option>
                                    <option @if (old('pendidikan_ayah') == 'SD') selected @endif value="SD">SD</option>
                                    <option @if (old('pendidikan_ayah') == 'SMP') selected @endif value="SMP">SMP</option>
                                    <option @if (old('pendidikan_ayah') == 'SMA') selected @endif value="SMA">SMA</option>
                                    <option @if (old('pendidikan_ayah') == 'D I') selected @endif value="D I">D I</option>
                                    <option @if (old('pendidikan_ayah') == 'D III') selected @endif value="D III">D III
                                    </option>
                                    <option @if (old('pendidikan_ayah') == 'S1') selected @endif value="S1">S1</option>
                                    <option @if (old('pendidikan_ayah') == 'S2') selected @endif value="S2">S2</option>
                                    <option @if (old('pendidikan_ayah') == 'S3') selected @endif value="S3">S3</option>
                                </select>
                                @error('pendidikan_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Penghasilan Ayah</label>
                                <select name="penghasilan_ayah" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('penghasilan_ayah') }}">
                                    <option value="">pilih</option>
                                    <option @if (old('penghasilan_ayah') == '< Rp. 1.00.000') selected @endif value="< Rp. 1.00.000">
                                        < Rp. 1.00.000</option>
                                    <option @if (old('penghasilan_ayah') == 'Rp. 1.00.000 - Rp. 250.000') selected @endif
                                        value="Rp. 1.00.000 - Rp. 250.000">Rp. 1.00.000 - Rp. 250.000</option>
                                    <option @if (old('penghasilan_ayah') == 'Rp. 250.000 - Rp. 450.000') selected @endif
                                        value="Rp. 250.000 - Rp. 450.000">Rp. 250.000 - Rp. 450.000</option>
                                    <option @if (old('penghasilan_ayah') == 'Rp. 450.000 - Rp. 1.000.000') selected @endif
                                        value="Rp. 450.000 - Rp. 1.000.000">Rp. 450.000 - Rp. 1.000.000</option>
                                    <option @if (old('penghasilan_ayah') == 'Rp. 1.000.000 - Rp. 1.500.000') selected @endif
                                        value="Rp. 1.000.000 - Rp. 1.500.000">Rp. 1.000.000 - Rp. 1.500.000</option>
                                    <option @if (old('penghasilan_ayah') == 'Rp. 1.500.000 - Rp. 2.000.000') selected @endif
                                        value="Rp. 1.500.000 - Rp. 2.000.000">Rp. 1.500.000 - Rp. 2.000.000</option>
                                    <option @if (old('penghasilan_ayah') == '> Rp. 2.000.000') selected @endif value="> Rp. 2.000.000"> >
                                        Rp. 2.000.000</option>
                                </select>
                                @error('penghasilan_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Kode Pos</label>
                                <input name="kode_pos_ayah" type="text" placeholder="Kode pos"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('kode_pos_ayah') }}">
                                @error('kode_pos_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">No Hp</label>
                                <input name="nohp_ayah" type="text" placeholder="No hp"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nohp_ayah') }}">
                                @error('nohp_ayah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-col lg:col-span-2">
                                <label for="" class="p-2">Nama Lengkap Ibu</label>
                                <input name="nama_ibu" type="text" placeholder="Nama lengkap ibu"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nama_ibu') }}">
                                @error('nama_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">No KTP</label>
                                <input name="no_ktp_ibu" type="text" placeholder="Pekerjaan Ibu"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('no_ktp_ibu') }}">
                                @error('no_ktp_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Tempat Lahir</label>
                                <input name="tempat_lahir_ibu" type="text" placeholder="Tempat Lahir"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('tempat_lahir_ibu') }}">
                                @error('tempat_lahir_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Tanggal Lahir</label>
                                <input name="tanggal_lahir_ibu" type="date" placeholder="Tanggal Lahir"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('tanggal_lahir_ibu') }}">
                                @error('tanggal_lahir_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Gol Darah</label>
                                <input name="gol_darah_ibu" type="text" placeholder="Tanggal Lahir"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('gol_darah_ibu') }}">
                                @error('gol_darah_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pekerjaan ibu</label>
                                <select name="pekerjaan_ibu" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('pekerjaan_ibu') }}">
                                    <option value="">pilih</option>
                                    <option @if (old('pekerjaan_ibu') == 'PNS') selected @endif value="PNS">PNS</option>
                                    <option @if (old('pekerjaan_ibu') == 'BUMN/D') selected @endif value="BUMN/D">BUMN/D
                                    </option>
                                    <option @if (old('pekerjaan_ibu') == 'Swasta') selected @endif value="Swasta">Swasta
                                    </option>
                                    <option @if (old('pekerjaan_ibu') == 'Polri') selected @endif value="Polri">Polri
                                    </option>
                                    <option @if (old('pekerjaan_ibu') == 'TNI') selected @endif value="TNI">TNI</option>
                                </select>
                                @error('pekerjaan_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Alamat Tempat Kerja</label>
                                <textarea name="alamat_pekerjaan_ibu" type="text" placeholder="Pekerjaan ibu"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('alamat_pekerjaan_ibu') }}">{{ old('alamat_pekerjaan_ibu') }}</textarea>
                                @error('alamat_pekerjaan_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pendidikan ibu</label>
                                <select name="pendidikan_ibu" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('pendidikan_ibu') }}">
                                    <option value="">pilih</option>
                                    <option @if (old('pendidikan_ibu') == 'SD') selected @endif value="SD">SD</option>
                                    <option @if (old('pendidikan_ibu') == 'SMP') selected @endif value="SMP">SMP</option>
                                    <option @if (old('pendidikan_ibu') == 'SMA') selected @endif value="SMA">SMA</option>
                                    <option @if (old('pendidikan_ibu') == 'D I') selected @endif value="D I">D I</option>
                                    <option @if (old('pendidikan_ibu') == 'D III') selected @endif value="D III">D III
                                    </option>
                                    <option @if (old('pendidikan_ibu') == 'S1') selected @endif value="S1">S1</option>
                                    <option @if (old('pendidikan_ibu') == 'S2') selected @endif value="S2">S2</option>
                                    <option @if (old('pendidikan_ibu') == 'S3') selected @endif value="S3">S3</option>
                                </select>
                                @error('pendidikan_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Penghasilan ibu</label>
                                <select name="penghasilan_ibu" id=""
                                    class="p-2 shadow-md border outline-none bg-white"
                                    value="{{ old('penghasilan_ibu') }}">
                                    <option value="">pilih</option>
                                    <option @if (old('penghasilan_ibu') == '< Rp. 1.00.000') selected @endif value="< Rp. 1.00.000">
                                        < Rp. 1.00.000</option>
                                    <option @if (old('penghasilan_ibu') == 'Rp. 1.00.000 - Rp. 250.000') selected @endif
                                        value="Rp. 1.00.000 - Rp. 250.000">Rp. 1.00.000 - Rp. 250.000</option>
                                    <option @if (old('penghasilan_ibu') == 'Rp. 250.000 - Rp. 450.000') selected @endif
                                        value="Rp. 250.000 - Rp. 450.000">Rp. 250.000 - Rp. 450.000</option>
                                    <option @if (old('penghasilan_ibu') == 'Rp. 450.000 - Rp. 1.000.000') selected @endif
                                        value="Rp. 450.000 - Rp. 1.000.000">Rp. 450.000 - Rp. 1.000.000</option>
                                    <option @if (old('penghasilan_ibu') == 'Rp. 1.000.000 - Rp. 1.500.000') selected @endif
                                        value="Rp. 1.000.000 - Rp. 1.500.000">Rp. 1.000.000 - Rp. 1.500.000</option>
                                    <option @if (old('penghasilan_ibu') == 'Rp. 1.500.000 - Rp. 2.000.000') selected @endif
                                        value="Rp. 1.500.000 - Rp. 2.000.000">Rp. 1.500.000 - Rp. 2.000.000</option>
                                    <option @if (old('penghasilan_ibu') == '> Rp. 2.000.000') selected @endif value="> Rp. 2.000.000"> >
                                        Rp. 2.000.000</option>
                                </select>
                                @error('penghasilan_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Kode Pos</label>
                                <input name="kode_pos_ibu" type="text" placeholder="Kode pos"
                                    class="p-2 shadow-md border outline-none bg-white"value="{{ old('kode_pos_ibu') }}">
                                @error('kode_pos_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">No Hp</label>
                                <input name="nohp_ibu" type="text" placeholder="No hp"
                                    class="p-2 shadow-md border outline-none bg-white" value="{{ old('nohp_ibu') }}">
                                @error('nohp_ibu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="bg-[#176B87] p-4">
                            <h1 class="font-medium text-white">Data Berkas</h1>
                        </div>
                        <div class="border border-[#176B87] rounded-b-md p-2 grid grid-cols-1 lg:grid-cols-3 gap-2">
                            <div class="flex flex-col">
                                <label for="" class="p-2">Pas Foto 3x4</label>
                                <input name="pas_foto" type="file" value="{{ old('pas_foto') }}"
                                    class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                            </div>
                            {{-- <div class="flex flex-col">
                                <label for="" class="p-2">Kartu Keluarga</label>
                                <input name="kartu_keluarga" type="file"
                                    class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Ijazah</label>
                                <input name="ijaza" type="file"
                                    class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="p-2">Akta kelahiran</label>
                                <input name="akta_lahir" type="file"
                                    class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                            </div> --}}
                        </div>
                    </div>
                    <div class="flex justify-end p-5">
                        <button type="submit" class="bg-[#176B87] px-6 py-2 text-white rounded-md">
                            Kirim
                        </button>
                    </div>
                </form>
            </section>
        @else
            <section class="p-5 " data-aos="fade-down">
                <div class="flex justify-center ">
                    <div class="lg:w-[400px]">
                        <img src="assets/img/closed.png" alt="" class="w-full h-full object-cover ">
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="p-5 " data-aos="fade-down">
            <div class="flex justify-center ">
                <div class="lg:w-[400px]">
                    <img src="assets/img/closed.png" alt="" class="w-full h-full object-cover ">
                </div>
            </div>
        </section>
    @endif



    <section class="md:p-10 mt-10">
        <div class="carousel w-full rounded-md">
            <div id="item1" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/kelas.jpg" class="w-full object-cover" />
            </div>
            <div id="item2" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/home-decor-1.jpg" class="w-full object-cover" />
            </div>
            <div id="item3" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/home-decor-2.jpg" class="w-full object-cover" />
            </div>
            <div id="item4" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/home-decor-3.jpg" class="w-full object-cover" />
            </div>
        </div>
        <div class="flex justify-center w-full py-2 gap-2">
            <a href="#item1" class="btn btn-xs">1</a>
            <a href="#item2" class="btn btn-xs">2</a>
            <a href="#item3" class="btn btn-xs">3</a>
            <a href="#item4" class="btn btn-xs">4</a>
        </div>
    </section>



    <script>
        //Provinsi
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                var data = provinces;
                var tampung = '<option>Pilih Provinsi</option>';
                data.forEach(element => {
                    tampung +=
                        `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`
                });
                document.getElementById('provinsi').innerHTML = tampung;
            });

        //Kab/Kota
        const selectProvinsi = document.getElementById('provinsi');
        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then(response => response.json())
                .then(regencies => {
                    var data = regencies;
                    var tampung = '<option>Pilih Kab/Kota</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`
                    });
                    document.getElementById('kota').innerHTML = tampung;
                });
        });

        //Kecamatan
        const selectKota = document.getElementById('kota');
        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.dist;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then(response => response.json())
                .then(districts => {
                    var data = districts;
                    var tampung = '<option>Pilih Kecamatan</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`
                    });
                    document.getElementById('kecamatan').innerHTML = tampung;
                });
        });

        //Kelurahan
        const selectKecamatan = document.getElementById('kecamatan');
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.vill;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then(response => response.json())
                .then(villages => {
                    var data = villages;
                    var tampung = '<option>Pilih Kelurahan</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option  value="${element.name}">${element.name}</option>`
                    });
                    document.getElementById('kelurahan').innerHTML = tampung;
                });
        });
    </script>
    {{-- <script>
        function getProvinces() {
            fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(provinces => {
                    const provinceSelect = document.getElementById('provinsi');
                    provinceSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                    provinces.forEach(province => {
                        const option = document.createElement('option');
                        option.text = province.name;
                        option.value = province.name; // Nilai dari opsi disetel menjadi nama provinsi
                        option.dataset.id = province.id; // Menyimpan ID provinsi ke dalam atribut data
                        provinceSelect.add(option);
                    });
                });
        }

        function getRegencies() {
            const provinceName = document.getElementById('provinsi').value; // Mendapatkan nama provinsi yang dipilih
            const provinceId = document.querySelector(`option[value="${provinceName}"]`).dataset
                .id; // Mendapatkan ID provinsi dari atribut data
            console.log(provinceId);
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                .then(response => response.json())
                .then(regencies => {
                    const regencySelect = document.getElementById('kota');
                    regencySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                    regencies.forEach(regency => {
                        const option = document.createElement('option');
                        option.text = regency.name;
                        option.value = regency.name;
                        option.dataset.id = regency.id;
                        regencySelect.add(option);
                    });
                });
        }
        getProvinces()
    </script> --}}
@endsection
