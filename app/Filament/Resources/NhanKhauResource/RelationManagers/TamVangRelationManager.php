<?php

namespace App\Filament\Resources\NhanKhauResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TamVangRelationManager extends RelationManager
{
    protected static string $relationship = 'tamVang';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Tạm vắng';
    protected static ?string $modelLabel = 'tạm vắng';
    protected static ?string $pluralModelLabel = 'tạm vắng';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('maGiayTamVang')
                    ->label('Mã giấy tạm vắng')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('noiTamTru')
                    ->label('Nơi tạm trú')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lyDo')->label('Lý do')->maxLength(255),
                Forms\Components\TextInput::make('tuNgay')->type('date')
                    ->required()
                    ->label('Từ ngày'),
                Forms\Components\TextInput::make('denNgay')->type('date')
                    ->required()
                    ->label('Đến ngày'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('maGiayTamVang')->label('Mã giấy tạm vắng'),
                Tables\Columns\TextColumn::make('lyDo')->label('Lý do'),
                Tables\Columns\TextColumn::make('noiTamTru')
                    ->label('Nơi tạm trú'),
                Tables\Columns\TextColumn::make('tuNgay')->date()->label('Từ ngày'),
                Tables\Columns\TextColumn::make('denNgay')->date()->label('Đến ngày'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->modalWidth('lg'),
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
