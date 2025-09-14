<?php

namespace App\Filament\Admin\Resources\PersonalityTests;

use App\Filament\Admin\Resources\PersonalityTests\Pages\CreatePersonalityTest;
use App\Filament\Admin\Resources\PersonalityTests\Pages\EditPersonalityTest;
use App\Filament\Admin\Resources\PersonalityTests\Pages\ListPersonalityTests;
use App\Filament\Admin\Resources\PersonalityTests\Schemas\PersonalityTestForm;
use App\Filament\Admin\Resources\PersonalityTests\Tables\PersonalityTestsTable;
use App\Models\PersonalityTest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PersonalityTestResource extends Resource
{
    protected static ?string $model = PersonalityTest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocument;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('admin/personality_tests.personality_test');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin/personality_tests.personality_tests');
    }

    public static function form(Schema $schema): Schema
    {
        return PersonalityTestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PersonalityTestsTable::configure($table);
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
            'index' => ListPersonalityTests::route('/'),
            'create' => CreatePersonalityTest::route('/create'),
            'edit' => EditPersonalityTest::route('/{record}/edit'),
        ];
    }
}
