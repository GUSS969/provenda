<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Penyelenggara;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah penyelenggara sudah ada, kalau belum buat baru
        $penyelenggara1 = Penyelenggara::where('email', 'info@eventbengkalis.com')->first();
        if (!$penyelenggara1) {
            $penyelenggara1 = Penyelenggara::create([
                'nama' => 'Bengkalis Creative Events',
                'email' => 'info@eventbengkalis.com',
                'telepon' => '0766-21234',
                'alamat' => 'Jl. Sultan Syarif Kasim No. 45, Bengkalis',
            ]);
        }

        $penyelenggara2 = Penyelenggara::where('email', 'contact@festivalbengkalis.com')->first();
        if (!$penyelenggara2) {
            $penyelenggara2 = Penyelenggara::create([
                'nama' => 'Festival Bengkalis Production',
                'email' => 'contact@festivalbengkalis.com',
                'telepon' => '0766-22456',
                'alamat' => 'Jl. Antang Kalang No. 67, Bengkalis',
            ]);
        }

        $penyelenggara3 = Penyelenggara::where('email', 'hello@budayariau.com')->first();
        if (!$penyelenggara3) {
            $penyelenggara3 = Penyelenggara::create([
                'nama' => 'Budaya Riau Event Organizer',
                'email' => 'hello@budayariau.com',
                'telepon' => '0766-23789',
                'alamat' => 'Jl. Pasar Baru No. 12, Bengkalis',
            ]);
        }

        // Data Event Sample Bengkalis
        $events = [
            [
                'nama_event' => 'Festival Pacu Jalur Bengkalis 2024',
                'kategori' => 'Olahraga',
                'tanggal_event' => Carbon::now()->addDays(15)->format('Y-m-d'),
                'waktu' => '08:00 WIB',
                'lokasi' => 'Sungai Siak, Bengkalis',
                'deskripsi' => 'Festival Pacu Jalur merupakan tradisi lomba perahu dayung khas Riau yang diadakan setiap tahun di Bengkalis. Event budaya yang menampilkan kompetisi perahu jalur dengan panjang mencapai 40 meter dan diikuti oleh puluhan tim dari berbagai desa. Acara ini menampilkan keindahan budaya Melayu Riau, musik tradisional, dan kuliner khas Bengkalis. Jangan lewatkan momen bersejarah ini!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara3->id,
            ],
            [
                'nama_event' => 'Pameran Seni Budaya Melayu Riau',
                'kategori' => 'Seni & Budaya',
                'tanggal_event' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'waktu' => '09:00 WIB',
                'lokasi' => 'Gedung Kesenian Bengkalis, Bengkalis',
                'deskripsi' => 'Pameran seni dan budaya yang menampilkan karya-karya seniman lokal Bengkalis dan Riau. Menampilkan lukisan, kerajinan tangan, tenun songket Melayu, ukiran kayu, dan berbagai produk UMKM lokal. Ada juga workshop membuat kerajinan tangan, demo tari Melayu, dan musik tradisional Zapin. Acara gratis untuk umum dengan doorprize menarik!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara1->id,
            ],
            [
                'nama_event' => 'Turnamen Futsal Piala Bupati Bengkalis',
                'kategori' => 'Olahraga',
                'tanggal_event' => Carbon::now()->addDays(20)->format('Y-m-d'),
                'waktu' => '13:00 WIB',
                'lokasi' => 'GOR Bengkalis, Bengkalis',
                'deskripsi' => 'Turnamen futsal terbesar di Bengkalis dengan total hadiah 50 juta rupiah! Diikuti oleh 32 tim dari berbagai kecamatan di Bengkalis. Pertandingan sistem gugur dengan wasit berlisensi PSSI. Terbuka untuk kategori umum dan pelajar. Daftar tim sekarang dan raih gelar juara Piala Bupati Bengkalis 2024!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara2->id,
            ],
            [
                'nama_event' => 'Workshop UMKM: Digital Marketing untuk Produk Lokal',
                'kategori' => 'Pendidikan',
                'tanggal_event' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'waktu' => '13:00 WIB',
                'lokasi' => 'Dinas Koperasi dan UMKM Bengkalis',
                'deskripsi' => 'Workshop gratis khusus pelaku UMKM Bengkalis tentang cara memasarkan produk lokal secara online. Materi meliputi: Cara jualan di Shopee & Tokopedia, Instagram Marketing, Facebook Ads, Foto Produk yang Menarik, dan Packaging. Dibimbing langsung oleh praktisi digital marketing. Peserta mendapat sertifikat dan konsultasi gratis!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara1->id,
            ],
            [
                'nama_event' => 'Festival Kuliner Bengkalis Night Market',
                'kategori' => 'Festival',
                'tanggal_event' => Carbon::now()->addDays(30)->format('Y-m-d'),
                'waktu' => '17:00 WIB',
                'lokasi' => 'Alun-alun Bengkalis',
                'deskripsi' => 'Festival kuliner malam yang menghadirkan lebih dari 80 tenant makanan dan minuman khas Bengkalis dan Riau. Nikmati ikan bakar sungai, lempuk durian, bolu kemojo, dan berbagai kuliner Melayu lainnya. Ada live music setiap malam, kompetisi makan, games berhadiah, dan area bermain anak. Cocok untuk keluarga, free entry!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara2->id,
            ],
            [
                'nama_event' => 'Seminar Nasional: Pengelolaan Sawit Berkelanjutan',
                'kategori' => 'Pendidikan',
                'tanggal_event' => Carbon::now()->addDays(25)->format('Y-m-d'),
                'waktu' => '08:00 WIB',
                'lokasi' => 'Hotel Kartika Sari, Bengkalis',
                'deskripsi' => 'Seminar nasional tentang pengelolaan perkebunan kelapa sawit yang berkelanjutan dan ramah lingkungan. Menghadirkan narasumber dari Kementerian Pertanian, pakar perkebunan, dan praktisi. Materi: Good Agricultural Practice, Sertifikasi ISPO & RSPO, Manajemen Kebun Sawit Modern, dan Solusi Hama Penyakit. Wajib untuk petani dan pekebun sawit!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara1->id,
            ],
            [
                'nama_event' => 'Konser Musik Melayu: Malam Pantun Bengkalis',
                'kategori' => 'Musik',
                'tanggal_event' => Carbon::now()->addDays(18)->format('Y-m-d'),
                'waktu' => '19:30 WIB',
                'lokasi' => 'Pantai Selat Baru, Bengkalis',
                'deskripsi' => 'Konser musik Melayu yang menampilkan artis-artis lokal dan regional. Menampilkan lagu-lagu Melayu klasik, musik gambus, Zapin, dan pantun berbalas. Suasana outdoor di tepi pantai dengan sunset yang indah. Ada booth makanan, merchandise, dan photo booth. Tiket presale hanya 50 ribu! Ajak keluarga nikmati malam Melayu yang meriah!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara3->id,
            ],
            [
                'nama_event' => 'Pameran Produk UMKM & Kerajinan Bengkalis',
                'kategori' => 'Pameran',
                'tanggal_event' => Carbon::now()->addDays(35)->format('Y-m-d'),
                'waktu' => '10:00 WIB',
                'lokasi' => 'Mal Pelayanan Publik Bengkalis',
                'deskripsi' => 'Pameran dan bazar produk UMKM Bengkalis yang menampilkan berbagai produk lokal berkualitas. Dari kerajinan tangan, songket, makanan khas, oleh-oleh, hingga produk pertanian dan perikanan. Ada promo spesial, diskon hingga 50%, dan program kemitraan untuk reseller. Dukung produk lokal Bengkalis!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara2->id,
            ],
            [
                'nama_event' => 'Pelatihan Budidaya Ikan Air Tawar untuk Pemula',
                'kategori' => 'Pendidikan',
                'tanggal_event' => Carbon::now()->addDays(12)->format('Y-m-d'),
                'waktu' => '09:00 WIB',
                'lokasi' => 'Dinas Perikanan Bengkalis',
                'deskripsi' => 'Pelatihan gratis budidaya ikan air tawar (lele, nila, patin) untuk masyarakat Bengkalis. Materi: Pembuatan Kolam, Pemilihan Bibit, Pakan, Pengelolaan Air, Pencegahan Penyakit, dan Strategi Pemasaran. Peserta mendapat starter kit bibit ikan dan pakan gratis! Dibimbing oleh ahli perikanan berpengalaman. Daftar segera, kuota terbatas!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara1->id,
            ],
            [
                'nama_event' => 'Festival Ogoh-Ogoh dan Barongsai Bengkalis',
                'kategori' => 'Festival',
                'tanggal_event' => Carbon::now()->addDays(40)->format('Y-m-d'),
                'waktu' => '18:00 WIB',
                'lokasi' => 'Jalan Utama Kota Bengkalis',
                'deskripsi' => 'Festival seni budaya yang menampilkan arak-arakan ogoh-ogoh dan pertunjukan barongsai dari berbagai komunitas di Bengkalis. Menampilkan keberagaman budaya yang harmonis di Bengkalis. Ada penampilan tari, musik etnik, dan kuliner dari berbagai etnis. Event yang menggambarkan toleransi dan persatuan masyarakat Bengkalis!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara2->id,
            ],
            [
                'nama_event' => 'Fun Bike & Jalan Sehat: Bengkalis Bersih dan Sehat',
                'kategori' => 'Olahraga',
                'tanggal_event' => Carbon::now()->addDays(28)->format('Y-m-d'),
                'waktu' => '06:00 WIB',
                'lokasi' => 'Start: Kantor Bupati Bengkalis',
                'deskripsi' => 'Fun bike dan jalan sehat dalam rangka kampanye hidup sehat dan lingkungan bersih di Bengkalis. Rute sepanjang 10 KM melewati objek wisata dan spot foto menarik. Setiap peserta mendapat jersey, goodie bag, dan doorprize. Ada pemeriksaan kesehatan gratis dan senam bersama di finish. Gratis untuk semua umur! Daftar online sekarang!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara2->id,
            ],
            [
                'nama_event' => 'Malam Apresiasi Seni: Teater dan Puisi Bengkalis',
                'kategori' => 'Seni & Budaya',
                'tanggal_event' => Carbon::now()->addDays(22)->format('Y-m-d'),
                'waktu' => '19:00 WIB',
                'lokasi' => 'Taman Budaya Bengkalis',
                'deskripsi' => 'Malam apresiasi seni yang menampilkan pertunjukan teater modern, pembacaan puisi, dan monolog dari seniman lokal Bengkalis. Tema "Bengkalis Masa Depan" yang mengangkat isu lingkungan, pendidikan, dan pembangunan daerah. Acara gratis dengan kapasitas terbatas. Cocok untuk pelajar, mahasiswa, dan pecinta seni. Book your seat!',
                'poster' => null,
                'penyelenggara_id' => $penyelenggara3->id,
            ],
        ];

        // Insert ke database
        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('✅ Berhasil membuat ' . count($events) . ' event sample untuk Bengkalis!');
    }
}