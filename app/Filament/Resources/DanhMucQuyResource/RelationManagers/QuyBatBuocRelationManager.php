<?php

namespace App\Filament\Resources\DanhMucQuyResource\RelationManagers;

use App\Enums\LoaiDanhMucQuy;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuyBatBuocRelationManager extends RelationManager
{
    protected static string $relationship = 'quyBatBuoc';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Danh sách đóng quỹ';

    protected static ?string $pluralModelLabel = 'đóng quỹ';
    protected static ?string $modelLabel = 'đóng quỹ';

    public static function canViewForRecord(Model $ownerRecord): bool
    {
        return $ownerRecord->loaiQuy === LoaiDanhMucQuy::BatBuoc->value;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('soTienDong')
                    ->label('Số điền đã đóng')
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask
                        ->numeric()
                        ->thousandsSeparator(',')
                    )
                    ->numeric()->required(),
                Forms\Components\TextInput::make('soTienPhaiDong')
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask
                        ->numeric()
                        ->thousandsSeparator(',')
                    )
                    ->label('Số tiền phải đóng')
                    ->numeric()->required(),
                Forms\Components\DatePicker::make('ngayDong')->label('Ngày đóng')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hoKhau.maHoKhau')->label('Mã hộ khẩu'),
                Tables\Columns\TextColumn::make('hoKhau.diaChi')->label('Địa chỉ'),
                Tables\Columns\TextColumn::make('hoKhau.chuHo.hoVaTen')
                    ->label('Chủ hộ'),
                Tables\Columns\BadgeColumn::make('soTienPhaiDong')->label('Số tiền phải đóng')->money('vnd'),
                Tables\Columns\BadgeColumn::make('soTienDong')->label('Số tiền đã đóng')->color('success')->money('vnd'),
                Tables\Columns\TextColumn::make('ngayDong')->label('Ngày đóng')->date('d.m.Y'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->modalWidth('lg'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modalWidth('lg'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
