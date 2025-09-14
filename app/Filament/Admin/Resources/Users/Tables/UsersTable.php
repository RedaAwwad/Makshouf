<?php

namespace App\Filament\Admin\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin/users.name'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('admin/users.email'))
                    ->searchable(),
                TextColumn::make('mobile')
                    ->label(__('admin/users.mobile'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('admin/users.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('stripe_id')
                //     ->searchable(),
                // TextColumn::make('pm_type')
                //     ->searchable(),
                // TextColumn::make('pm_last_four')
                //     ->searchable(),
                // TextColumn::make('trial_ends_at')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
