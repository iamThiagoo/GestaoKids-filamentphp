<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Filament\Forms\Components\TextInput;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $slug = 'alunos';

    //
    protected static ?string $navigationGroup = 'Alunos';

    // Termos das páginas
    protected static ?string $navigationLabel = 'Alunos';
    protected static ?string $pluralModelLabel = 'Alunos';
    protected static ?string $modelLabel = 'Aluno';

    // Tooltip
    protected static ?string $navigationBadgeTooltip = 'Número de alunos registrados';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([

                    // Informações Pessoais
                    Forms\Components\Wizard\Step::make('Informações Pessoais do Aluno')
                        ->columns(2)
                        ->icon('heroicon-m-academic-cap')
                        ->schema([
                            Forms\Components\TextInput::make('fullname')
                            ->required()
                            ->label('Nome Completo')
                            ->placeholder('Informe o Nome Completo do Aluno'),

                            Forms\Components\DatePicker::make('birthday')
                            ->required()
                            ->label('Data de Nascimento'),

                            Forms\Components\Radio::make('gender')
                            ->options([
                                'M' => 'Masculino',
                                'F' => 'Feminino'
                            ])
                            ->required()
                            ->label('Gênero'),

                            Forms\Components\TextInput::make('nacionality')
                            ->default('Brasileiro(a)')
                            ->label('Nacionalidade')
                            ->required(),

                            Forms\Components\TextInput::make('email')
                            ->required()
                            ->rule('email')
                            ->label('E-mail para Acesso ao App')
                            ->placeholder('Informe o E-mail do Aluno/Responsável'),

                            PhoneNumber::make('phone')
                            ->required()
                            ->label('Telefone')
                            ->placeholder('Informe o Telefone do Aluno/Responsável'),

                            Document::make('cpf')
                            ->cpf()
                            ->label('Documento CPF (Opcional)')
                            ->placeholder('Informe o Documento CPF do Aluno'),

                            Forms\Components\Select::make('bloodType')
                            ->options([
                                "A+" => "A+",
                                "A-" => "A-",
                                "B+" => "B+",
                                "B-" => "B-",
                                "AB+" => "AB+",
                                "AB-" => "AB-",
                                "O+" => "O+",
                                "O-" => "O-"
                            ])->label('Tipo Sanguíneo (Opcional)'),

                            TinyEditor::make('details')
                            ->minHeight(300)
                            ->toolbarSticky(true)
                            ->language('pt')
                            ->label('Observações Extras (Opcional)')
                            ->placeholder('Informe observações extras sobre o Aluno')
                            ->columnSpan('full')
                        ]),

                    // Informações Pessoais
                    Forms\Components\Wizard\Step::make('Responsáveis')
                        ->columns(2)
                        ->icon('heroicon-m-user-group')
                        ->schema([

                            Forms\Components\TextInput::make('name_responsible')
                            ->required()
                            ->label('Nome Completo do Responsável')
                            ->placeholder('Informe o Telefone do Aluno/Responsável'),

                            Forms\Components\TextInput::make('email_responsible')
                            ->rule('email')
                            ->required()
                            ->label('E-mail do Responsável')
                            ->placeholder('Informe o Telefone do Aluno/Responsável'),

                            Forms\Components\DatePicker::make('birthday_responsible')
                            ->required()
                            ->label('Data de Nascimento'),

                            Forms\Components\TextInput::make('phone_responsible')
                            ->label('Telefone (Opcional)')
                            ->placeholder('Informe o Telefone do Responsável'),

                            TinyEditor::make('details_responsible')
                            ->minHeight(200)
                            ->toolbarSticky(true)
                            ->language('pt')
                            ->label('Observações Extras (Opcional)')
                            ->placeholder('Informe observações extras sobre o Aluno')
                            ->columnSpan('full')
                        ])
                ])
                ->startOnStep(1)
                ->columnSpanFull()
                ->submitAction(new HtmlString('<button type="submit">Submit</button>'))
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
