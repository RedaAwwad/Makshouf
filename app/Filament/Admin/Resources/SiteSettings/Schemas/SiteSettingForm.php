<?php

namespace App\Filament\Admin\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('website_name')
                    ->label(__('admin/settings.website_name'))
                    ->required(),

                Grid::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        FileUpload::make('logo')
                            ->label(__('admin/settings.logo'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(3072),

                        FileUpload::make('favicon')
                            ->label(__('admin/settings.favicon'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(3072)
                            ->nullable(),

                    ]),

                Grid::make()
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextInput::make('address')
                            ->label(__('admin/settings.address')),

                        TextInput::make('email')
                            ->label(__('admin/settings.email')),

                        TextInput::make('phone')
                            ->label(__('admin/settings.phone')),
                    ]),

                Grid::make()
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextInput::make('youtube'),
                        TextInput::make('facebook'),
                        TextInput::make('x'),
                        TextInput::make('pinterest'),
                        TextInput::make('linkedin'),

                    ]),
            ]);
    }
}
