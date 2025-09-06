<?php

namespace App\Filament\Admin\Resources\JobRegistrations\Pages;

use App\Filament\Admin\Resources\JobRegistrations\JobRegistrationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobRegistration extends CreateRecord
{
    protected static string $resource = JobRegistrationResource::class;
}
