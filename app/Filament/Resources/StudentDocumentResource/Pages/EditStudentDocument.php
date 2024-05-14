<?php

namespace App\Filament\Resources\StudentDocumentResource\Pages;

use App\Filament\Resources\StudentDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentDocument extends EditRecord
{
    protected static string $resource = StudentDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
