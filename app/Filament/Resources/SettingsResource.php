<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Settings;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SettingsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingsResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ViewColumn;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog-8-tooth';

    public static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required(),
                Forms\Components\TextInput::make('display_name')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Select::make('type')
                    ->columnSpanFull()
                    ->options([
                        'text'=> 'Text',
                        'file'=> 'File',
                        'image'=> 'Image',
                        'boolean' => 'Boolean'
                    ])
                    ->live()
                    ->afterStateUpdated(fn(Select $component) => $component
                        ->getContainer()
                        ->getComponent('dynamicForm')
                        ->getChildComponentContainer()
                        ->fill()
                    )
                     ->hiddenOn('edit')
                    ->required(),
                Grid::make(2)
                    ->schema(fn(Get $get): array => match($get('type')){
                        'text' => [
                            TextInput::make('value')
                                ->columnSpanFull()
                                ->required(),
                        ],
                        'file' => [
                            FileUpload::make('value')
                                ->columnSpanFull()
                                ->required(),
                        ],
                        'image' => [
                            FileUpload::make('value')
                                ->columnSpanFull()
                                ->required(),
                        ],
                         'boolean' => [
                                Select::make('value')
                                    ->options([
                                        'true' => 'True',
                                        'false' => 'False',
                                    ])
                                    ->columnSpanFull()
                                    ->required()
                        ],
                        default => [],
                    })->key('dynamicForm'),
                Forms\Components\Textarea::make('options')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('group'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('display_name')
                    ->searchable(),
                ViewColumn::make('value')->view('tables.columns.settings.value'),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('group')
                    ->searchable(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}
