<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NhanKhauResource\Pages;
use App\Filament\Resources\NhanKhauResource\RelationManagers;
use App\Models\NhanKhau;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NhanKhauResource extends Resource
{
    protected static ?string $model = NhanKhau::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $pluralModelLabel = 'Nhân khẩu';
    protected static ?string $modelLabel = 'Nhân khẩu';
    protected static ?string $slug = 'nhan-khau';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Chứng minh thư')
                    ->relationship('chungMinhThu')
                    ->schema([
                        Forms\Components\TextInput::make('soCMT')->label('Số
                    CMT')->numeric()->maxLength(12),
                        Forms\Components\TextInput::make('hoVaTen')
                            ->label('Họ và tên'),
                        Forms\Components\TextInput::make('ngaySinh')
                            ->label('Ngày sinh')->type('date'),
                        Forms\Components\Radio::make('gioiTinh')
                            ->label('Giới tính')
                            ->inline()
                            ->options([
                                0 => 'Nam',
                                1 => 'Nữ',
                            ]),
                        Forms\Components\TextInput::make('queQuan')
                            ->label('Quê quán'),
                        Forms\Components\TextInput::make('noiCap')
                            ->label('Nơi cấp'),
                        Forms\Components\TextInput::make('ngayCap')
                            ->label('Ngày cấp')->type('date'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chungMinhThu.hoVaTen')
                    ->label('Họ và tên'),
                Tables\Columns\TextColumn::make('chungMinhThu.soCMT')
                    ->label('Chứng minh thư'),
                Tables\Columns\TextColumn::make('maNhanKhau')
                    ->label('Mã nhân khẩu'),
                Tables\Columns\TextColumn::make('ngayChuyenDen')->date()
                    ->label('Ngày chuyển đến'),
                Tables\Columns\TextColumn::make('ngayChuyenDi')->date()
                    ->label('Ngày chuyển đi'),
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
            'index'  => Pages\ListNhanKhau::route('/'),
            'create' => Pages\CreateNhanKhau::route('/create'),
            'edit'   => Pages\EditNhanKhau::route('/{record}/edit'),
        ];
    }
}
