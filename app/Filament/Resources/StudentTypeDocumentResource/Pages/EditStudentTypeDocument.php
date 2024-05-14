<?php

namespace App\Filament\Resources\StudentTypeDocumentResource\Pages;

use App\Filament\Resources\StudentTypeDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentTypeDocument extends EditRecord
{
    protected static string $resource = StudentTypeDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
