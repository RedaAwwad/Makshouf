<?php

namespace App\Filament\Admin\Resources\SiteSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('website_name')
                    ->label(__('admin/settings.website_name')),

                ImageColumn::make('logo')
                    ->label(__('admin/settings.logo'))
                    ->square()
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(url('images/app/logo.png')),

                ImageColumn::make('favicon')
                    ->label(__('admin/settings.favicon'))
                    ->square()
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(url('images/app/logo.png')),

                TextColumn::make('email')
                    ->label(__('admin/settings.email')),

                TextColumn::make('address')
                    ->label(__('admin/settings.address'))
                    ->limit(25)
                    ->copyable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__('admin/settings.phone')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
