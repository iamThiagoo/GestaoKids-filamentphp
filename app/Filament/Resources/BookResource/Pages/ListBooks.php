<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;

class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createStudentDocument')
            ->label('Adicionar Livro')
            ->icon('heroicon-s-book-open')

            ->form([

                TextInput::make('livro')
                ->label('Nome do Livro')
                ->placeholder('Informe o Nome do Livro')
                ->required(),

                TextInput::make('author')
                ->label('Autor do Livro')
                ->placeholder('Informe o Autor do Livro')
                ->required(),

                Grid::make(2
                )->schema([
                    TextInput::make('year')
                    ->label('Ano de Lançamento')
                    ->placeholder('Informe o Ano de Lançamento')
                    ->integer(),

                    TextInput::make('number_pages')
                    ->label('Número de Páginas')
                    ->placeholder('Informe o Número de Páginas')
                    ->integer()
                ]),

                Textarea::make('details')
                ->label('Descrição')
                ->placeholder('Informe a Descrição do Livro'),

                FileUpload::make('file')
                ->label('Arquivo')
                ->required()

            ])
            ->modalWidth(MaxWidth::TwoExtraLarge)
            ->extraModalFooterActions(fn (Action $action): array => [
                $action->makeModalSubmitAction('Enviar e criar outro', arguments: ['another' => true]),
            ])
        ];
    }
}
