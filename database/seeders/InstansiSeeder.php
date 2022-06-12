<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Seeder;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instansi::create([
            'nama'      => 'Badan Pengelolaan Pajak dan Retribusi Daerah',
            'alamat'    => 'Jl. Jendral Sudirman No. 67',
            'email'     => 'bpprdkabbatola@gmail.com',
            'telepon'   => '(0511) 4799002',
            'gambar'    => 'default-gambar-instansi.png',
            'pimpinan'  => 'Ir. H. Gusti Rosa Syahrum',
            'profile'   => '<p align="justify">Berawal tahun 1985 Keberadaan Dinas Pendapatan Daerah (Dispenda) masih bergabung/bagian dari Pemerintah Daerah, sampai dengan tahun 1989 Dispenda pindah Ke Kantor baru di Jalan Jenderal Sudirman yang namanya masih tetap Dinas Pendapatan Daerah Kabupaten Barito Kuala. Pada tahun 2007 Kantor tersebut bergabung dengan Bagian Keuangan/Aset yang bernama Badan Pengelolaan Keuangan dan Aset Daerah. Pada tahun/akhir 2016 Dinas Pendapatan Daerah berubah menjadi Badan Pengelolaan Pajak dan Retribusi Daerah dan memisah dengan Badan Pengelolaan Keuangan dan Aset Daerah.</p>',
            'visi_misi' => '<p><h2><b>Visi dan Misi</b></h2></p>
            <p align="justify">Visi Badan Pengelolaan Pajak dan Retribusi Daerah adalah “Terwujudnya Dipenda sebagai Organisasi yang Profesional, Transparan, dan Akuntabel dalam rangka Peningkatan Pendapatan Daerah </p>
            <p align="justify">Untuk mewujudkan Visi Badan Pengelolaan Pajak dan Retribusi Daerah, maka ditetapkan misi sebagai berikut : </p>
            <p align="justify">1. Meningkatnya Profesionalisme Aparatur dalam Rangka Peningkatan Pendapatan Pajak Daerah.</p>
            <p align="justify">2. Menciptakan Keterbukaan, Keadilan dan Kepastian Hukum dalam kegiatan penerimaan Pendapatan Pajak Daerah.</p>
            <p align="justify">3. Meningkatnya Pengawasan terhadap Kegiatan Pendapatan Pajak Daerah.</p>
            <p align="justify">4. Meningkatnya Pendapatan Daerah Melalui Ekstensifikasi dan Intensifikasi Pendapatan Pajak Daerah.</p></center>',
        ]);
    }
}
