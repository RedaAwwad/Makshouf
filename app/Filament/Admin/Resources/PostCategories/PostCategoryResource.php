<?php

namespace App\Filament\Admin\Resources\PostCategories;

use App\Filament\Admin\Resources\PostCategories\Pages\CreatePostCategory;
use App\Filament\Admin\Resources\PostCategories\Pages\EditPostCategory;
use App\Filament\Admin\Resources\PostCategories\Pages\ListPostCategories;
use App\Filament\Admin\Resources\PostCategories\Schemas\PostCategoryForm;
use App\Filament\Admin\Resources\PostCategories\Tables\PostCategoriesTable;
use App\Models\PostCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PostCategoryResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup;

    public static function getNavigationGroup(): ?string
    {
        return __('admin/blog.blog');
    }

    protected static ?string $model = PostCategory::class;

    public static function getModelLabel(): string
    {
        return __('admin/blog.post_category');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin/blog.post_categories');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    public static function form(Schema $schema): Schema
    {
        return PostCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPostCategories::route('/'),
            'create' => CreatePostCategory::route('/create'),
            'edit' => EditPostCategory::route('/{record}/edit'),
        ];
    }
}
