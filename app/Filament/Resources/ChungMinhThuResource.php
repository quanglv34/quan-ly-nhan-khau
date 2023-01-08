<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChungMinhThuResource\Pages;
use App\Filament\Resources\ChungMinhThuResource\RelationManagers;
use App\Models\ChungMinhThu;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChungMinhThuResource extends Resource
{
    protected static ?string $model = ChungMinhThu::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $pluralModelLabel = 'Chứng minh thư';
    protected static ?string $modelLabel = 'Chứng minh thư';
    protected static ?string $slug = 'chung-minh-thu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('soCMT')->label('Số
                    CMT')->numeric()->maxLength(12),
                    Forms\Components\TextInput::make('hoVaTen')
                        ->label('Họ và tên'),
                    Forms\Components\TextInput::make('ngaySinh')
                        ->label('Ngày sinh')->type('date'),
                    Forms\Components\Radio::make('gioiTinh')->label('Giới tính')
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
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('soCMT')->label('Số CMT'),
                Tables\Columns\TextColumn::make('hoVaTen')->label('Họ và tên'),
                Tables\Columns\TextColumn::make('ngaySinh')->label('Ngày sinh')
                    ->date(),
                Tables\Columns\BadgeColumn::make('gioiTinh')->label('Giới tính')->enum([
                    0 => 'Nam',
                    1 => 'Nữ',
                ]),
                Tables\Columns\TextColumn::make('queQuan')->label('Quê quán'),
                Tables\Columns\TextColumn::make('noiCap')->label('Nơi cấp'),
                Tables\Columns\TextColumn::make('ngayCap')->label('Ngày cấp')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChungMinhThu::route('/'),
            'edit' => Pages\EditChungMinhThu::route('/{record}/edit'),
        ];
    }
}
