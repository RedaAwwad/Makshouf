<?php

namespace App\Filament\Admin\Resources\PersonalityTests\Pages;

use App\Filament\Admin\Resources\PersonalityTests\PersonalityTestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPersonalityTest extends EditRecord
{
    protected static string $resource = PersonalityTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
