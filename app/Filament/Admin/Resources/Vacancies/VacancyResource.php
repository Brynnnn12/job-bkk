<?php

namespace App\Filament\Admin\Resources\Vacancies;

use App\Filament\Admin\Resources\Vacancies\Pages\CreateVacancy;
use App\Filament\Admin\Resources\Vacancies\Pages\EditVacancy;
use App\Filament\Admin\Resources\Vacancies\Pages\ListVacancies;
use App\Filament\Admin\Resources\Vacancies\Schemas\VacancyForm;
use App\Filament\Admin\Resources\Vacancies\Tables\VacanciesTable;
use App\Models\Vacancy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Vacancy';

    public static function form(Schema $schema): Schema
    {
        return VacancyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VacanciesTable::configure($table);
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
            'index' => ListVacancies::route('/'),
            'create' => CreateVacancy::route('/create'),
            'edit' => EditVacancy::route('/{record}/edit'),
        ];
    }
}
