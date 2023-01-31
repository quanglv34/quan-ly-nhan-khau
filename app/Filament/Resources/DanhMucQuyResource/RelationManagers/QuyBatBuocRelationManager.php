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

    protected static ?string $title = 'Danh sách thu quỹ';

    protected static ?string $pluralModelLabel = 'thu quỹ';
    protected static ?string $modelLabel = 'thu quỹ';

    public static function canViewForRecord(Model $ownerRecord): bool
    {
        return $ownerRecord->loaiQuy === LoaiDanhMucQuy::BatBuoc->value;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hoKhau.maHoKhau')->label('Mã hộ khẩu'),
                Tables\Columns\TextColumn::make('hoKhau.diaChi')->label('Địa chỉ'),
                Tables\Columns\TextColumn::make('hoKhau.chuHo.hoVaTen')
                    ->label('Chủ hộ'),
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
