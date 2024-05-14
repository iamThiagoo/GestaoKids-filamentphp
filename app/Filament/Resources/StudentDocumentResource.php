<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentDocumentResource\Pages;
use App\Filament\Resources\StudentDocumentResource\RelationManagers;
use App\Models\StudentDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentDocumentResource extends Resource
{
    protected static ?string $model = StudentDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $slug = 'alunos-docs';

    // Grupo no Menu
    protected static ?string $navigationGroup = 'Alunos';

    // Ordem
    protected static ?int $navigationSort = 2;

    // Termos das páginas
    protected static ?string $navigationLabel = 'Documentos Estudantis';
    protected static ?string $pluralModelLabel = 'Documentos Estudantis';
    protected static ?string $modelLabel = 'Documento Estudantil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentDocuments::route('/'),
            'create' => Pages\CreateStudentDocument::route('/create'),
            'edit' => Pages\EditStudentDocument::route('/{record}/edit'),
        ];
    }
}
