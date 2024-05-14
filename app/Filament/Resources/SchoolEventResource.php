<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolEventResource\Pages;
use App\Filament\Resources\SchoolEventResource\RelationManagers;
use App\Models\SchoolEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolEventResource extends Resource
{
    protected static ?string $model = SchoolEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $slug = 'eventos';

    // Nome do Grupo
    protected static ?string $navigationGroup = 'Administração';

    // Termos das páginas
    protected static ?string $navigationLabel = 'Eventos Escolares';
    protected static ?string $pluralModelLabel = 'Eventos Escolares';
    protected static ?string $modelLabel = 'Evento Escolar';

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
            'index' => Pages\ListSchoolEvent::route('/'),
            'create' => Pages\CreateSchoolEvent::route('/create'),
            'edit' => Pages\EditSchoolEvent::route('/{record}/edit'),
        ];
    }
}
