<?php

namespace App\Filament\Resources\NhanKhauResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TieuSuRelationManager extends RelationManager
{
    protected static string $relationship = 'tieuSu';

    protected static ?string $recordTitleAttribute = 'id';
    protected static ?string $pluralModelLabel = 'tiểu sử';
    protected static ?string $modelLabel = 'tiểu sử';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tuNgay')->type('date')
                    ->required()->label('Từ ngày'),
                Forms\Components\TextInput::make('denNgay')->type('date')
                    ->required()->label('Đến ngày'),
                Forms\Components\TextInput::make('diaChi')->required()->label
                ('Địa chỉ'),
                Forms\Components\TextInput::make('ngheNghiep')->required()
                    ->label('Nghề nghiệp'),
                Forms\Components\TextInput::make('noiLamViec')->required()
                    ->label('Nơi  làm việc'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tuNgay')->label('Từ ngày'),
                Tables\Columns\TextColumn::make('denNgay')->label('Đến ngày'),
                Tables\Columns\TextColumn::make('diaChi')->label
                ('Địa chỉ'),
                Tables\Columns\TextColumn::make('ngheNghiep')->label('Nghề nghiệp'),
                Tables\Columns\TextColumn::make('noiLamViec')->label('Nơi  làm việc'),
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
