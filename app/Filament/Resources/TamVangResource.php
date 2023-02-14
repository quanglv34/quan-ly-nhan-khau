<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TamVangResource\Pages;
use App\Filament\Resources\TamVangResource\RelationManagers;
use App\Models\TamVang;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TamVangResource extends Resource
{
    protected static ?string $model = TamVang::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-remove';

    protected static ?string $navigationGroup = 'Quản lý nhân khẩu';

    protected static ?string $pluralModelLabel = 'Tạm vắng';
    protected static ?string $modelLabel = 'Tạm vắng';

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
                Tables\Columns\TextColumn::make('maGiayTamVang')->label('Mã giấy tạm vắng'),
                Tables\Columns\TextColumn::make('noiTamTru')->label('Nơi tạm trú'),
                Tables\Columns\TextColumn::make('lyDo')->label('Lý do'),
                Tables\Columns\TextColumn::make('tuNgay')->date()->label('Từ ngày'),
                Tables\Columns\TextColumn::make('denNgay')->date()->label('Đến ngày'),
                Tables\Columns\TextColumn::make('nhanKhau.hoVaTen')->label('Nhân khẩu'),
                Tables\Columns\TextColumn::make('nhanKhau.maNhanKhau')->label('Mã nhân khẩu'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTamVang::route('/'),
            'create' => Pages\CreateTamVang::route('/create'),
            'edit' => Pages\EditTamVang::route('/{record}/edit'),
        ];
    }
}
