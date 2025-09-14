<?php

namespace App\Filament\Admin\Resources\PersonalityTests\Pages;

use App\Filament\Admin\Resources\PersonalityTests\PersonalityTestResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonalityTest extends ViewRecord
{
    protected static string $resource = PersonalityTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
