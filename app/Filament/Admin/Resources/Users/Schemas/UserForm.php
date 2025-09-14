<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->columnSpanFull(),
                TextInput::make('name')
                    ->label(__('admin/users.name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('admin/users.email'))
                    ->email()
                    ->required(),
                TextInput::make('mobile')
                    ->label(__('admin/users.mobile'))
                    ->required(),
                TextInput::make('password')
                    ->label(__('admin/users.password'))
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
                // DateTimePicker::make('email_verified_at'),
                // TextInput::make('stripe_id')
                //     ->default(null),
                // TextInput::make('pm_type')
                //     ->default(null),
                // TextInput::make('pm_last_four')
                //     ->default(null),
                // DateTimePicker::make('trial_ends_at'),
            ]);
    }
}
