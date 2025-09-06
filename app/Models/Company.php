<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Company extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'description',
        'logo',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()  // Tidak update slug jika model diupdate
            ->slugsShouldBeNoLongerThan(50) // Batasi panjang slug
            ->usingSeparator('-');          // Gunakan separator tertentu
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the vacancies for the company.
     */
    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
