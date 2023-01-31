<?php

namespace App\Filament\Resources\DanhMucQuyResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DongQuyRelationManager extends RelationManager
{
    protected static string $relationship = 'dongQuy';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Danh sách đóng quỹ';

    protected static ?string $modelLabel = 'đóng quỹ';
    protected static ?string $pluralModelLabel = 'đóng quỹ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nguoiDongQuyId')
                    ->relationship('nguoiDong', 'maNhanKhauVaHoVaTen')->label
                    ('Người đóng')->searchable()->afterStateUpdated(function (
                        $state
                    ) {

                    }),
                Forms\Components\Select::make('hoDongId')
                    ->relationship('hoDong', 'maHoKhau')->label
                    ('Hộ đóng quỹ')->searchable(),
                Forms\Components\TextInput::make('soTien')->numeric()->mask(fn (
                    Forms\Components\TextInput\Mask $mask
                ) => $mask
                    ->numeric()
                    ->integer()
                    ->thousandsSeparator(',')
                )->label
                ('Số tiền'),
                Forms\Components\TextInput::make('ngayDong')->type('date')
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
