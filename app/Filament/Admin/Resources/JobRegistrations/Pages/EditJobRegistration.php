<?php

namespace App\Filament\Admin\Resources\JobRegistrations\Pages;

use App\Filament\Admin\Resources\JobRegistrations\JobRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJobRegistration extends EditRecord
{
    protected static string $resource = JobRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
