<?php

namespace App\Filament\Admin\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('admin/blog.title'))
                    ->limit(30)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label(__('admin/blog.slug'))
                    ->limit(30)
                    ->copyable()
                    ->searchable(),

                ImageColumn::make('image')
                    ->label(__('admin/blog.image'))
                    ->square()
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(url('images/app/logo.png')),

                TextColumn::make('category.name')
                    ->label(__('admin/blog.category'))
                    ->sortable()
                    ->badge(),

                TextColumn::make('status')
                    ->label(__('admin/blog.status'))
                    ->badge()
                    ->colors([
                        'danger' => 'draft',
                        'success' => 'published',
                    ]),

                // TextColumn::make('author.name')
                //     ->label('Author')
                //     ->sortable(),

                // TextColumn::make('published_at')
                //     ->label('Published At')
                //     ->dateTime('d M Y H:i')
                //     ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('admin/blog.created_at'))
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
