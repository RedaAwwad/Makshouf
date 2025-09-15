<?php

namespace App\Filament\Admin\Resources\Faqs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->label(__('admin/faqs.question'))
                    ->required(),
                TextInput::make('sort_order')
                    ->label(__('admin/faqs.order'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('answer')
                    ->label(__('admin/faqs.answer'))
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label(__('admin/faqs.is_active'))
                    ->default(true)
                    ->required(),
            ]);
    }
}
