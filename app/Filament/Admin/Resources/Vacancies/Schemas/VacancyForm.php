<?php

namespace App\Filament\Admin\Resources\Vacancies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VacancyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                TextInput::make('fee')
                    ->numeric(),
                Select::make('status')
                    ->options(['open' => 'Open', 'closed' => 'Closed'])
                    ->default('open')
                    ->required(),
            ]);
    }
}
