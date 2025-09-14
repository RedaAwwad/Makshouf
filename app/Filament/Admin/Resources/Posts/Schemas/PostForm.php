<?php

namespace App\Filament\Admin\Resources\Posts\Schemas;

use App\Models\PostCategory;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('admin/blog.title'))
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->label(__('admin/blog.slug'))
                    ->unique(ignoreRecord: true)
                    ->required(),

                Select::make('post_category_id')
                    ->relationship('category', 'name')
                    ->label(__('admin/blog.category'))
                    ->options(PostCategory::query()->pluck('name', 'id'))
                    ->searchable()
                    ->nullable(),

                Select::make('status')
                    ->options([
                        'published' => __('admin/blog.published'),
                        'draft' => __('admin/blog.draft'),
                    ])
                    ->default('published')
                    ->required(),

                RichEditor::make('content')
                    ->label(__('admin/blog.content'))
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label(__('admin/blog.image'))
                    ->image()
                    ->disk('public')
                    ->directory('posts')
                    ->visibility('public')
                    ->maxSize(3072)
                    ->nullable(),

                // DateTimePicker::make('published_at')
                //     ->label('Publish At')
                //     ->seconds(false)
                //     ->nullable(),
            ]);
    }
}
