<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'PT Teknologi Maju Indonesia',
                'description' => 'Perusahaan teknologi terdepan yang berfokus pada pengembangan solusi digital inovatif untuk berbagai industri.',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
                'phone' => '021-12345678',
                'email' => 'info@teknologimaju.co.id',
                'website' => 'https://teknologimaju.co.id',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'CV Digital Marketing Pro',
                'description' => 'Agensi pemasaran digital yang membantu bisnis berkembang melalui strategi marketing online yang efektif.',
                'address' => 'Jl. Asia Afrika No. 45, Bandung',
                'phone' => '022-87654321',
                'email' => 'hello@digitalmarketingpro.com',
                'website' => 'https://digitalmarketingpro.com',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'PT Finansial Sejahtera',
                'description' => 'Perusahaan konsultan keuangan dan akuntansi yang melayani berbagai jenis bisnis dari UMKM hingga korporasi.',
                'address' => 'Jl. Tunjungan No. 67, Surabaya',
                'phone' => '031-11223344',
                'email' => 'contact@finansialsejahtera.co.id',
                'website' => 'https://finansialsejahtera.co.id',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Studio Kreatif Nusantara',
                'description' => 'Studio desain kreatif yang mengkhususkan diri dalam branding, desain grafis, dan konten visual untuk berbagai media.',
                'address' => 'Jl. Malioboro No. 89, Yogyakarta',
                'phone' => '0274-556677',
                'email' => 'info@kreatifnusantara.com',
                'website' => 'https://kreatifnusantara.com',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'PT Sumber Daya Unggul',
                'description' => 'Perusahaan konsultan HR dan manajemen SDM yang membantu organisasi mengoptimalkan potensi karyawan.',
                'address' => 'Jl. HR Rasuna Said No. 12, Jakarta Selatan',
                'phone' => '021-99887766',
                'email' => 'hr@sumberdayaunggul.co.id',
                'website' => 'https://sumberdayaunggul.co.id',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'CV Berkah Sales Indonesia',
                'description' => 'Perusahaan distribusi dan penjualan dengan jaringan yang luas di seluruh Indonesia.',
                'address' => 'Jl. Gatot Subroto No. 34, Medan',
                'phone' => '061-44556677',
                'email' => 'sales@berkahsales.co.id',
                'website' => 'https://berkahsales.co.id',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'PT Data Analitik Solusi',
                'description' => 'Perusahaan yang menyediakan layanan analisis data dan business intelligence untuk membantu pengambilan keputusan bisnis.',
                'address' => 'Jl. Jendral Sudirman No. 56, Jakarta Pusat',
                'phone' => '021-33445566',
                'email' => 'analytics@dataanalitik.co.id',
                'website' => 'https://dataanalitiksolusi.co.id',
                'logo' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Bali Creative Content',
                'description' => 'Agensi konten kreatif yang berlokasi di Bali, mengkhususkan diri dalam pembuatan konten digital untuk brand dan bisnis.',
                'address' => 'Jl. Sunset Road No. 78, Seminyak, Bali',
                'phone' => '0361-223344',
                'email' => 'hello@balicreativity.com',
                'website' => 'https://balicreativity.com',
                'logo' => null,
                'is_active' => true,
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }

        $this->command->info('Company seeder completed successfully!');
    }
}
