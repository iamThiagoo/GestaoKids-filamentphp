<?php

namespace App\Filament\Resources\StudentTypeDocumentResource\Pages;

use App\Filament\Resources\StudentTypeDocumentResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;

class ListStudentTypeDocuments extends ListRecords
{
    protected static string $resource = StudentTypeDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createCategoryDocument')
            ->label('Criar Categoria de Documento')
            ->icon('heroicon-s-document-plus')

            ->form([
                TextInput::make('name')
                ->label('Nome da Categoria')
                ->placeholder('Informe o Nome da Categoria')
                ->required(),

                Toggle::make('required')
                ->label('Documentos dessa categoria são obrigatórios.')
                ->helperText('Em caso de ativação, na hora do cadastro do Aluno será obrigatório vinculá-lo.'),

                Toggle::make('hasExpirationTime')
                ->label('Documentos dessa categoria possuem validade!')
                ->live(),

                TextInput::make('expirationTime')
                ->label('Tempo de Validade')
                ->placeholder('Informe o Tempo em Dias')
                ->helperText('Após o prazo estabelecido será necessário atualizar esse documento. Lembretes serão acionados quando ocorrer.')
                ->numeric()
                ->required(fn (Get $get): bool => filled($get('hasExpirationTime')))
                ->visible(fn (Get $get): bool => !empty($get('hasExpirationTime')))
            ])
            ->modalWidth(MaxWidth::TwoExtraLarge)
            ->extraModalFooterActions(fn (Action $action): array => [
                $action->makeModalSubmitAction('Enviar e criar outro', arguments: ['another' => true]),
            ])
        ];
    }
}
