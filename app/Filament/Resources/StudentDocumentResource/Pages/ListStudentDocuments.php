<?php

namespace App\Filament\Resources\StudentDocumentResource\Pages;

use App\Filament\Resources\StudentDocumentResource;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Get;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class ListStudentDocuments extends ListRecords
{
    protected static string $resource = StudentDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createStudentDocument')
            ->label('Vincular Documento Estudantil')
            ->icon('heroicon-s-paper-clip')

            ->form([

                Select::make('student_id')
                ->label('Estudante')
                ->options(Student::all()->pluck('name', 'id'))
                ->searchable(),

                Select::make('student_type_document_id')
                ->label('Categoria de Documento')
                ->options(Student::all()->pluck('name', 'id'))
                ->searchable(),

                FileUpload::make('attachment')
                ->label('Atribuir Documento')
                ->preserveFilenames()

            ])
            ->modalWidth(MaxWidth::TwoExtraLarge)
            ->extraModalFooterActions(fn (Action $action): array => [
                $action->makeModalSubmitAction('Enviar e criar outro', arguments: ['another' => true]),
            ])
        ];
    }
}
