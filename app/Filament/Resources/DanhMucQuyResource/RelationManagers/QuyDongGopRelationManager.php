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

class QuyDongGopRelationManager extends RelationManager
{
    protected static string $relationship = 'quyDongGop';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Danh sách đóng quỹ';

    protected static ?string $modelLabel = 'đóng quỹ';
    protected static ?string $pluralModelLabel = 'đóng quỹ';

    public static function canViewForRecord(Model $ownerRecord): bool
    {
        return $ownerRecord->loaiQuy === LoaiDanhMucQuy::DongGop->value;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nguoiDongId')
                    ->required()
                    ->preload()
                    ->relationship('nguoiDong', 'maNhanKhauVaHoVaTen')->label
                    ('Người đóng')->searchable()->afterStateUpdated(function (
                        $state
                    ) {

                    }),
                Forms\Components\Select::make('hoDongId')
                    ->required()
                    ->preload()
                    ->relationship('hoDong', 'maHoKhau')->label
                    ('Hộ đóng quỹ')->searchable(),
                Forms\Components\TextInput::make('soTienDong')
                    ->required()
                    ->numeric()->mask(fn (
                    Forms\Components\TextInput\Mask $mask
                ) => $mask
                    ->numeric()
                    ->integer()
                    ->thousandsSeparator(',')
                )->label
                ('Số tiền'),
                Forms\Components\TextInput::make('ngayDong')->type('date')
                    ->required()
                    ->label('Ngày đóng'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nguoiDong.hoVaTen')
                    ->label('Người đóng'),
                Tables\Columns\TextColumn::make('ngayDong')->date()
                    ->label('Ngày đóng'),
                Tables\Columns\TextColumn::make('soTien')->money('vnd')
                    ->label('Số tiền'),
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
