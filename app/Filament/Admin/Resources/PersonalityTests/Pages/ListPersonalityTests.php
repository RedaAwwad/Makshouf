<?php

namespace App\Filament\Admin\Resources\PersonalityTests\Pages;

use App\Filament\Admin\Resources\PersonalityTests\PersonalityTestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPersonalityTests extends ListRecords
{
    protected static string $resource = PersonalityTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
