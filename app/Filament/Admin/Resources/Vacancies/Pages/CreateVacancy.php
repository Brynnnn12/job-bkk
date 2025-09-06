<?php

namespace App\Filament\Admin\Resources\Vacancies\Pages;

use App\Filament\Admin\Resources\Vacancies\VacancyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVacancy extends CreateRecord
{
    protected static string $resource = VacancyResource::class;
}
