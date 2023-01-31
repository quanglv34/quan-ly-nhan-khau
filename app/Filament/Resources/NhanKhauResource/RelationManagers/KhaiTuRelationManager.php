<?php

namespace App\Filament\Resources\NhanKhauResource\RelationManagers;

use Auth;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KhaiTuRelationManager extends RelationManager
{
    protected static string $relationship = 'khaiTu';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Khai tử';
    protected static ?string $modelLabel = 'khai tử';
    protected static ?string $pluralModelLabel = 'khai tử';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nguoiChetId')
                    ->label('Người chết')
                    ->disabled()
                    ->relationship('nguoiChet', 'maNhanKhauVaHoVaTen')
                    ->default(Auth::user()->id),
                Forms\Components\TextInput::make('soGiayKhaiTu')
                    ->required()
                    ->label('Mã giấy khai tử')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ngayChet')->label('Ngày chết')
                    ->required()->type('date'),
                Forms\Components\TextInput::make('ngayKhai')->label('Ngày khai')
                    ->required()->type('date'),
                Forms\Components\TextInput::make('lyDoChet')
                    ->required()
                    ->label('Lý do chết')
                    ->maxLength(255),
                Forms\Components\Select::make('nguoiKhaiId')
                    ->relationship('nguoiKhai', 'maNhanKhauVaHoVaTen')
                    ->label('Người khai')
                    ->preload()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('soGiayKhaiTu')->label('Mã giấy khai tử'),
                Tables\Columns\TextColumn::make('ngayChet')->date()->label('Ngày chết'),
                Tables\Columns\TextColumn::make('ngayKhai')->date()->label('Ngày khai'),
                Tables\Columns\TextColumn::make('lyDoChet')->label('Lý do chết'),
                Tables\Columns\TextColumn::make('nguoiKhai.hoVaTen')->label('Người khai'),
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
