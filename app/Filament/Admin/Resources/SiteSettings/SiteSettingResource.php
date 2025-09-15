<?php

namespace App\Filament\Admin\Resources\SiteSettings;

use App\Filament\Admin\Resources\SiteSettings\Pages\CreateSiteSetting;
use App\Filament\Admin\Resources\SiteSettings\Pages\EditSiteSetting;
use App\Filament\Admin\Resources\SiteSettings\Pages\ListSiteSettings;
use App\Filament\Admin\Resources\SiteSettings\Schemas\SiteSettingForm;
use App\Filament\Admin\Resources\SiteSettings\Tables\SiteSettingsTable;
use App\Models\Setting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    public static function getModelLabel(): string
    {
        return __('admin/settings.setting');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin/settings.settings');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    public static function form(Schema $schema): Schema
    {
        return SiteSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteSettingsTable::configure($table);
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
            'index' => ListSiteSettings::route('/'),
            // 'create' => CreateSiteSetting::route('/create'),
            'edit' => EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
