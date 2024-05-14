<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentTypeDocumentResource\Pages;
use App\Filament\Resources\StudentTypeDocumentResource\RelationManagers;
use App\Models\StudentTypeDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentTypeDocumentResource extends Resource
{
    protected static ?string $model = StudentTypeDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Grupo no Menu
    protected static ?string $navigationGroup = 'Administração';

    // Ordem
    protected static ?int $navigationSort = 2;

    // Termos das páginas
    protected static ?string $navigationLabel = 'Categorias de Docs. Estudantis';
    protected static ?string $pluralModelLabel = 'Categorias de Documentos Estudantis';
    protected static ?string $modelLabel = 'Categoria de Doc. Estudantil';

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
            'index' => Pages\ListStudentTypeDocuments::route('/'),
            'create' => Pages\CreateStudentTypeDocument::route('/create'),
            'edit' => Pages\EditStudentTypeDocument::route('/{record}/edit'),
        ];
    }
}
