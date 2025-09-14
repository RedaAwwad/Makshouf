<?php

namespace App\Filament\Admin\Resources\PersonalityTests\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PersonalityTestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('admin/personality_tests.title'))
                    ->required(),

                TextInput::make('price')
                    ->label(__('admin/personality_tests.price'))
                    ->numeric()
                    ->required(),

                RichEditor::make('instructions')
                    ->label(__('admin/personality_tests.instructions'))
                    ->columnSpanFull(),

                Repeater::make('scales')
                    ->label(__('admin/personality_tests.scales'))
                    ->relationship('scales')
                    ->addActionLabel(__('admin/personality_tests.add_scale'))
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Grid::make()
                            ->columns(3)
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('admin/personality_tests.scale_name'))
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true),

                                TextInput::make('threshold')
                                    ->label(__('admin/personality_tests.threshold'))
                                    ->numeric()
                                    ->default(1)
                                    ->required(),

                                TextInput::make('order')
                                    ->label(__('admin/personality_tests.order'))
                                    ->numeric()
                                    ->default(0),
                            ]),

                        Repeater::make('questions')
                            ->label(__('admin/personality_tests.questions'))
                            ->relationship('questions')
                            ->addActionLabel(__('admin/personality_tests.add_question'))
                            ->schema([
                                Textarea::make('question')
                                    ->label(__('admin/personality_tests.question'))
                                    ->required()
                                    ->rows(2)
                                    ->live(onBlur: true),

                                TextInput::make('order')
                                    ->label(__('admin/personality_tests.order'))
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->itemLabel(fn (array $state): ?string => $state['question'] ?? null)
                            ->collapsible()
                            ->defaultItems(1),
                    ])
                    ->defaultItems(1)
                    ->columns(1)
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                    ->collapsible(),
            ]);
    }
}
