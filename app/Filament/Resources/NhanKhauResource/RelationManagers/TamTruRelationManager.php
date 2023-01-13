<?php

namespace App\Filament\Resources\NhanKhauResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TamTruRelationManager extends RelationManager
{
    protected static string $relationship = 'tamTru';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Tạm trú';
    protected static ?string $modelLabel = 'tạm trú';
    protected static ?string $pluralModelLabel = 'tạm trú';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('maGiayTamTru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lyDo')->label('Lý do'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('maGiayTamTru'),
                Tables\Columns\TextColumn::make('lyDo'),
                Tables\Columns\TextColumn::make('ngayDen')->date(),
                Tables\Columns\TextColumn::make('ngayDi')->date(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
