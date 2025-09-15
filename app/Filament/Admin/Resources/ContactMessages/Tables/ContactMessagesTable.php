<?php

namespace App\Filament\Admin\Resources\ContactMessages\Tables;

use App\Models\ContactMessage;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('user_id')
                //     ->numeric()
                //     ->sortable(),,
                IconColumn::make('is_read')
                    ->label(__('admin/contact.is_read'))
                    ->boolean(),
                TextColumn::make('name')
                    ->label(__('admin/contact.name'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('admin/contact.email'))
                    ->searchable(),
                TextColumn::make('subject')
                    ->label(__('admin/contact.subject'))
                    ->searchable(),
                TextColumn::make('message')
                    ->label(__('admin/contact.message'))
                    ->limit(30),
                // TextColumn::make('ip_address')
                //     ->searchable()
                TextColumn::make('created_at')
                    ->label(__('admin/contact.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('admin/contact.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->mutateRecordDataUsing(function (ContactMessage $record, array $data): array {
                        $record->update(['is_read' => true]);

                        return $data;
                    }),

                EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('markAsRead')
                        ->label(__('admin/contact.mark_as_read'))
                        ->icon('heroicon-o-eye')
                        ->action(fn ($records) => $records->each->update(['is_read' => true])),
                    BulkAction::make('markAsUnread')
                        ->label(__('admin/contact.mark_as_unread'))
                        ->icon('heroicon-o-eye-slash')
                        ->action(fn ($records) => $records->each->update(['is_read' => false])),
                    // ])
            ]);
    }
}
