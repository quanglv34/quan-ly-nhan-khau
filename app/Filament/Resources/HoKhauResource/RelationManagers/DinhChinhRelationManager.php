<?php

namespace App\Filament\Resources\HoKhauResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DinhChinhRelationManager extends RelationManager
{
    protected static string $relationship = 'dinhChinh';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $label = 'đính chính';
    protected static ?string $pluralModelLabel = 'đính chính';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('thongTinThayDoi')->label('Thông tin thay đổi')->required(),
                Forms\Components\TextInput::make('thayDoiTu')->label('Thay đổi từ')->required(),
                Forms\Components\TextInput::make('thayDoiThanh')->label('Thay đổi thành')->required(),
                Forms\Components\Select::make('nguoiThayDoiId')
                    ->relationship('nguoiThayDoi', 'name')->label('Người thay đổi')->required(),
                Forms\Components\DatePicker::make('ngayThayDoi')
                    ->default(today())
                    ->label('Ngày thay đổi')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('thongTinThayDoi')->label('Thông tin thay đổi'),
                Tables\Columns\TextColumn::make('thayDoiTu')->label('Thay đổi từ'),
                Tables\Columns\TextColumn::make('thayDoiThanh')->label('Thay đổi thành'),
                Tables\Columns\TextColumn::make('nguoiThayDoi.name')->label('Người thay đổi'),
                Tables\Columns\TextColumn::make('ngayThayDoi')->date('d.m.Y')->label('Ngày thay đổi'),
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
