<?php

namespace App\Filament\Resources\StudentDocumentResource\Pages;

use App\Filament\Resources\StudentDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentDocument extends CreateRecord
{
    protected static string $resource = StudentDocumentResource::class;
}
