<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Category;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Pastikan ada company dan category
        $companies = Company::all();
        $categories = Category::all();

        if ($companies->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('Please seed companies and categories first!');
            return;
        }

        $vacancies = [
            [
                'title' => 'Software Developer',
                'description' => 'Kami mencari Software Developer yang berpengalaman untuk bergabung dengan tim kami. Kandidat ideal memiliki kemampuan coding yang kuat dan pengalaman dalam pengembangan aplikasi web.',
                'requirements' => "- Lulusan S1 Informatika/Komputer atau bidang terkait\n- Pengalaman minimal 2 tahun dalam web development\n- Menguasai PHP, JavaScript, HTML, CSS\n- Familiar dengan framework Laravel dan Vue.js\n- Memahami database MySQL/PostgreSQL\n- Kemampuan problem solving yang baik",
                'location' => 'Jakarta',
                'salary_min' => 8000000,
                'salary_max' => 15000000,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(30),
                'fee' => 50000,
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Teknologi Informasi')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'description' => 'Bergabunglah dengan tim marketing kami sebagai Digital Marketing Specialist. Anda akan bertanggung jawab untuk mengembangkan dan mengeksekusi strategi pemasaran digital.',
                'requirements' => "- Lulusan S1 Marketing, Komunikasi, atau bidang terkait\n- Pengalaman minimal 1 tahun di bidang digital marketing\n- Menguasai Google Ads, Facebook Ads, Instagram Ads\n- Familiar dengan tools analytics seperti Google Analytics\n- Memahami SEO dan SEM\n- Kreatif dan memiliki kemampuan analisis yang baik",
                'location' => 'Bandung',
                'salary_min' => 5000000,
                'salary_max' => 9000000,
                'employment_type' => 'full-time',
                'experience_level' => 'entry-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(25),
                'fee' => 30000,
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Marketing')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Accountant',
                'description' => 'Kami membutuhkan Accountant yang detail-oriented untuk menangani pembukuan dan laporan keuangan perusahaan. Kandidat harus memiliki pemahaman yang kuat tentang prinsip-prinsip akuntansi.',
                'requirements' => "- Lulusan S1 Akuntansi atau Keuangan\n- Pengalaman minimal 2 tahun sebagai accountant\n- Menguasai software akuntansi (MYOB, Accurate, dll)\n- Memahami perpajakan Indonesia\n- Detail-oriented dan teliti\n- Memiliki kemampuan analisis yang baik",
                'location' => 'Surabaya',
                'salary_min' => 6000000,
                'salary_max' => 10000000,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(20),
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Keuangan')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Graphic Designer',
                'description' => 'Kami mencari Graphic Designer yang kreatif untuk membuat desain visual yang menarik untuk berbagai keperluan perusahaan. Kandidat harus memiliki portfolio yang kuat.',
                'requirements' => "- Lulusan D3/S1 Desain Grafis atau bidang terkait\n- Pengalaman minimal 1 tahun sebagai graphic designer\n- Menguasai Adobe Creative Suite (Photoshop, Illustrator, InDesign)\n- Memahami prinsip-prinsip desain\n- Kreatif dan up-to-date dengan tren desain\n- Portfolio yang kuat",
                'location' => 'Yogyakarta',
                'salary_min' => 4000000,
                'salary_max' => 7000000,
                'employment_type' => 'full-time',
                'experience_level' => 'entry-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(35),
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Kreatif')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Human Resources Manager',
                'description' => 'Kami membutuhkan HR Manager yang berpengalaman untuk memimpin tim HR dan mengembangkan strategi sumber daya manusia perusahaan.',
                'requirements' => "- Lulusan S1 Psikologi, Manajemen, atau bidang terkait\n- Pengalaman minimal 3 tahun di bidang HR\n- Memahami employment law dan regulasi ketenagakerjaan\n- Kemampuan leadership dan komunikasi yang baik\n- Berpengalaman dalam recruitment dan talent management\n- Memiliki sertifikasi HR (nilai plus)",
                'location' => 'Jakarta',
                'salary_min' => 12000000,
                'salary_max' => 20000000,
                'employment_type' => 'full-time',
                'experience_level' => 'senior-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(40),
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Sumber Daya Manusia')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Sales Executive',
                'description' => 'Bergabunglah dengan tim sales kami sebagai Sales Executive. Anda akan bertanggung jawab untuk mencapai target penjualan dan mengembangkan hubungan dengan klien.',
                'requirements' => "- Lulusan min. SMA/D3 segala jurusan\n- Pengalaman minimal 1 tahun di bidang sales\n- Memiliki kemampuan komunikasi dan negosiasi yang baik\n- Target-oriented dan hasil-driven\n- Bersedia melakukan perjalanan dinas\n- Memiliki kendaraan sendiri (nilai plus)",
                'location' => 'Medan',
                'salary_min' => 4500000,
                'salary_max' => 8000000,
                'employment_type' => 'full-time',
                'experience_level' => 'entry-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(28),
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Penjualan')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Data Analyst',
                'description' => 'Kami mencari Data Analyst yang dapat menganalisis data bisnis dan memberikan insights yang actionable untuk mendukung pengambilan keputusan strategis.',
                'requirements' => "- Lulusan S1 Statistik, Matematika, atau bidang terkait\n- Pengalaman minimal 2 tahun dalam data analysis\n- Menguasai SQL, Python/R, dan Excel\n- Familiar dengan tools visualisasi data (Tableau, Power BI)\n- Kemampuan analytical thinking yang kuat\n- Mampu berkomunikasi hasil analisis dengan jelas",
                'location' => 'Jakarta',
                'salary_min' => 9000000,
                'salary_max' => 14000000,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(45),
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Data & Analytics')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
            [
                'title' => 'Content Writer',
                'description' => 'Kami membutuhkan Content Writer yang dapat membuat konten berkualitas untuk berbagai platform digital. Kandidat harus memiliki kemampuan menulis yang excellent.',
                'requirements' => "- Lulusan S1 Komunikasi, Sastra, Jurnalistik, atau bidang terkait\n- Pengalaman minimal 1 tahun sebagai content writer\n- Kemampuan menulis bahasa Indonesia dan Inggris yang baik\n- Memahami SEO writing\n- Kreatif dan dapat beradaptasi dengan berbagai tone of voice\n- Portfolio tulisan yang beragam",
                'location' => 'Bali',
                'salary_min' => 5500000,
                'salary_max' => 8500000,
                'employment_type' => 'full-time',
                'experience_level' => 'entry-level',
                'posted_date' => now(),
                'closing_date' => now()->addDays(32),
                'company_id' => $companies->random()->id,
                'category_id' => $categories->where('name', 'Kreatif')->first()?->id ?? $categories->random()->id,
                'is_active' => true,
            ],
        ];

        foreach ($vacancies as $vacancy) {
            Vacancy::create($vacancy);
        }

        $this->command->info('Vacancy seeder completed successfully!');
    }
}
