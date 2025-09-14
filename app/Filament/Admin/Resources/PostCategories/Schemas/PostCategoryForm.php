<?php

namespace App\Filament\Admin\Resources\PostCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label(__('admin/blog.category_name'))
                ->required()
                ->maxLength(100)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            TextInput::make('slug')
                ->label(__('admin/blog.slug'))
                ->required()
                ->maxLength(120)
                ->unique(ignoreRecord: true),

            Textarea::make('description')
                ->label(__('admin/blog.description'))
                ->rows(3)
                ->maxLength(500),
        ]);
    }
}
