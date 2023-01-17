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
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('maGiayTamTru')
                    ->label('Mã giấy tạm trú')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('soDienThoaiNguoiDangKy')
                    ->label('SĐT người đăng ký')
                    ->required()
                    ->maxLength(50),
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
                Tables\Columns\TextColumn::make('maGiayTamTru')->label('Mã giấy tạm trú'),
                Tables\Columns\TextColumn::make('lyDo')->label('Lý do'),
                Tables\Columns\TextColumn::make('soDienThoaiNguoiDangKy')
                    ->label('SĐT người đăng ký'),
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
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
