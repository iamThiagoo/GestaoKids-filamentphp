<?php

namespace App\Filament\Resources\SchoolEventResource\Pages;

use App\Filament\Resources\SchoolEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchoolEvent extends EditRecord
{
    protected static string $resource = SchoolEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
