<?php

namespace App\Filament\Admin\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->numeric()
                    ->readOnly()
                    ->default(null),
                TextInput::make('name')
                    ->label(__('admin/contact.name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('admin/contact.email'))
                    ->email()
                    ->required(),
                TextInput::make('subject')
                    ->label(__('admin/contact.subject'))
                    ->default(null),
                Textarea::make('message')
                    ->label(__('admin/contact.message'))
                    ->required()
                    ->rows(7)
                    ->columnSpanFull(),
                // TextInput::make('ip_address')
                //     ->default(null),
                Toggle::make('is_read')
                    ->label(__('admin/contact.is_read'))
                    ->required(),
            ]);
    }
}
