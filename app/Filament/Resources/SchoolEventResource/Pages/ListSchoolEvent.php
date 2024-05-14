<?php

namespace App\Filament\Resources\SchoolEventResource\Pages;

use App\Filament\Resources\SchoolEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchoolEvent extends ListRecords
{
    protected static string $resource = SchoolEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
