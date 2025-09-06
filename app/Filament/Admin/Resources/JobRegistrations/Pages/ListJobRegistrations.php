<?php

namespace App\Filament\Admin\Resources\JobRegistrations\Pages;

use App\Filament\Admin\Resources\JobRegistrations\JobRegistrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJobRegistrations extends ListRecords
{
    protected static string $resource = JobRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
