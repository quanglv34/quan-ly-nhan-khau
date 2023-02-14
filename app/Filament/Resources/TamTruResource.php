<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TamTruResource\Pages;
use App\Filament\Resources\TamTruResource\RelationManagers;
use App\Models\TamTru;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TamTruResource extends Resource
{
    protected static ?string $model = TamTru::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-add';

    protected static ?string $navigationGroup = 'Quản lý nhân khẩu';

    protected static ?string $pluralModelLabel = 'Tạm trú';
    protected static ?string $modelLabel = 'Tạm trú';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('maGiayTamTru')->label('Mã giấy tạm trú'),
                Tables\Columns\TextColumn::make('soDienThoaiNguoiDangKy')->label('Số điện thoại người đăng ký'),
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
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTamTru::route('/'),
            //'create' => Pages\CreateTamTru::route('/create'),
            //'edit' => Pages\EditTamTru::route('/{record}/edit'),
        ];
    }
}
