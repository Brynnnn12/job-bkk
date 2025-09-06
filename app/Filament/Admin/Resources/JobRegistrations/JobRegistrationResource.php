<?php

namespace App\Filament\Admin\Resources\JobRegistrations;

use App\Filament\Admin\Resources\JobRegistrations\Pages\CreateJobRegistration;
use App\Filament\Admin\Resources\JobRegistrations\Pages\EditJobRegistration;
use App\Filament\Admin\Resources\JobRegistrations\Pages\ListJobRegistrations;
use App\Filament\Admin\Resources\JobRegistrations\Schemas\JobRegistrationForm;
use App\Filament\Admin\Resources\JobRegistrations\Tables\JobRegistrationsTable;
use App\Models\JobRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JobRegistrationResource extends Resource
{
    protected static ?string $model = JobRegistration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Job Registration';

    public static function form(Schema $schema): Schema
    {
        return JobRegistrationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobRegistrationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobRegistrations::route('/'),
            'create' => CreateJobRegistration::route('/create'),
            'edit' => EditJobRegistration::route('/{record}/edit'),
        ];
    }
}
