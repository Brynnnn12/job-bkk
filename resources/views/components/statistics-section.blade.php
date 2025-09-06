@props(['totalVacancies', 'totalCompanies', 'totalCategories'])

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8 text-center">
            <x-stat-card icon="fas fa-briefcase" count="{{ number_format($totalVacancies) }}" label="Lowongan Aktif"
                color="blue" />
            <x-stat-card icon="fas fa-building" count="{{ number_format($totalCompanies) }}" label="Perusahaan Terdaftar"
                color="green" />
            <x-stat-card icon="fas fa-tags" count="{{ number_format($totalCategories) }}" label="Kategori Pekerjaan"
                color="purple" />
        </div>
    </div>
</section>
